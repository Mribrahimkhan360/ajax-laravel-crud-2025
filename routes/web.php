<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/add-student', function () {
    return view('index');
});

Route::post('/add-student', [StudentController::class, 'store'])->name('student');
Route::get('/get-student', function () {
    return view('students');
});

Route::get('/get-all-students',[StudentController::class,'getAllStudents'])->name('getAllStudents');