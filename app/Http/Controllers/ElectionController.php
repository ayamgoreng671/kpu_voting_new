<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ElectionController extends Controller
{
    private $nodeServerUrl = 'http://localhost:3000';
    public function castVoteView()
    {
        $elections = Election::all();
        return view("votetest");
    }
    public function castVote(Request $request)
    {
        // $request->validate([
        //     'voterId' => 'required|string',
        //     'candidateId' => 'required|integer',
        // ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('NODE_API_KEY'),
        ])->post("{$this->nodeServerUrl}/vote", [
                    'voterId' => $request->input('voterId'),
                    'candidateId' => $request->input('candidateId'),
                ]);

        if ($response->successful()) {
            Log::info("Response : " . $response);

            return response()->json($response->json());
        } else {
            Log::info("Response : " . $response);

            return response()->json(['error' => 'Failed to cast vote'], 500);
        }
    }

    public function getVoteStatus()
    {
        $response = Http::get("{$this->nodeServerUrl}/vote-status");

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to retrieve vote status'], 500);
        }
    }
    public function fetchCandidates()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('NODE_API_KEY')
        ])->get('http://localhost:3000/candidates');

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            Log::info("Response : " . $response);

            return response()->json(['error' => 'Failed to fetch candidates.'], 500);
        }
    }
    public function addCandidateView()
    {


        return view("addcandidate");
    }

    public function addCandidate(Request $request)
    {
        // Log request data for debugging
        Log::info('Request data:', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('NODE_API_KEY')
        ])->post('http://localhost:3000/addCandidate', [
                    'name' => $request->input('name')
                ]);

        if ($response->successful()) {
            return response()->json(['message' => 'Candidate added successfully!']);
        } else {
            // Log the error from the Node.js server
            Log::error('Node.js server error:', ['response' => $response->body()]);
            return response()->json(['error' => 'Failed to add candidate.'], 500);
        }
    }

    public function registerVoterView()
    {
        return view("registervoter");

    }

    public function registerVoter(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('NODE_API_KEY')
        ])->post('http://localhost:3000/registervoter', [
                    'name' => $request->input('name')
                ]);
        if ($response->successful()) {
            return response()->json(['message' => $response->json()['message']]);
        } else {
            return response()->json([
                'error' => $response->json()['message']
                // 'Failed to register voter'
            ], 500);
        }


    }
}
