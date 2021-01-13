<?php
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Front'], function () {
    Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    Route::get('/', ['uses' => 'PageController@home']);
});
