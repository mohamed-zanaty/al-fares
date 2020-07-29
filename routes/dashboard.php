<?php

use Illuminate\Support\Facades\Route;


//Main_Dashboard
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard'], function () {

//for HomeDashboard
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        });//auth


//for login
        Route::group(['middleware' => 'guest:admin'], function () {
            Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
            Route::post('login', 'LoginController@login')->name('admin.login');
        });//guest

        Route::group(['middleware' => 'auth:admin'], function () {

//for logout
            Route::post('logout', 'LoginController@logout')->name('logout.admin');

            //for Moderators
            Route::resource('moderator', 'ModeratorController');

            //for Categories
            Route::resource('category', 'CategoryController');
            //for Categories
            Route::resource('setting', 'SettingController');


            //for Blog
            Route::resource('blog', 'BlogController');
            Route::get('blog.get', 'BlogController@get')->name('blog.get');
            Route::post('blog.get/{id}', 'BlogController@change')->name('blog.change');
            //for videos
            Route::get('blog.videos', 'BlogController@video_index')->name('blog.video.index');
            Route::get('blog.video.create/{id}', 'BlogController@video_create')->name('blog.video.create');
            Route::post('blog.video.store', 'BlogController@video_store')->name('blog.video.store');
            Route::get('blog.video.edit/{id}', 'BlogController@video_edit')->name('blog.video.edit');
            Route::post('blog.video.update', 'BlogController@video_update')->name('blog.video.update');
            Route::delete('blog.video.delete/{id}', 'BlogController@video_delete')->name('blog.video.delete');

            //for projects
            Route::get('blog.projects', 'BlogController@project_index')->name('blog.project.index');
            Route::get('blog.project/{id}', 'BlogController@project_create')->name('blog.project.create');
            Route::post('blog.project.store', 'BlogController@project_store')->name('blog.project.store');
            Route::get('blog.project.edit/{id}', 'BlogController@project_edit')->name('blog.project.edit');
            Route::post('blog.project.update', 'BlogController@project_update')->name('blog.project.update');
            Route::delete('blog.project.delete/{id}', 'BlogController@project_delete')->name('blog.project.delete');



            //for profile
            Route::get('profile', 'ProfileController@edit')->name('profile.edit');
            Route::put('update', 'ProfileController@update')->name('profile.update');
            Route::put('update.password', 'ProfileController@update_password')->name('profile.update.password');

        });//auth

    });//for admin

    //for contact
    Route::get('contact', 'Front\FrontController@contact_index')->name('contact.index');
    Route::delete('contact/{id}', 'Front\FrontController@contact_delete')->name('contact.destroy');
});//for lang
