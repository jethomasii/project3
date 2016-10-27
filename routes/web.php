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
Route::get('/dummytext', 'DummyText@index')->name('dummytext.index');

# Create some dummy text
Route::get('/dummytext/create', 'DummyText@create')->name('dummytext.create');

Route::post('/dummytext/create', 'DummyText@create')->name('dummytext.create');

# CreateUserData route
Route::get('/createuserdata', 'CreateUserData@index')->name('createuserdata.index');

Route::get('/', function () {
    return view('landing');
});
