<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', 'Events\EventsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
