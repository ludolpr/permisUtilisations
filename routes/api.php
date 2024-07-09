<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SectorController;
use App\Http\Controllers\API\LisenceController;
use App\Http\Controllers\API\UserController;

// My way !!
Route::apiResource("sectors", SectorController::class);
Route::apiResource("lisences", LisenceController::class);
Route::apiResource("users", UserController::class);
