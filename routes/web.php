<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// auth
Auth::routes([
    'verify' => true,
    'register' => true
]);
Route::post('login/verify', 'Auth\VerifyLoginController@verify')->name('login.verify');

Route::group(['middleware' => ['auth', '2fa', 'inertia']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // links
    Route::group(['prefix' => 'links'], function () {
        Route::get('/', 'LinkController@index')->name('links');
        Route::get('/create', 'LinkController@create')->name('links.create');
        Route::post('/create', 'LinkController@store');
        Route::post('/sort', 'LinkController@sort')->name('links.sort');
        Route::get('/{link}/edit', 'LinkController@edit')->name('links.edit');
        Route::put('/{link}/edit', 'LinkController@update');
        Route::delete('/{link}', 'LinkController@destroy')->name('links.destroy');
    });
    // page settings
    Route::group(['prefix' => 'page-settings'], function () {
        Route::get('/', 'PageSettingController@index')->name('page-settings');
        Route::post('/', 'PageSettingController@store');
    });
    // settings
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'SettingController@index')->name('settings');
        Route::post('/', 'SettingController@store');
        Route::post('password', 'SettingController@password')->name('settings.password');
        Route::post('2fa/enable', 'SettingController@enable2FA')->name('settings.2fa.enable');
        Route::post('2fa/verify', 'SettingController@verify2FA')->name('settings.2fa.verify');
        Route::post('2fa/disable', 'SettingController@disable2FA')->name('settings.2fa.disable');
    });
});

Route::get('/{username}', 'HomeController@user')->name('user')->middleware('inertia');
Route::get('/go/{link}', 'HomeController@go');
