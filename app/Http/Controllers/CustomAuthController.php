<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
 
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('transfer')
                ->withSuccess('Signed in');
        }

        return redirect("/")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('auth.register');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|string|unique:users',
            'password' => 'required|min:6',
            'boxnumber' => 'required|numeric',
            'email' => 'required|string|unique:users',
            'phone' => 'required|numeric',
            'contry' => 'required',
            'city' => 'required',
            'information' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("registration")->withSuccess('تم انشاء المكتب بنجاح');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'boxnumber' => $data['boxnumber'],
            'phone' => $data['phone'],
            'contry' => $data['contry'],
            'city' => $data['city'],
            'information' => $data['information'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function about(Request $request)
    {
        
        if (Auth::check()) {
            return view('transfer');
        }
        return redirect("/")->withSuccess('are not allowed to access');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}