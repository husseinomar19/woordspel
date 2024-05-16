<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pageTitle = "Home";
    return view('welcome',compact('pageTitle'));
});
Route::get('/inloggen', function () {
    $pageTitle = "Inloggen";
    return view('inloggen',compact('pageTitle'));
});
Route::get('/signup', function () {
    $pageTitle = "Sign Up";
    return view('signup',compact('pageTitle'));
});
Route::get('/spel', function () {
    $pageTitle = "Spel";
    return view('spel',compact('pageTitle'));
});
Route::get('/userdash', function () {
    $pageTitle = "User Dash";
    return view('userdash',compact('pageTitle'));
});
Route::post('/signup', 'App\Http\Controllers\LoginController@store')->name('item.store');
Route::post('/admin', 'App\Http\Controllers\Usercheck@login')->name('login');



