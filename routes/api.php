<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\AuthController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/voters', [VoterController::class, 'store']);
Route::get('/voters/filter', [VoterController::class, 'FilterAndPagination']);
Route::apiResource('voters', VoterController::class);
Route::get('/voters', [VoterController::class, 'index']);
Route::get('/voters/{id}', [VoterController::class, 'show']);
Route::delete('/voters/{id}', [VoterController::class, 'destroy']);

Route::post('/candidates', [CandidateController::class, 'store']);
Route::get('/candidates/filter', [CandidateController::class, 'FilterAndPagination']);
Route::apiResource('candidates', CandidateController::class);
Route::get('/candidates', [CandidateController::class, 'index']);
Route::get('/candidates/{id}', [CandidateController::class, 'show']);
Route::delete('/candidates/{id}', [CandidateController::class, 'destroy']);

Route::post('/votes', [VoteController::class, 'store']);
Route::get('/votes/statistics', [VoteController::class, 'statistics']);
Route::apiResource('votes', VoteController::class);
Route::get('/votes', [VoteController::class, 'index']);
