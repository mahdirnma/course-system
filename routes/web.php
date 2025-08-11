<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
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

        Route::get('/{event}/setting',[SettingController::class,'eventSetting'])->name('events.setting');

        Route::get('/{event}/locations',[LocationController::class,'eventLocations'])->name('events.locations');
        Route::get('/{event}/locations/create',[LocationController::class,'eventLocationCreate'])->name('events.location.create');
        Route::post('/{event}/locations/store',[LocationController::class,'eventLocationStore'])->name('events.locations.store');
        Route::get('/{event}/{location}/locations/edit',[LocationController::class,'eventLocationEdit'])->name('events.location.edit');
        Route::put('/{event}/{location}/locations/update',[LocationController::class,'eventLocationUpdate'])->name('events.locations.update');
        Route::delete('/{event}/{location}/locations/destroy',[LocationController::class,'eventLocationDestroy'])->name('events.locations.destroy');

        Route::get('/{event}/media',[MediaController::class,'eventMedia'])->name('events.media');

    });

    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});
