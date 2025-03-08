<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])->name('main');
// Route::get('/list', [App\Http\Controllers\MainController::class, 'list_user'])->name('list');


Route::get('/', function () {
    return view('main');
})->name('main');