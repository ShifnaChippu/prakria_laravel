<?php

use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/add-project', [ProjectController::class, 'store']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::delete('/delete-project/{id}', [ProjectController::class, 'destroy']);
Route::get('/edit-project/{id}', [ProjectController::class, 'edit']);
Route::put('/update-project/{id}', [ProjectController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
