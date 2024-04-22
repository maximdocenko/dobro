<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/view', [\App\Http\Controllers\PostController::class, 'view']);
Route::get('/admins', [\App\Http\Controllers\PostController::class, 'admins']);
Route::get('/images', [\App\Http\Controllers\PostController::class, 'images']);
Route::get('/success', [\App\Http\Controllers\PostController::class, 'success']);
Route::get('/success2', [\App\Http\Controllers\PostController::class, '_success']);

Route::get('/textblocks', [\App\Http\Controllers\PostController::class, 'textblocks']);

Route::get('/people', [\App\Http\Controllers\PostController::class, 'people']);

Route::get('/delta', [\App\Http\Controllers\PostController::class, 'delta']);

Route::get('/newusers', [\App\Http\Controllers\PostController::class, 'newusers']);

Route::get('/post_types', [\App\Http\Controllers\PostController::class, 'post_types']);

Route::get('/additional', [\App\Http\Controllers\PostController::class, 'additional']);

Route::get('/test', [\App\Http\Controllers\PostController::class, 'test']);

Route::get('/postgress_posts', [\App\Http\Controllers\PostController::class, 'postgress_posts']);

