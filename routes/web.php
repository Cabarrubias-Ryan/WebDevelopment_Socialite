<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/register', [AuthController::class, 'index'])->name('regiter.auth');
Route::post('/register/add', [AuthController::class, 'register'])->name('regiter.auth.add');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth.process');
Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirect'])->name('auth.provider.redirect');
Route::get('/auth/{provider}/callback', [AuthController::class, 'callback'])->name('auth.provider.callback');






Route::middleware(['auth'])->group(function () {
    Route::get('/home',[HomeController::class, 'index'])->name('home');   
    Route::get('/home/logout', [AuthController::class, 'logout'])->name('logout.auth.process'); 
});
