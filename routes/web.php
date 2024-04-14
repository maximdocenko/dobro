<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/view', [\App\Http\Controllers\PostController::class, 'view']);
Route::get('/admins', [\App\Http\Controllers\PostController::class, 'admins']);
Route::get('/images', [\App\Http\Controllers\PostController::class, 'images']);
Route::get('/success', [\App\Http\Controllers\PostController::class, 'success']);
