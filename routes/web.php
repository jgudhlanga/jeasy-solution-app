<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('events', "\App\Modules\Events\Http\Controllers\EventsController");

    /*User*/
    Route::get('user/profile', "\App\Modules\Users\Http\Controllers\UsersController@show")->name('profile');
    Route::post('user/profile', "\App\Modules\Users\Http\Controllers\UsersController@update")->name('profile.update');
});
