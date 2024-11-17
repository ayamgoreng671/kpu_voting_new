<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\ElectionUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newElection = Election::create([

            "name" => "Pemilihan Ketos/Waketos Periode Tahun 2025",
            "description" => "mbledos",

            "start_datetime" => "2024-11-18 07:00:00",
            "end_datetime" => "2024-11-19 17:00:00",
            "category_id" => 1,
        ]);

        // dd($response->json('contractAddress'));
        if ($newElection->category_id == 2) {
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
                $data["election_id"] = $newElection->id;

                $newCandidate = Candidate::create($data);

            }
        }

        $users = User::all();
        foreach ($users as $user) {
            $newElectionUser["election_id"] = $newElection->id;
            $newElectionUser["user_id"] = $user->id;
            // dd($newElectionUser);
            ElectionUser::create($newElectionUser);
        }

        $newElection = Election::create([

            "name" => "Pemilihan MPK Periode Tahun 2025",
            "description" => "mbledos",

            "start_datetime" => "2024-11-18 07:00:00",
            "end_datetime" => "2024-11-18 17:00:00",
            "category_id" => 2,
        ]);

        // dd($response->json('contractAddress'));
        if ($newElection->category_id == 2) {
            $bebek = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
            // dd($response->json('candidateIds'));
            foreach ($bebek as $candidate) {
                $data["photo"] = "photos/default.png";
                $data["name"] = "Empty Box";
                $data["bio"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                $data["vision"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                $data["mission"] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, molestiae repudiandae mollitia voluptate veritatis sequi ducimus nobis commodi in maxime officia? Dicta ea similique dolorum debitis, eum architecto asperiores quae.";
                // $data["contract_candidateId"] = $candidate;
                $data["classroom_id"] = $candidate;
                $data["election_id"] = $newElection->id;

                $newCandidate = Candidate::create($data);

            }
        }

        $users = User::all();
        foreach ($users as $user) {
            $newElectionUser["election_id"] = $newElection->id;
            $newElectionUser["user_id"] = $user->id;
            // dd($newElectionUser);
            ElectionUser::create($newElectionUser);
        }
    }
}
