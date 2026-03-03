<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\EcomodaApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    protected $apiService;

    public function __construct(EcomodaApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Traje Ejecutivo Oxford', 'category' => 'Trajes Ejecutivos', 'price' => 850.00, 'image' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?auto=format&fit=crop&w=800&q=80'],
            ['id' => 2, 'name' => 'Vestido de Gala Nocturno', 'category' => 'Vestidos de Gala', 'price' => 1200.00, 'image' => 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?auto=format&fit=crop&w=800&q=80'],
            ['id' => 3, 'name' => 'Calzado Piel de Becerro', 'category' => 'Calzado Premium', 'price' => 450.00, 'image' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?auto=format&fit=crop&w=800&q=80'],
            ['id' => 4, 'name' => 'Bolso de Diseñador Gold', 'category' => 'Accesorios', 'price' => 2100.00, 'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80'],
        ];

        return view('shop.index', compact('products'));
    }

    public function lookbook()
    {
        return view('shop.lookbook');
    }

    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $productId = $request->id;
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $request->id,
                'name' => $request->name,
                'base_price' => $request->price,
                'quantity' => 1,
                'category' => $request->category
            ];
        }

        Session::put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function cart()
    {
        $cartItems = array_values(Session::get('cart', []));
        $pricing = null;

        if (!empty($cartItems)) {
            $pricing = $this->apiService->calculatePricing($cartItems);
        }

        return view('shop.cart', compact('cartItems', 'pricing'));
    }
}
