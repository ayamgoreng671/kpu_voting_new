<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\StoreElectionRequest;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Election;
use App\Models\ElectionUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class AdminController extends Controller
{
    private $nodeServerUrl = 'http://localhost:3000';
    public function manageView()
    {
        $categories = Category::all();
        return view("admin.manage", [
            "categories" => $categories,
            "elections" => Election::orderByDesc("id")->get(),
        ]);
    }
    public function electionPost(StoreElectionRequest $request)
    {
        $validated = $request->validated();
        $start = Carbon::parse($validated["start_datetime"]);
        $end = Carbon::parse($validated["end_datetime"]);

        $secondsDifference = $start->diffInSeconds($end);
        // dd($secondsDifference);

        // Data to send to the Node.js server
        $data = [
            'initial_value' => $secondsDifference,
            'salt' => "0xd395ede5297e201c4e3786afff598277dd47e2548f4df4dc65745f9672af5eb2",
            'category_id' => $validated["category_id"]
        ];

        try {
            // Send the POST request to the Node.js server
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('NODE_API_KEY')
            ])->post("{$this->nodeServerUrl}/deploy", $data);

            // Check if the response was successful
            if ($response->successful()) {
                $validated["election_contract_address"] = $response->json('contractAddress');

                $newDataRecord = Election::create($validated);

                
                $responseData = $response;
                // dd($response->json('contractAddress'));
                if($validated["category_id"] == 2){
                    // dd($response->json('candidateIds'));
                    foreach($response->json('candidateIds') as $candidate){
                        $data["photo"] = "";
                        $data["name"] = "Empty Box";
                        $data["bio"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                        $data["vision"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                        $data["mission"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                        $data["contract_candidateId"] = $candidate;
                        $data["classroom_id"] = $candidate;
                        $data["election_id"] = $newDataRecord->id;

                        $newCandidate = Candidate::create($data);
                        // dd($newCandidate);
                    }
                }
                // dd($newDataRecord);
                // return response()->json([
                //     'message' => 'Contract deployed successfully!',
                //     'contract_address' => $response->json('contractAddress'),
                // ]);
                // session()->flash('success', 'Berhasil menambahkan komentar');
                $users = User::all();
                foreach ($users as $user) {
                    $newElectionUser["election_id"] = $newDataRecord->id; 
                    $newElectionUser["user_id"] = $user->id; 
                    // dd($newElectionUser);
                    ElectionUser::create($newElectionUser);
                }
                return redirect()->route("admin.manage");

            }

            // Handle errors returned from the Node.js server
            return response()->json([
                'error' => 'Deployment failed',
                'details' => $response->json(),
            ], $response->status());
        } catch (\Exception $e) {
            // Handle exceptions (e.g., network issues)
            return response()->json([
                'error' => 'An error occurred while deploying the contract',
                'details' => $e->getMessage(),
            ], 500);
        }

        

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
        // dd("ayam");

        $validated = $request->validated();
        $validated["election_id"] = $id;
        $election = Election::find($id);
        $category = $election->category_id;
        // dd($category);
        // dd($validated);
        if ($request->hasFile("photo")) {
            $photoPath = $request->file("photo")->store("photos", "public");
            $validated["photo"] = $photoPath;

        }
        // dd($validated);
        // Log request data for debugging
        Log::info('Request data:', $request->all());


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('NODE_API_KEY')
        ])->post("{$this->nodeServerUrl}/addCandidate", [
                    'name' => $validated["name"],
                    'election_id' => $validated["election_id"],
                    'category_id' => $category,
                    'district' => $validated["classroom_id"],
                ]);

        if ($response->successful()) {
            $validated["contract_candidateId"] = $response->json('candidateId');
            // dd($response->json('candidateId'));
            $newDataRecord = Candidate::create($validated);
            return redirect()->route("admin.manage.election", $id);
        } else {
            // Log the error from the Node.js server
            Log::error('Node.js server error:', ['response' => $response->body()]);
            return response()->json(['error' => 'Failed to add candidate.'], 500);
        }
    }

    public function addAllVoterId(string $id)
    {
        $users = User::all();
        $election = Election::find($id);
        $category = $election->category_id;


        foreach($users as $user){
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
}
