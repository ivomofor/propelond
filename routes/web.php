<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Auth::routes(['verify' => true]);

Route::get('/', [PagesController::class, 'index']);

Route::resource('/post', PostsController::class);
Route::resource('/user', UserController::class);
Route::get('/liked/{id}', [LikeController::class, 'like']);
Route::get('/unlike/{id}', [LikeController::class, 'dislike']);
Route::post('commented/{id}', [CommentController::class, 'comment']);









Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/', [PagesController::class, 'index']);

Route::resource('/post', PostsController::class);
// Route::resource('/user', UserController::class);


Auth::routes(['verify' => true]);

?>
