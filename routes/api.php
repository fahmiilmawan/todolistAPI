<?php

use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);

Route::post('/checklist',[ChecklistController::class, 'store'])->middleware('auth:sanctum');
Route::get('/checklist',[ChecklistController::class, 'index'])->middleware('auth:sanctum');
Route::delete('/checklist/{id}',[ChecklistController::class, 'destroy'])->middleware('auth:sanctum');


Route::get('/checklist/{id}/item',[ChecklistItemController::class, 'index'])->middleware('auth:sanctum');
Route::post('/checklist/{id}/item',[ChecklistItemController::class, 'store'])->middleware('auth:sanctum');
Route::get('/checklist/{checklistID}/item/{checklistItemID}',[ChecklistItemController::class, 'show'])->middleware('auth:sanctum');
Route::put('/checklist/{checklistID}/item/{checklistItemID}',[ChecklistItemController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/checklist/{checklistID}/item/{checklistItemID}',[ChecklistItemController::class, 'destroy'])->middleware('auth:sanctum');
Route::put('/checklist/{checklistID}/item/rename/{checklistItemID}/rename',[ChecklistItemController::class, 'updateRename'])->middleware('auth:sanctum');


