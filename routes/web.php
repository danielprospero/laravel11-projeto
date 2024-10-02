<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', [CourseController::class, 'index'])->name('courses.index');

Route::get('/index-course', [CourseController::class, 'index'])->name('courses.index');
Route::get('/create-course', [CourseController::class, 'create'])->name('courses.create');
Route::get('/edit-course', [CourseController::class, 'edit'])->name('courses.edit');
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::delete('/destroy-course', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::put('/update-course', [CourseController::class, 'update'])->name('courses.update');
Route::post('/store-course', [CourseController::class, 'store'])->name('courses.store');