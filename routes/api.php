<?php

use App\Http\Controllers\Api\SclassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/class', [SclassController::class, 'index']);
Route::post('/class/store', [SclassController::class, 'store']);
Route::post('/class/edit/{id}', [SclassController::class, 'edit']);
Route::get('/class/delete/{id}', [SclassController::class, 'deleteClass']);