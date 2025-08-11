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

    Route::resource('events',EventController::class);
    Route::get('/events/{event}/setting',[SettingController::class,'eventSetting'])->name('events.setting');
    Route::get('events/{event}/locations',[LocationController::class,'eventLocations'])->name('events.locations');
    Route::get('events/{event}/locations/create',[LocationController::class,'eventLocationCreate'])->name('events.location.create');
    Route::post('events/{event}/locations/store',[LocationController::class,'eventLocationStore'])->name('events.locations.store');
    Route::get('events/{event}/{location}/locations/edit',[LocationController::class,'eventLocationEdit'])->name('events.location.edit');
    Route::put('events/{event}/{location}/locations/update',[LocationController::class,'eventLocationUpdate'])->name('events.locations.update');

    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});
