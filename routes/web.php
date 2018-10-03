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
        Route::resource('user', 'UserController');

        //manajemen penulis
        Route::resource('penulis', 'PenulisController');
        Route::group(['prefix' => 'penulis'], function() {
            Route::get('/{penuli}/delete', ['as' => 'penulis.delete', 'uses' => 'PenulisController@delete']);
        });

        //manajemen penerbit
        Route::resource('penerbit', 'PenerbitController');
        Route::group(['prefix' => 'penerbit'], function() {
            Route::get('/{penerbit}/delete', ['as' => 'penerbit.delete', 'uses' => 'PenerbitController@delete']);
        });

        //manajemen kategori
        Route::resource('kategori', 'KategoriController');
        Route::group(['prefix' => 'kategori'], function() {
            Route::get('/{kategori}/delete', ['as' => 'kategori.delete', 'uses' => 'KategoriController@delete']);
        });

        //manajemen member
        Route::resource('member', 'MemberController');
        Route::group(['prefix' => 'member'], function() {
            Route::get('/{member}/delete', ['as' => 'member.delete', 'uses' => 'MemberController@delete']);
        });
    });

    //front page
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
