<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class NodeController extends Controller
{
    public function getNodeData()
    {
        $response = Http::withHeaders([
            "Authorization" => "Bearer ". env("NODE_API_KEY")
        ])->get('http://localhost:3000/api/data');
        return $response->json();
    }
    // public function getGreeting()
    // {
    //     $response = Http::get('http://localhost:3000/greeting');
    //     return $response->json();
    // }
}
