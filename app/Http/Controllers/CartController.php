<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Producto;

class CartController extends Controller
{
    //

    public function recovery($nOrden)
    {

        $compra = Compra::where("n_orden", $nOrden)->first();
        $request_data = json_decode($compra->request_data);
        $productosCarro = json_decode($request_data->carrito)->productos ?? [];
        $productos = [];
        foreach ($productosCarro as $key => $item) {
            # code...
            $producto = Product::find($item->id);
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
            $producto->imagen_producto = str_replace("\\", "/", $producto->imagen_producto);
            $productos[] = $producto;
        }
        
        return view("carrito.carroAbandonado")->with([
            "productos" => $productos
        ]);
    }
}
