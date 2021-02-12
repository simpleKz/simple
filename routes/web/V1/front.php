<?php

use App\Models\Entities\Core\Role;
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['uses' => 'PageController@welcome', 'as' => 'index']);
    Route::get('/courses/{slug?}', ['uses' => 'PageController@courses', 'as' => 'courses']);
    Route::get('/course', ['uses' => 'PageController@course']);
    Route::post('/send/email', ['uses' => 'PageController@saveEmailForBulkMailing', 'as' => 'send.email']);


    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => ['ROLE_OR:' . Role::CLIENT_ID]], function () {
            Route::get('/personal-account', ['uses' => 'PageController@profile']);
            Route::get('/profile', ['uses' => 'ProfileController@profile', 'as' => 'profile']);
            Route::get('/my/courses', ['uses' => 'ProfileController@myCourses', 'as' => 'my-courses']);
            Route::post('/profile/update', ['uses' => 'ProfileController@profileUpdate', 'as' => 'profile.update']);
            Route::post('/profile/create/withdrawal-card', ['uses' => 'ProfileController@makeCardWithdrawal', 'as' => 'profile.create.withdrawal']);
            Route::post('/profile/create/ref-link', ['uses' => 'ProfileController@createRefLink', 'as' => 'profile.create.ref-link']);
            Route::get('/my-course/{slug}', ['uses' => 'PageController@myCourse','as' => 'my-course']);

        });


    });
});

Route::group(['namespace' => 'Front\Auth'], function () {

    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);

    Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');

    Route::get('password/reset', ['as' => 'password.request', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}/{email}', ['as' => 'password.reset', 'uses' => 'ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.update', 'uses' => 'ResetPasswordController@reset']);

});


