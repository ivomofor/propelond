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
Route::post('updatePassword', [AuthController::class, 'updatePassword']);


Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('/user/{user} ', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show']);
    Route::delete('/user/{id}',[App\Http\Controllers\UserController::class, 'destroy']);

});

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show'])->middleware('jwtAuth');
Route::post('posts', [PostController::class, 'create'])->middleware('jwtAuth');
Route::put('posts/{id}', [PostController::class, 'update'])->middleware('jwtAuth');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware('jwtAuth');
Route::post('posts/{post_id}/comments/', [UserController::class, 'create'])->middleware('jwtAuth');


?>

