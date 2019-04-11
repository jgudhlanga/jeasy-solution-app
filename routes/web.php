<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('events', 'Events\EventsControllers@index')->name('events');
