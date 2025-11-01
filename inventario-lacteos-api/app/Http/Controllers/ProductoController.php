<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\http\controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        if ($productos->isEmpty()) {
            $data = [
                'message' => 'No se encontraron productos',
                'statues' => 404
            ];
            return response()->json($data, 404);
        }

        return response()->json($productos, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, )
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id_producto)
    {
        $producto = Producto::find($id_producto);

        if (!$producto) {
            $data = [
                'message' => 'Producto no encontrado',
                'statues' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'Producto' => $producto,
            'statues' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete($id_producto)
    {
        $producto = Producto::find($id_producto);

        if(!$producto) {
            $data = [
                'message' => 'No se encontro el producto',
                'statues' => 404
            ];
            return response()->json($data, 404);
        }

        $producto->delete();

        $data = [
            'message' => 'Se elimino de manera correcta',
            'statues' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
