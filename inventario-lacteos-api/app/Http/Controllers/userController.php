<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $data = [
                'message' => 'No se encontraron usuarios',
                'statues' => 404
            ];
            return response()->json($data, 404);
        }

        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'correo' => 'required|email|unique :user,correo',
            'password' => 'required|min:6',
            'telefono' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error de validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        
        $user = User::create([
            'name'=> $request->name,
            'correo'=> $request->correo,
            'password'=> bcrypt($request->password),
            'telefono'=> $request->telefono,
        ]);

        if (! $user) {
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'user' => $user,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
