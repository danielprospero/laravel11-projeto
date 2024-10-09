<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClasseController;

Route::get('/', function () {
    return view('welcome');
});

// Cursos
Route::get('/index-course', [CourseController::class, 'index'])->name('course.index');
Route::get('/create-course', [CourseController::class, 'create'])->name('course.create');
Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit');
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::post('/store-course', [CourseController::class, 'store'])->name('course.store');

// Aulas
Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index');
Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show');
Route::get('/create-classe/{course}', [ClasseController::class, 'create'])->name('classe.create');
Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store');
