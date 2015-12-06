<?php

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('login_form');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('register_form');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail')->name('password_reset');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Profile routes
Route::get('profile', 'ProfileController@getForm')->name('profile');
Route::post('profile', 'ProfileController@postReset');




Route::get('/', function() {
    return 'hw' . (Auth::check() ? Auth::user()->name : 'no user');
})->name('home');



Route::get('test', 'TestController@test');

Route::get('noauth', 'TestController@noauth');



//Route::resource();

Route::group(['prefix' => 'patterns'], function() {
    Route::get('', 'PatternController@index');
    Route::get('create', 'PatternController@create')->name('pattern_create');
    Route::post('store', 'PatternController@store');
    Route::get('edit/{pattern}', 'PatternController@edit');
    Route::get('update/{pattern}', 'PatternController@update');
    Route::get('delete/{pattern}', 'PatternController@delete');
});