<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use Illuminate\Http\Request;

class StockTotalController extends Controller
{
    public function getStockTotal() {
        
        $productos = Producto::select('nombre','stock')->get();

        $sumaTotalStock = $productos->sum('stock');

        return response()->json([
            'productos' => $productos,
            'total_stock' => $sumaTotalStock
        ]);

       
    }
}
