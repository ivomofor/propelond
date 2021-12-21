<?php

use Illuminate\Support\Facades\Route; 
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Auth::routes(['verify' => true]);

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])
->where('any','.*')
->middleware('auth')
->name('home');
