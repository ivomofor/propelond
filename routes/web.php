<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

 
//  Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
// Route::get('/', [PagesController::class, 'index']);
// Route::resource('/post', PostsController::class);
// Route::resource('/user', UserController::class);
// Auth::routes(['verify' => true]);


// Route::group([
    
//     'middleware' => 'api',
//     'prefix'=>'auth',

// ],
//     function(){
//         Route::post('/register',[AuthController::class, 'register']);
       
//     }
// );


// Route::group([
    
//     'middleware' => 'api',
//     'prefix'=>'auth',
// ],
//     function(){
//         Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
        
//     }
// );

Route::prefix('auth')->group(function () {
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

});

Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
});
