<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\GetsuChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GetsuChatController::class, 'index']);

// Protected routes
Route::resource('chatmodel', GetsuChatController::class)
    ->middleware(['auth', 'verified']);

// Registration routes
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', Register::class)
    ->middleware('guest');

// Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('/login', Login::class)
    ->middleware('guest');

// Logout route
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');
