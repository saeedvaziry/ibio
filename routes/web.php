<?php

use App\Http\Controllers\AppearanceController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MetricController;
use App\Http\Controllers\Oauth\GoogleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('oauth')->group(function () {
    Route::get('google', [GoogleController::class, 'redirect']);
    Route::get('google/callback', [GoogleController::class, 'callback']);
});

Route::middleware('auth')->group(function () {
    // links
    Route::get('/links', [LinkController::class, 'index'])->name('links');
    Route::post('/links/create', [LinkController::class, 'store'])->name('links.create');
    Route::post('/links/update-sort', [LinkController::class, 'updateSort'])->name('links.update-sort');
    Route::post('/links/{link}', [LinkController::class, 'update'])->name('links.update');
    Route::post('/links/{link}/thumbnail', [LinkController::class, 'updateThumbnail'])->name('links.update-thumbnail');
    Route::delete('/links/{link}/thumbnail', [LinkController::class, 'deleteThumbnail'])->name('links.delete-thumbnail');
    Route::post('/links/{link}/{field}', [LinkController::class, 'updateData'])->name('links.update-data');
    Route::delete('/links/{link}', [LinkController::class, 'delete'])->name('links.delete');

    // appearance
    Route::get('/appearance', [AppearanceController::class, 'index'])->name('appearance');
    Route::post('/appearance/themes/{theme}/pick', [AppearanceController::class, 'pickTheme'])->name('appearance.themes.pick');

    // metrics
    Route::get('/metrics', [MetricController::class, 'index'])->name('metrics');

    // profile
    Route::get('/user/profile', [UserController::class, 'index'])->name('profile');
    Route::delete('/user/other-browser-sessions', [UserController::class, 'destroySession'])->name('user.other-browser-sessions.destroy');
    Route::delete('/user/profile-photo', [UserController::class, 'destroyProfilePhoto'])->name('user.current-user-photo.destroy');
    Route::post('/user/social-links-position', [UserController::class, 'updateSocialLinksPosition'])->name('user.social-links-position');

    // social-links
    Route::get('/social-links', [SocialLinkController::class, 'index'])->name('social-links');
    Route::post('/social-links', [SocialLinkController::class, 'store']);
    Route::delete('/social-links/{link}', [SocialLinkController::class, 'delete'])->name('social-links.delete');
});

Route::view('/', 'index')->name('home');
Route::view('/terms', 'terms')->name('terms');
Route::view('/policy', 'policy')->name('policy');

Route::group(['middleware' => 'block-crawlers'], function () {
    Route::get('/{username}', [PageController::class, 'show'])->name('page.show');
    Route::post('/{username}/metrics/{link?}', [PageController::class, 'storeMetric'])->name('page.metrics');
});
