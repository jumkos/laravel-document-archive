<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('study-programs', App\Http\Controllers\StudyProgramController::class)->parameters(['study-programs' => 'id']);
Route::apiResource('document-types', App\Http\Controllers\DocumentTypeController::class)->parameters(['document-types' => 'id']);
Route::apiResource('certificate-letters', App\Http\Controllers\CertificateLetterController::class)->parameters(['certificate-letters' => 'id']);
Route::apiResource('outgoing-letters', App\Http\Controllers\OutgoingLetterController::class)->parameters(['outgoing-letters' => 'id']);
Route::apiResource('incoming-letters', App\Http\Controllers\IncomingLetterController::class)->parameters(['incoming-letters' => 'id']);
Route::apiResource('supervisor-decrees', App\Http\Controllers\SupervisorDecreeController::class)->parameters(['supervisor-decrees' => 'id']);
Route::apiResource('decree-letters', App\Http\Controllers\DecreeLetterController::class)->parameters(['decree-letters' => 'id']);
Route::apiResource('examiner-decrees', App\Http\Controllers\ExaminerDecreeController::class)->parameters(['examiner-decrees' => 'id']);
Route::apiResource('theses', App\Http\Controllers\ThesisController::class)->parameters(['theses' => 'id']);
Route::apiResource('diplomas', App\Http\Controllers\DiplomaController::class)->parameters(['diplomas' => 'id']);
Route::apiResource('lecturers', App\Http\Controllers\LecturerController::class)->parameters(['lecturers' => 'id']);
Route::apiResource('students', App\Http\Controllers\StudentController::class)->parameters(['students' => 'id']);
