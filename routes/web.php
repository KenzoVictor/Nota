<?php

use App\Http\Controllers\notaController;
use Illuminate\Support\Facades\Route;

Route::get('/nota', [notaController::class,'index']);

Route::post('/nota/status', [notaController::class, 'status'])->name('nota.status');

Route::post('/nota/store', [notaController::class,'store'])->name('nota.store');

Route::get('/nota/display', [notaController::class,'display'])->name('nota.display');

Route::put('/nota/update/{id}', [notaController::class,'update'])->name('nota.update');

Route::delete('nota/delete/{id}', [notaController::class,'delete'])->name('nota.delete');