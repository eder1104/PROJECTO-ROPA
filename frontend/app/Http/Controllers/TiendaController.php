<?php

namespace App\Http\Controllers;

use App\Services\EcomodaServicioAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TiendaController extends Controller
{
    protected $servicioApi;

    public function __construct(EcomodaServicioAPI $servicioApi)
    {
        $this->servicioApi = $servicioApi;
    }

    public function inicio()
    {
        $productos = [
            ['id' => 1, 'name' => 'Traje Ejecutivo Oxford', 'category' => 'Trajes Ejecutivos', 'price' => 850.00, 'image' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?auto=format&fit=crop&w=800&q=80'],
            ['id' => 2, 'name' => 'Vestido de Gala Nocturno', 'category' => 'Vestidos de Gala', 'price' => 1200.00, 'image' => 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?auto=format&fit=crop&w=800&q=80'],
            ['id' => 3, 'name' => 'Calzado Piel de Becerro', 'category' => 'Calzado Premium', 'price' => 450.00, 'image' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?auto=format&fit=crop&w=800&q=80'],
            ['id' => 4, 'name' => 'Bolso de Diseñador Gold', 'category' => 'Accesorios', 'price' => 2100.00, 'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80'],
        ];

        return view('tienda.inicio', compact('productos'));
    }

    public function queSomos()
    {
        return view('tienda.que_somos');
    }

    public function agregarAlCarrito(Request $request)
    {
        $carrito = Session::get('carrito', []);
        $productoId = $request->id;
        
        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['quantity']++;
        } else {
            $carrito[$productoId] = [
                'id' => $request->id,
                'name' => $request->name,
                'base_price' => $request->price,
                'quantity' => 1,
                'category' => $request->category
            ];
        }

        Session::put('carrito', $carrito);
        return redirect()->route('carrito.inicio');
    }

    public function carrito()
    {
        $itemsCarrito = array_values(Session::get('carrito', []));
        $precios = null;

        if (!empty($itemsCarrito)) {
            $precios = $this->servicioApi->calcularPrecios($itemsCarrito);
        }

        return view('tienda.carrito', compact('itemsCarrito', 'precios'));
    }
}
