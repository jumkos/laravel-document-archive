<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramController;

Route::apiResource('study-programs', StudyProgramController::class);
Route::apiResource('document-types', App\Http\Controllers\DocumentTypeController::class);
Route::apiResource('certificate-letters', App\Http\Controllers\CertificateLetterController::class);
Route::apiResource('outgoing-letters', App\Http\Controllers\OutgoingLetterController::class);
Route::apiResource('incoming-letters', App\Http\Controllers\IncomingLetterController::class);
Route::apiResource('supervisor-decrees', App\Http\Controllers\SupervisorDecreeController::class);
Route::apiResource('decree-letters', App\Http\Controllers\DecreeLetterController::class);
Route::apiResource('examiner-decrees', App\Http\Controllers\ExaminerDecreeController::class);
Route::apiResource('theses', App\Http\Controllers\ThesisController::class);
Route::apiResource('diplomas', App\Http\Controllers\DiplomaController::class);
Route::apiResource('lecturers', App\Http\Controllers\LecturerController::class);
Route::apiResource('students', App\Http\Controllers\StudentController::class);
