<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Done
///////////////////////////////////  homePage Route ///////////////////////////////////////
Route::controller(HomepageController::class)->prefix('homePage')->group(function () {
    Route::get('/offers', 'offers');
    Route::get('/subCategories', 'subCategories');
    Route::get('/subCategoryProducts/{subCategory}', 'subCategoryProducts');
    Route::get('/product/{product}', 'product');
});
///////////////////////////////////   End homePage Route ///////////////////////////////////

Route::middleware('auth:sanctum')->group(function () {

// Done
//////////////////////////////////  Cart Route ///////////////////////////////////////
    Route::controller(CartController::class)->prefix('cart')->group(function () {
        Route::get('/index', 'index');
        Route::get('/store/{product}', 'store');
    });
///////////////////////////////////   End Cart Route ///////////////////////////////////
// Done
//////////////////////////////////  Comment Route ///////////////////////////////////////
    Route::controller(CommentController::class)->prefix('comment')->group(function () {
        Route::post('/store/{product}', 'store');
        Route::get('/show/{product}', 'show');
    });
///////////////////////////////////   End Comment Route ///////////////////////////////////
// Done
//////////////////////////////////  Review Route ///////////////////////////////////////
    Route::controller(ReviewController::class)->prefix('review')->group(function () {
        Route::post('/store/{product}', 'store');
        Route::get('/show/{product}', 'show');
    });
///////////////////////////////////   End Review Route ///////////////////////////////////
/// Done
//////////////////////////////////  order Route ///////////////////////////////////////
    Route::controller(OrderController::class)->prefix('order')->group(function () {
        Route::post('/store/{product}', 'store');
        Route::get('/show', 'show');
    });
///////////////////////////////////   End order Route ///////////////////////////////////
});

// Done
//////////////////////////////////  search Route ///////////////////////////////////////
Route::post('/search', [SearchController::class, 'index']);
///////////////////////////////////   End search Route ///////////////////////////////////



