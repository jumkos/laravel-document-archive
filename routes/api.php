<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('study-programs', App\Http\Controllers\StudyProgramController::class)->parameters(['study_program' => 'id']);
Route::apiResource('document-types', App\Http\Controllers\DocumentTypeController::class)->parameters(['document_type' => 'id']);
Route::apiResource('certificate-letters', App\Http\Controllers\CertificateLetterController::class)->parameters(['certificate-letters' => 'id']);
Route::apiResource('outgoing-letters', App\Http\Controllers\OutgoingLetterController::class)->parameters(['outgoing_letter' => 'id']);
Route::apiResource('incoming-letters', App\Http\Controllers\IncomingLetterController::class)->parameters(['incoming_letter' => 'id']);
Route::apiResource('supervisor-decrees', App\Http\Controllers\SupervisorDecreeController::class)->parameters(['supervisor_decree' => 'id']);
Route::apiResource('decree-letters', App\Http\Controllers\DecreeLetterController::class)->parameters(['decree_letter' => 'id']);
Route::apiResource('examiner-decrees', App\Http\Controllers\ExaminerDecreeController::class)->parameters(['examiner_decree' => 'id']);
Route::apiResource('theses', App\Http\Controllers\ThesisController::class)->parameters(['thesis' => 'id']);
Route::apiResource('diplomas', App\Http\Controllers\DiplomaController::class)->parameters(['diploma' => 'id']);
Route::apiResource('lecturers', App\Http\Controllers\LecturerController::class)->parameters(['lecturer' => 'id']);
Route::apiResource('students', App\Http\Controllers\StudentController::class)->parameters(['student' => 'id']);
