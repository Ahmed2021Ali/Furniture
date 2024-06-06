<?php

use Illuminate\Support\Facades\Route;


//Done
Route::resource('category', \App\Http\Controllers\CategoryController::class)->except(['edit', 'create']);

//Done
Route::resource('subCategory', \App\Http\Controllers\SubcategoryController::class)->except(['edit', 'create']);

//Done
Route::resource('size', \App\Http\Controllers\SizeController::class)->except(['edit','show', 'create']);

//Done
Route::resource('color', \App\Http\Controllers\ColorController::class)->except(['edit', 'show','create']);

//Done
Route::resource('product', \App\Http\Controllers\ProductController::class)->except(['edit', 'create']);



