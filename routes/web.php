<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\CafeController;


Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index');
Route::get('/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/fornecedores', [FornecedorController::class, 'store'])->name('fornecedores.store');
Route::get('/fornecedores/{id}/edit', [FornecedorController::class, 'edit'])->name('fornecedores.edit');
Route::put('/fornecedores/{id}', [FornecedorController::class, 'update'])->name('fornecedores.update');
Route::delete('/fornecedores/{id}', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');


Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/create', [CafeController::class, 'create'])->name('cafes.create');
Route::post('/cafes', [CafeController::class, 'store'])->name('cafes.store');
Route::get('/cafes/{id}/edit', [CafeController::class, 'edit'])->name('cafes.edit');
Route::put('/cafes/{id}', [CafeController::class, 'update'])->name('cafes.update');
Route::delete('/cafes/{id}', [CafeController::class, 'destroy'])->name('cafes.destroy');