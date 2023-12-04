<?php

use App\Http\Controllers\Api\v1\PoliticianController;
use App\Http\Controllers\Api\v1\SubmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/', [PoliticianController::class, 'index']);
    Route::get('/show/{id}', [PoliticianController::class, 'show']);
    
    Route::post('/submit', [SubmissionController::class, 'userSubmission']);
});



