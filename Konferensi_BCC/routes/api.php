<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\SessionRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\AuthenticationController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);

Route::put('/edit-user', [UserController::class, 'editUser'])->middleware('auth:sanctum');
Route::get('/search-user', [UserController::class, 'searchUser'])->middleware('auth:sanctum');

Route::get('session', [SessionController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('session/{id}', [SessionController::class, 'detail'])->middleware(['auth:sanctum', SessionRole::class]);
Route::put('session/{id}', [SessionController::class, 'update'])->middleware(['auth:sanctum', SessionRole::class]);
Route::delete('session/{id}', [SessionController::class, 'delete'])->middleware(['auth:sanctum', SessionRole::class]);


Route::post('/proposal', [ProposalController::class, 'create'])->middleware('auth:sanctum');