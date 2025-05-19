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
Route::resource('owners', OwnerController::class)->except(['edit', 'update', 'destroy']);
Route::resource('owners', OwnerController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware('jager:admin');

// Cars resource routes
Route::resource('cars', CarController::class)->only(['index']);
Route::resource('cars', CarController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('jager:admin');
Route::resource('cars', CarController::class)
    ->except(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('jager:viewer');