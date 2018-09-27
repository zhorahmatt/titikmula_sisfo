<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return 'tes coba gan';
});

Route::group(['prefix' => 'tm'], function() {
    //admin page
    Route::group(['prefix'  => 'admin', 'namespace' => 'Admin'], function() {
       //admin panel
        Route::get('/','HomeController@index');

        //manajemen user
        Route::group(['prefix'  => 'user'], function() {
            Route::get('/', 'UserController@index');
        });

        //manajemen buku
    });

    //front page
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
