<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// backend ROUTES

// start login
Route::group(['namespace' => 'Auth'],function() {

    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('login');

});


Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::middleware(['auth'])->group(function (){

        Route::group(["namespace" => "Dashboard"],function() {

            // start dashboard
            Route::get('admin', 'DashboardController@index')->name('admin');

            // all routes => dashboard
            Route::group(['name' => 'admin.',"prefix" => 'admin'],function () {

                Route::resource('album',"AlbumController")->except('show');
                Route::get('searchAlbum','AlbumController@searchAlbum')->name('searchAlbum');
                Route::post('remove_image','AlbumController@remove_images')->name('remove_image');
                Route::post('transferAlbum','AlbumController@transferAlbum')->name('transferAlbum');

            });

        });

    });

});

// start logout

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
