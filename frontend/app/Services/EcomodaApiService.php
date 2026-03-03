<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EcomodaApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('PYTHON_API_URL');
    }

    public function calculatePricing(array $items, string $shippingType = 'standard')
    {
        $response = Http::post("{$this->baseUrl}/pricing/calculate", [
            'items' => $items,
            'shipping_type' => $shippingType
        ]);

        return $response->json();
    }
}
