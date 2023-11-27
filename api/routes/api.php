<?php

use App\Http\Controllers\Api\v1\PoliticianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/', [PoliticianController::class, 'index']);
});



