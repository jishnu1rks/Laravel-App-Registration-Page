<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', 'UserController@login')->name('login');

Route::post('/profile/{id}', 'UserController@update')->name('profile.update');

Route::post('/home', 'UserController@loginAccount')->name('form.login');

Route::get('/register', 'UserController@register')->name('register');

Route::post('/register', 'UserController@store')->name('register.store');

Route::get('/verify', 'UserController@verify')->name('verify');

Route::post('/verify', 'UserController@accountVerify')->name('account.verify');

Route::get('/resend/{id}', 'UserController@resendotp')->name('resendotp');
