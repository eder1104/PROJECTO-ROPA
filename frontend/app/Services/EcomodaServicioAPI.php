<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EcomodaServicioAPI
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('PYTHON_API_URL');
    }

    public function calcularPrecios(array $items, string $tipoEnvio = 'standard')
    {
        $response = Http::post("{$this->baseUrl}/precios/calcular", [
            'items' => $items,
            'shipping_type' => $tipoEnvio
        ]);

        return $response->json();
    }
}
