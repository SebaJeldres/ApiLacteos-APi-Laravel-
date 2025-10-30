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

    public function show($id_usuario)
    {
        $user = User::find($id_usuario);

        if (! $user) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'user' => $user,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function delete($id_usuario)
    {
        $user = User::find($id_usuario);
        if (! $user) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $user->delete();

        $data = [
            'message' => 'Usuario eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id_usuario)
    {
        $user = User::find($id_usuario);

        if (! $user) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|unique:user,correo,',
            'password' => 'sometimes|required|min:6',
            'telefono' => 'sometimes|required|string|max:15',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error de validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $user->name = $request->name;
        $user->correo = $request->correo;
        $user->password = bcrypt($request->password);
        $user->telefono = $request->telefono;
        $user->save();

        $data = [
            'message'=> 'Estudiante actualizado',
            'user' => $user,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
