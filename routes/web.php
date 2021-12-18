<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;

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



Route::get('/', [PagesController::class, 'index']);

Route::resource('/post', PostsController::class);
Route::resource('/user', UserController::class);


Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/user-profile', [App\Http\Controllers\UserProfileController::class, 'userProfile'])->name('user-profile');
// Route::get('/edit-user-profile/{user}', [App\Http\Controllers\UserProfileController::class, 'editUserProfile'])->name('edit-user-profile');
// Route::post('/update-user-profile/{user}', [App\Http\Controllers\UserProfileController::class, 'updateUSerProfile'])->name('update-user-profile');






