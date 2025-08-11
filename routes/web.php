<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShowController;
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
        Route::get('/{event}/media/create',[MediaController::class,'eventMediaCreate'])->name('events.media.create');
        Route::post('/{event}/media/store',[MediaController::class,'eventMediaStore'])->name('events.media.store');
        Route::get('/{event}/{media}/media/edit',[MediaController::class,'eventMediaEdit'])->name('events.media.edit');
        Route::put('/{event}/{media}/media/update',[MediaController::class,'eventMediaUpdate'])->name('events.media.update');
        Route::delete('/{event}/{media}/media/destroy',[MediaController::class,'eventMediaDestroy'])->name('events.media.destroy');
    });
    Route::prefix('courses')->group(function () {
        Route::resource('courses',CourseController::class);

        Route::get('/{course}/setting',[SettingController::class,'courseSetting'])->name('courses.setting');

        Route::get('/{course}/locations',[LocationController::class,'courseLocations'])->name('courses.locations');
        Route::get('/{course}/locations/create',[LocationController::class,'courseLocationCreate'])->name('courses.location.create');
        Route::post('/{course}/locations/store',[LocationController::class,'courseLocationStore'])->name('courses.locations.store');
        Route::get('/{course}/{location}/locations/edit',[LocationController::class,'courseLocationEdit'])->name('courses.location.edit');
        Route::put('/{course}/{location}/locations/update',[LocationController::class,'courseLocationUpdate'])->name('courses.locations.update');
        Route::delete('/{course}/{location}/locations/destroy',[LocationController::class,'courseLocationDestroy'])->name('courses.locations.destroy');

        Route::get('/{course}/media',[MediaController::class,'courseMedia'])->name('courses.media');
        Route::get('/{course}/media/create',[MediaController::class,'courseMediaCreate'])->name('courses.media.create');
        Route::post('/{course}/media/store',[MediaController::class,'courseMediaStore'])->name('courses.media.store');
        Route::get('/{course}/{media}/media/edit',[MediaController::class,'courseMediaEdit'])->name('courses.media.edit');
        Route::put('/{course}/{media}/media/update',[MediaController::class,'courseMediaUpdate'])->name('courses.media.update');
        Route::delete('/{course}/{media}/media/destroy',[MediaController::class,'courseMediaDestroy'])->name('courses.media.destroy');

    });
    Route::prefix('shows')->group(function () {
        Route::resource('shows',ShowController::class);
    });
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});
