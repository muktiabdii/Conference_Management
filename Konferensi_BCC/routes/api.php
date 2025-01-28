<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthenticationController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);

Route::post('/edit-user', [UserController::class, 'editUser'])->middleware('auth:sanctum');
Route::get('/search-user', [UserController::class, 'searchUser'])->middleware('auth:sanctum');

Route::get('session', [SessionController::class, 'index'])->middleware(['auth:sanctum']);
