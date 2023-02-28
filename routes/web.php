<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>'auth'],function(){
    Route::get('/transfers/pending/accounting', function () {
        return view('anypage.accounting3');
    });
    /*Route::get('/accounting2', function () {
        return view('anypage.accounting2');
    });
    Route::get('/accounting3', function () {
        return view('anypage.accounting3');
    });
    Route::get('/codeVerification', function () {
        return view('anypage.codeVerification');
    });*/
     Route::get('/transfers/pending/abouts', function () {
         return view('anypage.about');
    });
     Route::get('/wel', function () {
         return view('welcome');
    });
});


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('transfer', [App\Http\Controllers\TransactionController::class, 'indexOptions'])->middleware('auth');

Route::post('/transfer/confirmation', [App\Http\Controllers\TransactionController::class, 'store'])->middleware('auth');

Route::put('/transactions/{id}', [App\Http\Controllers\TransactionController::class, 'update'])->middleware('auth');

// Send payment
Route::get('transfer/contact', [App\Http\Controllers\ContactController::class, 'create'])->middleware('auth');
Route::post('transfer/contact', [App\Http\Controllers\ContactController::class, 'storeAtTransfer'])->middleware('auth');
Route::post('transfer', [App\Http\Controllers\TransactionController::class, 'store'])->middleware('auth');
Route::get('transfer/confirmation', [App\Http\Controllers\TransactionController::class, 'show'])->middleware('auth');

// Manage contacts
Route::get('contacts', [App\Http\Controllers\ContactController::class, 'index'])->middleware('auth');
Route::post('contacts', [App\Http\Controllers\ContactController::class, 'store'])->middleware('auth');
Route::delete('contacts/delete/{contact}', [App\Http\Controllers\ContactController::class, 'destroy'])->middleware('auth')->name('contact.destroy');

// Accounts summary
Route::resource('accounts', 'App\Http\Controllers\AccountController')->middleware('auth');

// Pending incoming transfers
Route::get('transfers/pending/incoming', [App\Http\Controllers\TransactionController::class, 'indexIncoming'])->middleware('auth');
Route::get('transfers/pending/outgoing', [App\Http\Controllers\TransactionController::class, 'indexOutgoing'])->middleware('auth');

// User details
Route::resource('users', 'App\Http\Controllers\UserController')->middleware('auth');

Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
