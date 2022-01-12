<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JWTAuth;



//User Authentication

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('update/{id}', [UserController::class, 'update']);
});

Route::get('posts', [PostController::class, 'index'])->middleware('jwtAuth');
Route::get('posts/{id}', [PostController::class, 'show'])->middleware('jwtAuth');
Route::post('posts/create', [PostController::class, 'create'])->middleware('jwtAuth');
Route::put('posts/{id}', [PostController::class, 'update'])->middleware('jwtAuth');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware('jwtAuth');



