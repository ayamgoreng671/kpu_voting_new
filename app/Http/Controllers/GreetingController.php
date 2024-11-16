<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GreetingController extends Controller
{
    private $nodeServerUrl = 'http://localhost:3000';

    public function fetchGreeting()
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer ". env("NODE_API_KEY"), // Adjust this based on your middleware’s requirements
        ])->get("{$this->nodeServerUrl}/greeting");

        return response()->json($response->json());
    }

    public function setGreeting(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer ". env("NODE_API_KEY"), // Adjust this based on your middleware’s requirements
        ])->post("{$this->nodeServerUrl}/greeting", [
            'newGreeting' => $request->newGreeting,
        ]);

        return response()->json($response->json());
    }
}
