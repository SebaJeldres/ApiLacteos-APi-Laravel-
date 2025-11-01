<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;



// Rutas Usuarios

Route::get('/users', [userController::class,'index']);

Route::get('/users/{id}', [userController::class,'show']);

Route::post('/users', [userController::class,'store']);

Route::delete('/users/{id}', [userController::class,'delete']);

Route::put('/users/{id}', [userController::class,'update']);

Route::patch('/users/{id}', [userController::class,'updatePartial']);

