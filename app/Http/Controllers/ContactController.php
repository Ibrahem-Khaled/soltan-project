<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Auth;

class ContactController extends Controller
{
    public function create() {
        $users = User::all();
        return view('contact', compact('users'));
    }

    public function storeAtTransfer(Request $request) {

        if ($request->email == $request->user()->email) {
            return redirect('/transfer/contact')->with('fail', 'لو سمحت لا تستطيع اضافة نفسك');
        }

        if (Contact::where('contact_email', $request->email)->where('user_id', $request->user()->id)->exists()) {
            return redirect('/transfer/contact')->with('fail', 'تم اضافة هذا المكتب بلفعل');
        }

        if (!User::where('email', $request->email)->exists()) {
            return redirect('/transfer/contact')->with('fail', "لم يتم انشاء هذا المكتب للان");
        }

        $attributes = [
            'user_id' => $request->user()->id,
            'contact_email' => $request->email
        ];

        Contact::create($attributes);

        return redirect('/transfer')->with('success', $request->email.' تم اضافة المكتب الي جهات التحويل');
    }

    public function store(Request $request) {

        if ($request->email == $request->user()->email) {
            return redirect('/contacts')->with('fail', 'Silly goose, you cannot add yourself.');
        }

        if (Contact::where('contact_email', $request->email)->where('user_id', $request->user()->id)->exists()) {
            return redirect('/contacts')->with('fail', 'This person has already been added.');
        }

        if (!User::where('email', $request->email)->exists()) {
            return redirect('/contacts')->with('fail', "Only existing clients can be added.");
        }

        $attributes = [
            'user_id' => $request->user()->id,
            'contact_email' => $request->email
        ];

        Contact::create($attributes);
       

        return redirect('/contacts')->with('success', $request->email.' has been added.');

    }


    public function index() {
        return view('contacts', ['contacts' => auth()->user()->contacts]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('/contacts')->with('success', $contact->contact_email. ' has been removed from contacts.');
    }

    public function destroyAll()
    {
        $contact->delete();

        return redirect('/contacts')->with('success', $contact->contact_email. ' has been removed from contacts.');
    }

}
