<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('producte', ProducteController::class)
    ->parameters(['producte' => 'producte']);

Route::resource('categoria', CategoriaController::class)
    ->middleware('auth')
    ->parameters(['categoria' => 'categoria']);

Route::middleware('auth')->group(function () {
    Route::post('/producte', [ProducteController::class, 'store'])->name('producte.store');
    Route::get('/producte/create', [ProducteController::class, 'create'])->name('producte.create');
    Route::put('/producte/{producte}', [ProducteController::class, 'update'])->name('producte.update');
    Route::delete('/producte/{producte}', [ProducteController::class, 'destroy'])->name('producte.destroy');
    Route::get('/producte/{producte}/edit', [ProducteController::class, 'edit'])->name('producte.edit');
});