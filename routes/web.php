<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// STUDENTS ROUTES
Route::get('/', [StudentsController::class, 'index'])->name('std.index');
Route::put('/students/update/{id}', [StudentsController::class, 'update'])->name('std.update');
Route::delete('/students/delete/{id}', [StudentsController::class, 'destroy'])->name('std.delete');
Route::post('/students/store', [StudentsController::class, 'store'])->name('std.create');