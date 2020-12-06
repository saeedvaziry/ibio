<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// auth
Auth::routes([
    'verify' => true,
    'register' => true
]);
Route::post('login/verify', 'Auth\VerifyLoginController@verify')->name('login.verify');

// oauth
Route::group(['prefix' => 'oauth'], function () {
    Route::get('{provider}', 'OauthController@redirectToProvider')->name('oauth');
    Route::get('{provider}/callback', 'OauthController@handleProviderCallback');
});

Route::group(['middleware' => ['auth', '2fa', 'inertia']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // page settings
    Route::group(['prefix' => 'page-settings'], function () {
        // info
        Route::group(['prefix' => 'info'], function () {
            Route::get('/', 'PageSettings\InfoController@index')->name('page-settings.info');
            Route::post('/', 'PageSettings\InfoController@store');
            Route::post('/avatar', 'PageSettings\InfoController@avatar')->name('page-settings.info.avatar');
            Route::delete('/avatar', 'PageSettings\InfoController@deleteAvatar');
            Route::post('/check-username', 'PageSettings\InfoController@checkUsername')->name('page-settings.info.check-username');
            Route::post('/username', 'PageSettings\InfoController@username')->name('page-settings.info.username');
        });
        // links
        Route::group(['prefix' => 'links'], function () {
            Route::get('/', 'PageSettings\LinkController@index')->name('page-settings.links');
            Route::post('/', 'PageSettings\LinkController@store');
            Route::post('/sort', 'PageSettings\LinkController@sort')->name('page-settings.links.sort');
            Route::post('/{link}', 'PageSettings\LinkController@update')->name('page-settings.links.edit');
            Route::delete('/{link}', 'PageSettings\LinkController@destroy')->name('links.destroy');
        });
        // social media
        Route::group(['prefix' => 'social-media'], function () {
            Route::get('/', 'PageSettings\SocialMediaController@index')->name('page-settings.social-media');
            Route::post('/', 'PageSettings\SocialMediaController@store');
        });
        // contact
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', 'PageSettings\ContactController@index')->name('page-settings.contact');
            Route::post('/', 'PageSettings\ContactController@store');
        });
    });
    // settings
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'SettingController@index')->name('settings');
        Route::post('/', 'SettingController@store');
        Route::delete('/', 'SettingController@deleteAccount');
        Route::post('password', 'SettingController@password')->name('settings.password');
        Route::post('2fa/enable', 'SettingController@enable2FA')->name('settings.2fa.enable');
        Route::post('2fa/verify', 'SettingController@verify2FA')->name('settings.2fa.verify');
        Route::post('2fa/disable', 'SettingController@disable2FA')->name('settings.2fa.disable');
    });
    // stats
    Route::group(['prefix' => 'stats'], function () {
        Route::get('/visits', 'StatController@visits')->name('stats.visits');
        Route::get('/clicks', 'StatController@clicks')->name('stats.clicks');
        Route::get('/clicks/{link}', 'StatController@showLink')->name('stats.clicks.show');
    });
    Route::post('/feature-requests/link-type', 'FeatureRequestController@storeLinkType')->name('feature-requests.link-type');
});

Route::get('/go', 'HomeController@go')->name('go');
Route::get('/{username}', 'HomeController@user')->name('user')->middleware('inertia');
