<?php

Route::get('/', function () {
    return redirect('/cliente');
});

Route::group(['middleware' => ['web']], function() {

    Route::get('login', 'UsuarioController@login');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::group(['middleware' => ['auth']], function() {
        Route::group(['prefix' => '/cliente/'], function() {
            Route::get('', 'ClienteController@index');
            Route::get('cadastrar', 'ClienteController@cadastrar');

            Route::post('cadastrar', 'ClienteController@store');
        });
    });
});