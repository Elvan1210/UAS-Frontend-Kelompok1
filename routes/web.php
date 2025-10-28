<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu');

    Route::get('/menu/input', [MenuController::class, 'input'])->name('menu.input');
    Route::get('/menu/list', [MenuController::class, 'list'])->name('menu.list');
    Route::post('/menu/save', [MenuController::class, 'save'])->name('menu.save');

    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

Route::prefix('api')->group(function () {
    Route::get('/menus', [MenuController::class, 'index']);
    Route::post('/menus', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menus/{id}', [MenuController::class, 'show']);
    Route::put('/menus/{id}', [MenuController::class, 'update']);
    Route::delete('/menus/{id}', [MenuController::class, 'destroy']);
});
