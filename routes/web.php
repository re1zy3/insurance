<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::resource('owners', OwnerController::class);

Route::get('/', function () {
    return redirect()->route('owners.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
