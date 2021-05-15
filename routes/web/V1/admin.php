<?php

use App\Models\Entities\Core\Role;
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
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'admin.login.post', 'uses' => 'LoginController@login']);
    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    });
});


Route::group(['namespace' => 'Admin\System', 'verify' => true, 'middleware' => ['auth', 'ROLE_OR:' . Role::ADMIN_ID]], function () {
    Route::group(['namespace' => 'Course'], function () {

        //Course Categories
        Route::get('/categories', ['uses' => 'CourseCategoryController@index', 'as' => 'category.index']);
        Route::post('/category/store', ['uses' => 'CourseCategoryController@store', 'as' => 'category.store']);
        Route::post('/category/update', ['uses' => 'CourseCategoryController@update', 'as' => 'category.update']);
        Route::post('/category/delete', ['uses' => 'CourseCategoryController@delete', 'as' => 'category.delete']);

        //Course Authors
        Route::get('/authors', ['uses' => 'CourseAuthorController@index', 'as' => 'author.index']);
        Route::get('/author/edit', ['uses' => 'CourseAuthorController@edit', 'as' => 'author.edit']);
        Route::post('/author/update', ['uses' => 'CourseAuthorController@update', 'as' => 'author.update']);
        Route::post('/author/delete/{id}', ['uses' => 'CourseAuthorController@delete', 'as' => 'author.delete']);

        //Courses
        Route::get('/courses', ['uses' => 'CourseController@index', 'as' => 'course.index']);
        Route::get('/course/create', ['uses' => 'CourseController@create', 'as' => 'course.create']);
        Route::get('/course/edit', ['uses' => 'CourseController@edit', 'as' => 'course.edit']);
        Route::post('/course/store', ['uses' => 'CourseController@store', 'as' => 'course.store']);
        Route::post('/course/update', ['uses' => 'CourseController@update', 'as' => 'course.update']);
        Route::post('/course/delete', ['uses' => 'CourseController@delete', 'as' => 'course.delete']);


        Route::get('/course/lessons', ['uses' => 'CourseLessonController@index', 'as' => 'lesson.index']);
        Route::get('/course/lessons/create', ['uses' => 'CourseLessonController@create', 'as' => 'lesson.create']);
        Route::post('/course/lessons/store', ['uses' => 'CourseLessonController@store', 'as' => 'lesson.store']);
        Route::get('/course/lessons/edit', ['uses' => 'CourseLessonController@edit', 'as' => 'lesson.edit']);
        Route::post('/course/lessons/update', ['uses' => 'CourseLessonController@update', 'as' => 'lesson.update']);
        Route::post('/course/lessons/delete', ['uses' => 'CourseLessonController@delete', 'as' => 'lesson.delete']);
        Route::post('/course/lesson/material/delete', ['uses' => 'CourseLessonController@deleteMaterial', 'as' => 'lesson.material.delete']);
        Route::get('/course/{course_id}/packets', ['uses' => 'PacketController@index', 'as' => 'packet.index'])->where('course_id', '[0-9]+');;
        Route::get('/course/{course_id}/packets/create', ['uses' => 'PacketController@create', 'as' => 'packet.create'])->where('course_id', '[0-9]+');;
    });

    Route::group(['namespace' => 'Setting'], function () {
        Route::get('/sliders', ['uses' => 'SliderController@index', 'as' => 'slider.index']);
        Route::get('/slider/edit', ['uses' => 'SliderController@edit', 'as' => 'slider.edit']);
        Route::post('/slider/update', ['uses' => 'SliderController@update', 'as' => 'slider.update']);
        Route::post('/slider/delete/{id}', ['uses' => 'SliderController@delete', 'as' => 'slider.delete']);
    });

    Route::group(['namespace' => 'BulkMailing'], function () {
        Route::get('/bulk-mailing', ['uses' => 'BulkMailingController@index', 'as' => 'bulk_mailing.index']);
        Route::post('/bulk-mailing/send', ['uses' => 'BulkMailingController@send', 'as' => 'bulk_mailing.send']);
    });

});

Route::group(['namespace' => 'Front', 'verify' => true, 'middleware' => ['auth', 'ROLE_OR:' . Role::ADMIN_ID]], function () {
    Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
});

