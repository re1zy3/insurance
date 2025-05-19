<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\jager;
use App\Http\Middleware\lsAdmin;

Route::get('/', function () {
    return redirect()->route('owners.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Owners resource routes
Route::resource('owners', OwnerController::class)->except(['edit', 'update', 'destroy']);
Route::resource('owners', OwnerController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware('jager:admin');

// Cars resource routes
Route::resource('cars', CarController::class)->only('index');
Route::resource('cars', CarController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware('jager:admin');
Route::resource('cars', CarController::class)
    ->except(['index', 'edit', 'update', 'destroy'])
    ->middleware('jager:viewer');