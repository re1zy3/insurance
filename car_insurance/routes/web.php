<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ShortCodeController;

Route::resource('owners', OwnerController::class);

Route::resource('cars', CarController::class);

Route::get('/', function () {
    return redirect()->route('owners.index');
});


Auth::routes();
Route::resource('owners', OwnerController::class)
    ->middleware('auth');

Route::resource('cars',   CarController::class)
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    // view‐only for everyone:
    Route::resource('owners', OwnerController::class)
        ->only(['index','show']);
    Route::resource('cars',   CarController::class)
        ->only(['index','show']);

    // editing only for editors:
    Route::middleware('editor')->group(function() {
        Route::resource('owners', OwnerController::class)
            ->except(['index','show']);
        Route::resource('cars',   CarController::class)
            ->except(['index','show']);
    });
    Route::middleware(['auth','editor'])
        ->resource('shortcodes', ShortCodeController::class);

    Route::resource('short_codes', ShortCodeController::class)
        ->middleware(['auth','editor']);

});
