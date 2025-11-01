<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProductoController;



// Rutas Usuarios

Route::get('/users', [userController::class,'index']);

Route::get('/users/{id}', [userController::class,'show']);

Route::post('/users', [userController::class,'store']);

Route::delete('/users/{id}', [userController::class,'delete']);

Route::put('/users/{id}', [userController::class,'update']);

Route::patch('/users/{id}', [userController::class,'updatePartial']);

//Rutas Productos

Route::get('/productos', [ProductoController::class,'index']);

Route::get('/productos/{id}', [ProductoController::class,'show']);

Route::post('/productos', [ProductoController::class,'store']);

Route::delete('/productos/{id}', [ProductoController::class,'delete']);

Route::put('/productos/{id}', [ProductoController::class,'update']);

Route::patch('/productos/{id}', [ProductoController::class,'updatePartial']);