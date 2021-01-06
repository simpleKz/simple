<?php
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Core', 'middleware' => 'auth'], function () {
    Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    Route::get('/', ['uses' => 'PageController@home']);
});
