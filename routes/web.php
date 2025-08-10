<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
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
    Route::prefix('events')->group(function () {
        Route::resource('events',EventController::class);
        Route::get('/events/{event}/setting',[SettingController::class,'eventSetting'])->name('events.setting');
        Route::get('events/{event}/locations',[LocationController::class,'eventLocations'])->name('events.locations');
        Route::get('events/{event}/locations/create',[LocationController::class,'eventLocationCreate'])->name('events.location.create');
        Route::get('events/{event}/locations/store',[LocationController::class,'eventLocationStore'])->name('events.locations.store');
    });

    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});
