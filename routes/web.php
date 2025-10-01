<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/add-student', function () {
    return view('index');
});
Route::post('/add-student', [StudentController::class, 'store'])->name('student');
Route::get('/get-student', function () {
    return view('students');
});
Route::get('/get-all-students',[StudentController::class,'getAllStudents'])->name('getAllStudents');




Route::get('/parctice', function () {
    return view('parctice.index');
});
Route::post('/parctice',[StudentInfoController::class,'store'])->name('getAllStudentinfo');
Route::get('/get-studentinfo', function () {
    return view('parctice.students');
});
Route::get('/get-all-studentsinfo',[StudentInfoController::class,'getAllStudentinfomation'])->name('getAllStudentinfomation');
