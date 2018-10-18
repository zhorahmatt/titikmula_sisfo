<?php

Route::group(['prefix' => '','namespace'  => 'Peminjaman'], function() {
    //buatkan untuk route peminjaman
    // Route::get('/', ['as' => 'peminjaman.index','uses' => 'PeminjamanController@index']);
    Route::get('/add', ['as' => 'peminjaman.add', 'uses' => 'PeminjamanController@create']);
    Route::resource('peminjaman', 'PeminjamanController');
});