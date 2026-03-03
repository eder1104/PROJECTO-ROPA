<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AntigravityService;

class AntigravityController extends Controller
{
    protected $antigravityService;

    public function __construct(AntigravityService $antigravityService)
    {
        $this->antigravityService = $antigravityService;
    }

    public function index()
    {
        return view('antigravity');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'mass' => 'required|numeric',
            'distance' => 'required|numeric|min:1',
        ]);

        $result = $this->antigravityService->calculate(
            (float)$validated['mass'], 
            (float)$validated['distance']
        );

        return back()->with('result', $result['force'] ?? 0)->withInput();
    }
}
