<?php

use Illuminate\Support\Facades\Route;


///////////////////////////////////  Authentication Route ///////////////////////////////////
Route::middleware('setLocale')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
    });
});
///////////////////////////////////   End Authentication Route ///////////////////////////////////


// Profile User
///////////////////////////////////  Profile Route ///////////////////////////////////////
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(\App\Http\Controllers\ProfileController::class)->prefix('profile')->group(function () {
        Route::get('/getCurrentUser', 'getCurrentUser');
        Route::PUT('/update', 'update');
        Route::get('/logout', 'logout');
        Route::delete('/delete', 'delete');
    });
});
///////////////////////////////////   End Profile Route ///////////////////////////////////
