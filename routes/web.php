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
Route::get('/spelen', function () {
    $pageTitle = "Spelen";
    return view('spelen',compact('pageTitle'));
});
Route::post('/signup', 'App\Http\Controllers\LoginController@store')->name('item.store');
Route::post('/admin', 'App\Http\Controllers\Usercheck@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\Usercheck@loginuit')->name('logout');

Route::get('/woordenspel', [WoordenspelController::class, 'index']);
Route::post('/woordenspel', [WoordenspelController::class, 'raad']);
Route::post('/woordenspel', 'App\Http\Controllers\WoordenspelController@raad')->name('raad');
Route::post('/nieuw_spel', [WoordenspelController::class, 'nieuwSpel']);
Route::post('/nieuw_spel', 'App\Http\Controllers\WoordenspelController@nieuwSpel')->name('nieuwSpel');
