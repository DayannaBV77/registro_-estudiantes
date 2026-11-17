<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/estudiantes', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::post('/estudiantes', [StudentController::class, 'store']);
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');