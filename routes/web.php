<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Aqui tenho que colocar SEMPRE no PLURAL o nome da rota (barra algo -> '/USERS/algo')
// Quando eu estou esperando algo, tenho que colocar no SINGULAR (igual no parametro dentro das chaves -> {user})

Route::get('/', [MainController::class, 'index'])->name('main');
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


/// Posso substituir todas as rotas por apenas essa:
Route::resource('users', UserController::class);


// Route::get('/', function () {
//     return view('main');
// })->name('main');