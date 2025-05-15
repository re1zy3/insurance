<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::resource('owners', OwnerController::class);


Route::get('/', function () {
    return redirect()->route('owners.index');
});

