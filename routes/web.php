<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CloudinaryImageController;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/generate', function () {
    return view('pages.cloudinary.generate');
})->name('cloudinary.generate');


// view Cloudinary images list by user
Route::get('/image/{cloudinaryImage}', [CloudinaryImageController::class, 'show'])->name('cloudinary.images.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/my-gallery', [CloudinaryImageController::class, 'index'])->name('cloudinary.my-gallery');
});

/** Licencias */
Route::get('/legal/license', function () {
    return view('pages.legal.licencia');
})->name('legal.licencias');


/** Pricing */
Route::get('/pricing', function () {
    return view('pages.static.pricing');
})->name('pricing');

/** Login with socialite */
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
