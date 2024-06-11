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
Route::post('/signup', 'App\Http\Controllers\LoginController@store')->name('adduser');
Route::post('/admin', 'App\Http\Controllers\Usercheck@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\Usercheck@logout')->name('logout');

Route::get('/woordenspel', [WoordenspelController::class, 'index']);
Route::post('/woordenspel', [WoordenspelController::class, 'raad']);
Route::post('/woordenspel', 'App\Http\Controllers\WoordenspelController@raad')->name('raad');
Route::post('/nieuw_spel', [WoordenspelController::class, 'nieuwSpel']);
Route::post('/nieuw_spel', 'App\Http\Controllers\WoordenspelController@nieuwSpel')->name('nieuwSpel');
Route::get('/userdash','App\Http\Controllers\Usercheck@profile')->name('profile');

Route::get('/vrienden','App\Http\Controllers\WoordenspelController@showGebruikerDash')->name('alluser');
Route::get('/userdash','App\Http\Controllers\WoordenspelController@showProfile')->name('showfriends');
Route::post('/userdash/{id}','App\Http\Controllers\WoordenspelController@removeFriend')->name('removefriends');
Route::get('/spelen','App\Http\Controllers\Usercheck@game')->name('game');



Route::put('/userupdate/{id}', 'App\Http\Controllers\LoginController@update')->name('item.update');
Route::get('/aanpassen/{id}', 'App\Http\Controllers\LoginController@edit')->name('aanpassen');
Route::post('/spelen', 'App\Http\Controllers\WoordenspelController@gameresualt')->name('item.store');
Route::get('/','App\Http\Controllers\WoordenspelController@showGame')->name('showGame');
Route::post('/userdash','App\Http\Controllers\WoordenspelController@addFriend')->name('addFriend');



