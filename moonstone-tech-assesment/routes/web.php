<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/atest', [AtestController::class, 'index']);
Route::get('/search', [AtestController::class, 'index'])->name('items.search');