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
        Route::get('/course/{id}/detail', ['uses' => 'CourseController@detail', 'as' => 'course.detail'])->where('id', '[0-9]+');;
        Route::post('/course/{id}/detail', ['uses' => 'CourseController@detailUpdate', 'as' => 'course.detail.update'])->where('id', '[0-9]+');;

        Route::get('/course/lessons', ['uses' => 'CourseLessonController@index', 'as' => 'lesson.index']);
        Route::get('/course/lessons/create', ['uses' => 'CourseLessonController@create', 'as' => 'lesson.create']);
        Route::post('/course/lessons/store', ['uses' => 'CourseLessonController@store', 'as' => 'lesson.store']);
        Route::get('/course/lessons/edit', ['uses' => 'CourseLessonController@edit', 'as' => 'lesson.edit']);
        Route::post('/course/lessons/update', ['uses' => 'CourseLessonController@update', 'as' => 'lesson.update']);
        Route::post('/course/lessons/delete', ['uses' => 'CourseLessonController@delete', 'as' => 'lesson.delete']);
        Route::post('/course/lesson/material/delete', ['uses' => 'CourseLessonController@deleteMaterial', 'as' => 'lesson.material.delete']);
        Route::get('/course/{course_id}/packets', ['uses' => 'PacketController@index', 'as' => 'packet.index'])->where('course_id', '[0-9]+');;
        Route::get('/course/{course_id}/packets/create', ['uses' => 'PacketController@create', 'as' => 'packet.create'])->where('course_id', '[0-9]+');;
        Route::post('/course/{course_id}/packets/store', ['uses' => 'PacketController@store', 'as' => 'packet.store'])->where('course_id', '[0-9]+');;
        Route::post('/course/packets/update/{packet_id}', ['uses' => 'PacketController@update', 'as' => 'packet.update'])->where('packet_id', '[0-9]+');;
        Route::get('/course/packets/edit/{packet_id}', ['uses' => 'PacketController@edit', 'as' => 'packet.edit'])->where('packet_id', '[0-9]+');;
        Route::post('/course/packets/{packet_id}/prices/store', ['uses' => 'PacketPriceController@store', 'as' => 'packet_price.store'])->where('packet_id', '[0-9]+');;
        Route::post('/course/packets/prices/{price_id}/update', ['uses' => 'PacketPriceController@update', 'as' => 'packet_price.update'])->where('price_id', '[0-9]+');;
        Route::get('/course/packets/prices/{price_id}/edit', ['uses' => 'PacketPriceController@edit', 'as' => 'packet_price.edit'])->where('price_id', '[0-9]+');;
        Route::post('/course/packets/attribute/{attribute_id}/delete', ['uses' => 'PacketAttributeController@delete', 'as' => 'attribute.delete'])->where('attribute_id', '[0-9]+');;
        Route::post('/course/packets/attribute/{packet_id}/store', ['uses' => 'PacketAttributeController@store', 'as' => 'attribute.store'])->where('packet_id', '[0-9]+');;
        Route::get('/course/packets/{packet_id}/connection', ['uses' => 'PacketCourseController@index', 'as' => 'packet_course.index'])->where('packet_id', '[0-9]+');;
        Route::get('/course/packets/connect/{packet_id}/{course_id}', ['uses' => 'PacketCourseController@connect', 'as' => 'packet_course.connect'])
            ->where('packet_id', '[0-9]+')->where('course_id', '[0-9]+');
        Route::get('/course/packets/disconnect/{packet_id}/{course_id}', ['uses' => 'PacketCourseController@disconnect', 'as' => 'packet_course.disconnect'])
            ->where('packet_id', '[0-9]+')->where('course_id', '[0-9]+');

    });

    Route::group(['namespace' => 'User'], function () {
        Route::get('/users', ['uses' => 'UserController@index', 'as' => 'user.index']);
        Route::get('/user/edit', ['uses' => 'UserController@edit', 'as' => 'user.edit']);
        Route::post('/user/update', ['uses' => 'UserController@update', 'as' => 'user.update']);
        Route::get('/user/search/', ['uses' => 'UserController@search', 'as' => 'user.search']);
        Route::post('/user/password/reset', ['uses' => 'UserController@resetPassword', 'as' => 'user.password.reset']);

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

