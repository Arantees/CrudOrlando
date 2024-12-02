<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/coffees', [CoffeeController::class, 'index'])->name('coffees.index');

Route::get('/coffees/create', [CoffeeController::class, 'create'])->name('coffees.create');

Route::post('/coffees', [CoffeeController::class, 'store'])->name('coffees.store');

Route::get('/coffees/{coffee}', [CoffeeController::class, 'show'])->name('coffees.show');

Route::get('/coffees/{coffee}/edit', [CoffeeController::class, 'edit'])->name('coffees.edit');

Route::put('/coffees/{coffee}', [CoffeeController::class, 'update'])->name('coffees.update');

Route::delete('/coffees/{coffee}', [CoffeeController::class, 'destroy'])->name('coffees.destroy');

