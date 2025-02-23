<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIfsAdmins;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Esse middleware é para verificar se o usuário está autenticado
Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

        ## Essa rota poderia substituir todas as rotas abaixo
        // Route::resource('/users', UserController::class);
        
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIfsAdmins::class);
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::patch('/users{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users', [UserController::class, 'createdUser'])->name('users.createdUser');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
