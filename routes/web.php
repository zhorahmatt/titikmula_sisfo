<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'tm'], function() {
    //admin page
    Route::group(['prefix'  => 'admin', 'namespace' => 'Admin'], function() {
       //admin panel
        Route::get('/','HomeController@index');

        //manajemen user
        Route::resource('user', 'UserController')->except(['destroy']);
        Route::group(['prefix' => 'user'], function() {
            Route::get('/{user}/delete', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
        });

        //manajemen RBAC
        Route::resource('role', 'RoleController')->except(['destroy']);
        Route::group(['prefix' => 'role'], function() {
            Route::get('/{role}/delete', ['as' => 'role.delete', 'uses' => 'RoleController@delete']);
        });

        Route::resource('access', 'AccessController')->except(['destroy']);
        Route::group(['prefix' => 'access'], function() {
            Route::get('/{access}/delete', ['as' => 'access.delete', 'uses' => 'AccessController@delete']);
        });

        //manajemen penulis
        Route::resource('penulis', 'PenulisController')->except(['destroy']);
        Route::group(['prefix' => 'penulis'], function() {
            Route::get('/{penuli}/delete', ['as' => 'penulis.delete', 'uses' => 'PenulisController@delete']);
        });

        //manajemen penerbit
        Route::resource('penerbit', 'PenerbitController')->except(['destroy']);
        Route::group(['prefix' => 'penerbit'], function() {
            Route::get('/{penerbit}/delete', ['as' => 'penerbit.delete', 'uses' => 'PenerbitController@delete']);
        });

        //manajemen kategori
        Route::resource('kategori', 'KategoriController')->except(['destroy']);
        Route::group(['prefix' => 'kategori'], function() {
            Route::get('/{kategori}/delete', ['as' => 'kategori.delete', 'uses' => 'KategoriController@delete']);
        });

        //manajemen member
        Route::resource('member', 'MemberController')->except(['destroy']);
        Route::group(['prefix' => 'member'], function() {
            Route::get('/{member}/delete', ['as' => 'member.delete', 'uses' => 'MemberController@delete']);
        });

        //manajemen buku
        Route::resource('buku', 'BukuController')->except(['destroy']);
        Route::group(['prefix' => 'buku'], function() {
            Route::get('/{buku}/delete', ['as' => 'buku.delete', 'uses' => 'BukuController@delete']);
        });
    });

    //front page
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');