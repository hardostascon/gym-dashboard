<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/cliente', [ClienteController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('cliente');

Route::post('/cliente', [App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store')
  ->middleware(['auth', 'verified']);


  Route::post('/cliente/edit/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('cliente.update')
  ->middleware(['auth', 'verified']);

   Route::post('/cliente/delete/{id}', [App\Http\Controllers\ClienteController::class, 'delete'])->name('cliente.delete')
  ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
