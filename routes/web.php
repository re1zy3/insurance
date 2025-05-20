<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LangController;
use App\Http\Middleware\jager;
use App\Http\Middleware\lsAdmin;

Route::get('/', function () {
    return redirect()->route('owners.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Language switch route
Route::get('setLanguage/{lang}', [LangController::class, 'switchLang'])->name('setLanguage');

// Owners resource routes
Route::resource('owners', OwnerController::class);

// Cars resource routes
Route::resource('cars', CarController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

// Photos 
Route::post('cars/{car}/photos', [CarController::class, 'uploadPhotos'])->name('cars.photos.upload')->middleware('jager:admin');
Route::delete('car-photos/{photo}', [CarController::class, 'deletePhoto'])->name('cars.photos.delete')->middleware('jager:admin');