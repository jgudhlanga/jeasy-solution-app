<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'v1'], function () {
    $eventApiController = "\App\Modules\Events\Http\Controllers\Api\EventsController@handleRegistration";
    Route::post('handle-registration',$eventApiController)->name('handle-registration');
    $userApiController = "\App\Modules\Users\Http\Controllers\Api\UsersController@stockData";
    Route::post('stock-data',$userApiController)->name('stock-data');
});