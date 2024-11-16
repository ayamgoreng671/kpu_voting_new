<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoteRequest;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\ElectionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    private $nodeServerUrl = 'http://localhost:3000';

    public function electionIndex()
    {
        $level = Auth::user()->classroom->level;
        if($level == 3){
            $elections = Election::where("category_id",1)->orderByDesc("id")->get();

            return view('elections', ["elections" => $elections]);
        }else{
            $elections = Election::orderByDesc("id")->get();

            return view('elections', ["elections" => $elections]);
        }


    }
    public function voteView(string $id)
    {
        $userClass = Auth::user()->classroom_id;
        $election = Election::findOrFail($id);
        $level = Auth::user()->classroom->level;
        $limit = 0;
        if ($level == 1) {
            $limit = 3;

        } elseif ($level == 2) {
            $limit = 2;

        } elseif ($level == 3) {
            $limit = 1;

        }else{
            $limit = 0;
        }

        if($limit == 1){
            return redirect()->route("elections");
        }

        if ($election->category_id == 1) {
            return view("vote", [
                "candidatesCount" => Candidate::where("election_id", $id)->where("classroom_id", $userClass)->count(),
                "candidates" => Candidate::where("election_id", $id)->get(),
                "limit" => $limit,
                "election" => $election
            ]);
        } elseif ($election->category_id == 2) {
            return view("vote", [
                "candidates" => Candidate::where("election_id", $id)->where("classroom_id", $userClass)->get(),
                "candidatesCount" => Candidate::where("election_id", $id)->where("classroom_id", $userClass)->count(),
                "limit" => $limit,
                "election" => $election
            ]);
        }


    }

    public function castVote(StoreVoteRequest $request, string $id)
    {
        // $request->validate([
        //     'voterId' => 'required|string',
        //     'candidateId' => 'required|integer',
        // ]);
        $validated = $request->validated();
        // dd($validated);


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('NODE_API_KEY'),
        ])->post("{$this->nodeServerUrl}/vote", [
                    'voterId' => Auth::user()->voterId,
                    'candidateId' => $validated["candidate"],
                    'election_id' => $id,
                ]);

        if ($response->successful()) {
            Log::info("Response : " . $response);
            $electionUser = ElectionUser::where("user_id", Auth::id())->where("election_id",$id);
            $electionUser->update(["has_voted" => 1]);
            // return response()->json($response->json());
            return redirect()->route("dashboard");
        } else {
            Log::info("Response : " . $response);

            return response()->json(['error' => 'Failed to cast vote'], 500);
        }
    }


}
