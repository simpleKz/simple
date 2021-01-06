<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Admin\Auth', 'verify' => true], function () {

    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    });
});

Route::group(['namespace' => 'Core', 'middleware' => 'auth'], function () {
    Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    Route::get('/', ['uses' => 'PageController@home']);
});
Route::group(['namespace' => 'Admin\System\Example', 'verify' => true], function () {
Route::group(['middleware' => 'auth'], function () {
    //Categories
    Route::get('/category', ['uses' => 'ExampleController@index', 'as' => 'category.index']);
    Route::post('/category/store', ['uses' => 'ExampleController@store', 'as' => 'category.store']);
    Route::post('/category/update', ['uses' => 'ExampleController@update', 'as' => 'category.update']);
    Route::post('/category/delete', ['uses' => 'ExampleController@delete', 'as' => 'category.delete']);

});
});
