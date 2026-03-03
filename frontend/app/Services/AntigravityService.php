<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AntigravityService
{
    public function calculate(float $mass, float $distance)
    {
        $url = env('PYTHON_API_URL', 'http://localhost:8001') . '/calculate';
        $response = Http::post($url, [
            'mass' => $mass,
            'distance' => $distance,
        ]);

        return $response->json();
    }
}
