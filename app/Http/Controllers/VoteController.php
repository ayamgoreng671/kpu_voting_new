<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoteRequest;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\ElectionUser;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    private $nodeServerUrl = 'http://localhost:3000';

    public function dashboard()
    {

        $level = Auth::user()->classroom->level;
        if ($level == 3) {
            $elections = Election::where("category_id", 1)->orderByDesc("id")->get();

            return view('dashboard', ["elections" => $elections]);
        } else {
            $elections = Election::orderByDesc("id")->get();

            return view('dashboard', ["elections" => $elections]);
        }
    }
    public function electionIndex()
    {
        $level = Auth::user()->classroom->level;
        if ($level == 3) {
            $elections = Election::where("category_id", 1)->orderByDesc("id")->get();

            return view('elections', ["elections" => $elections]);
        } else {
            $elections = Election::orderByDesc("id")->get();

            return view('elections', ["elections" => $elections]);
        }




    }

    public function electionHistory()
    {
        $elections = Auth::user()->elections()->get();
        $votes = Vote::all();
        $electionUsers = ElectionUser::where("user_id", Auth::user()->id)->get();

        return view('history', [
            "elections" => $elections,
            "electionUsers" => $electionUsers,
            "votes" => $votes
        ]);



    }
    public function voteView(string $id)
    {
        $electionUser = ElectionUser::where("election_id", $id)->where("user_id", Auth::user()->id)->get()->first();
        // dd($electionUser);
        if ($electionUser->has_voted == 1) {
            return redirect()->route("elections");
        }
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

        } else {
            $limit = 0;
        }



        if ($election->category_id == 1) {
            
            return view("vote", [
                "candidatesCount" => Candidate::where("election_id", $id)->where("classroom_id", $userClass)->count(),
                "candidates" => Candidate::where("election_id", $id)->get(),
                "limit" => $limit,
                "election" => $election
            ]);
        } elseif ($election->category_id == 2) {
            if ($limit == 1) {
                return redirect()->route("elections");
            }
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


        $electionUser = ElectionUser::where("user_id", Auth::id())->where("election_id", $id);
        $electionUser->update(["has_voted" => 1]);
        $electionUserData = ElectionUser::where("user_id", Auth::id())->where("election_id", $id)->get();
        // dd($electionUserData->first()->id);
        $voteData["election_user_id"] = $electionUserData->first()->id;
        $voteData["candidate_id"] = $validated["candidate"];
        $newVote = Vote::create($voteData);
        // return response()->json($response->json());
        return redirect()->route("dashboard");

    }


}
