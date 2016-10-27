<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

# DummyText route
Route::get('/dummytext', 'DummyText@create')->name('dummytext.create');

# Create some dummy text
Route::get('/dummytext/create', 'DummyText@create')->name('dummytext.create');

Route::post('/dummytext/create', 'DummyText@create')->name('dummytext.create');

# CreateUserData route
Route::get('/createuserdata', 'CreateUserData@create')->name('createuserdata.create');

# Create some dummy users
Route::post('/createuserdata', 'CreateUserData@create')->name('createuserdata.create');

Route::get('/', function () {
    return view('landing');
});
