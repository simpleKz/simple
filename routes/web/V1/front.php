<?php
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['uses' => 'PageController@welcome', 'as' => 'index']);
    Route::get('/courses/{slug?}', ['uses' => 'PageController@courses', 'as' => 'courses']);
    Route::get('/course', ['uses' => 'PageController@course']);
    Route::get('/my-course', ['uses' => 'PageController@myCourse']);
    Route::get('/personal-account', ['uses' => 'PageController@profile']);
});
