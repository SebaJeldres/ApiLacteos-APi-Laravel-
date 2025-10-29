<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/users', [userController::class,'index']);

Route::get('/users/{id_usuario}', function (){
    return 'usuario específico';
});

Route::post('/users', [userController::class,'store']);


Route::put('/users/{id_usuario}', function (){
    return 'actualizando usuario';
});

Route::delete('/users/{id_usuario}', function (){
    return 'eliminando usuario';
});