<?php
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::apiResource('owners', OwnerController::class);
Route::apiResource('cars', CarController::class);