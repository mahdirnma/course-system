<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::get('register',[AuthController::class,'registerForm'])->name('register.form');
    Route::post('register',[AuthController::class,'register'])->name('register');
});
Route::middleware('auth')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('dashboard');

    Route::resource('events',EventController::class);
    Route::get('/events/{event}/setting',[SettingController::class,'eventSetting'])->name('events.setting');

    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});
