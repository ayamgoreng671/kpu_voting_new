<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\StoreElectionRequest;
use App\Http\Requests\UpdateElectionRequest;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Election;
use App\Models\ElectionUser;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $nodeServerUrl = 'http://localhost:3000';
    // private $nodeServerUrl = 'http://10.10.100.62:3000';
    public function manageView()
    {
        $categories = Category::all();
        return view("admin.manage", [
            "categories" => $categories,
            "elections" => Election::orderByDesc("id")->get(),
        ]);
    }
    public function manageAnalyticsView(string $id)
    {
        $election = Election::find($id);
        return view("admin.analytics", ["election" => $election]);
    }
    public function electionPost(StoreElectionRequest $request)
    {
        $validated = $request->validated();
        $start = Carbon::parse($validated["start_datetime"]);
        $end = Carbon::parse($validated["end_datetime"]);

        $secondsDifference = $start->diffInSeconds($end);
        $newDataRecord = Election::create($validated);

        // dd($response->json('contractAddress'));
        if ($validated["category_id"] == 2) {
            $bebek = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
            // dd($response->json('candidateIds'));
            foreach ($bebek as $candidate) {
                $data["photo"] = "";
                $data["name"] = "Empty Box";
                $data["bio"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                $data["vision"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                $data["mission"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                // $data["contract_candidateId"] = $candidate;
                $data["classroom_id"] = $candidate;
                $data["election_id"] = $newDataRecord->id;

                $newCandidate = Candidate::create($data);

            }
        }



        $users = User::all();
        foreach ($users as $user) {
            $newElectionUser["election_id"] = $newDataRecord->id;
            $newElectionUser["user_id"] = $user->id;
            // dd($newElectionUser);
            ElectionUser::create($newElectionUser);
        }
        return redirect()->route("admin.manage");



        // Handle errors returned from the Node.js server



    }

    public function electionUpdate(UpdateElectionRequest $request, string $id)
    {
        $validated = $request->validated();
        $start = Carbon::parse($validated["start_datetime"]);
        $end = Carbon::parse($validated["end_datetime"]);

        $secondsDifference = $start->diffInSeconds($end);
        
        $election = Election::find($id);

        $election->update($validated);

        return redirect()->route("admin.manage.election",$id);
        }

    public function manageElectionView(string $id)
    {
        return view("admin.manageelection", [
            "classrooms" => Classroom::where("level", "!=", "3")->get(),
            "election" => Election::find($id),
            "candidates" => Candidate::where("election_id", $id)->get()
        ]);


    }

    public function addCandidate(StoreCandidateRequest $request, string $id)
    {


        $validated = $request->validated();
        $validated["election_id"] = $id;
        $election = Election::find($id);
        $category = $election->category_id;

        if ($request->hasFile("photo")) {
            $photoPath = $request->file("photo")->store("photos", "public");
            $validated["photo"] = $photoPath;

        }


        // dd($response->json('candidateId'));
        $newDataRecord = Candidate::create($validated);
        return redirect()->route("admin.manage.election", $id);

        // Log the error from the Node.js server


    }

    public function addAllVoterId(string $id)
    {
        $users = User::all();
        $election = Election::find($id);
        $category = $election->category_id;


        foreach ($users as $user) {
            // dd($user->voterId);
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('NODE_API_KEY')
            ])->post("{$this->nodeServerUrl}/registervoter", [
                        'name' => $user->voterId,
                        'election_id' => $id,
                        'category_id' => $category,
                        'district' => $user->classroom_id,
                    ]);
            if ($response->successful()) {
                // return response()->json(['message' => $response->json()['message']]);
            } else {
                return response()->json([
                    'error' => $response->json()['message']
                    // 'Failed to register voter'
                ], 500);
            }
        }

        return redirect()->route("admin.manage.election", $id);

    }

    public function getVoteData(string $id)
    {
        $election = Election::find($id);
        $electionUser = ElectionUser::where("election_id", $id)->get();
        // dd($electionUser);
        if ($election->category_id == 1) {
            // Assuming `candidate_name` is the name of the candidate, and each vote is a record

            $ayam = [];
            $tumbal = [];
            // foreach ($electionUser as $bebek) {
            //     // dd($bebek->has_voted);
                
            //     if ($bebek->has_voted == 0) {
            //         continue;
            //     } else {
            //         $tumbal[] = $bebek->id;
            //         $count = ElectionUser::join('votes', 'election_users.id', '=', 'votes.election_user_id')
            //         ->where('election_users.has_voted', 1)  // Change to check 'has_voted' in election_users table
            //         ->where('election_users.election_id', $id)
            //         ->count();

            //         $ayam[] = Vote::where("election_user_id", $bebek->id)->get()->first()->candidate_id;
            //     }
            // }
            $ayam = Vote::join('election_users', 'votes.election_user_id', '=', 'election_users.id')
            ->where('election_users.election_id', $id)
            ->pluck('votes.candidate_id');

            // dd($ayam);
        
            $candidates = Candidate::all();
            $candidatesName = [];
            // $counter = 1;
            foreach ($candidates as $candidate) {
                if ($candidate->election->category_id == 1) {
                    $candidatesName[$candidate->id] = $candidate->name;

                } else {
                    continue;
                }
            }

            $kuda = [1, 1, 1, 2, 1, 2, 1, 2, 3, 3, 3, 4, 4, 4];
            $naga = [
                'candidates' => $candidatesName,
                'votes' => $ayam,
            ];
            // dd($naga);
            return response()->json($naga);
        } elseif ($election->category_id == 2) {
            $classroomAll = Classroom::where("level", "!=", 3)->get();
            $classrooms = [];
            foreach ($classroomAll as $classroom) {
                $classrooms[$classroom->classroom] = [];

                $candidates = Candidate::where("classroom_id", $classroom->id)->where("election_id", $id)->get();

                foreach ($candidates as $candidate) {
                    $classrooms[$classroom->classroom][] = $candidate;
                }
            }
            // dd($classrooms);

            $ayam = [];
            foreach ($electionUser as $bebek) {
                // dd($bebek->has_voted);
                if ($bebek->has_voted == 0) {
                    continue;
                } else {

                    $ayam[] = Vote::where("election_user_id", $bebek->id)->get()->first()->candidate_id;
                }
            }
            $naga = [
                'classrooms' => $classrooms,
                'votes' => $ayam,
            ];
            return response()->json($naga);

        } else {
            return redirect()->route("dashboard");
        }

    }
}
