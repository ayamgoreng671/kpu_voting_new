<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            
            "name" => "ayam",
            "voterId" => "500001",
            
            "email" => "ayam@gmail.com",
            "classroom_id" => 1,
            "password" => bcrypt("ayam1234"),
        ]);

        $user->assignRole("voter");

        $user = User::create([
            
            "name" => "bebek",
            "voterId" => "500002",
            "email" => "bebek@gmail.com",
            "classroom_id" => 1,
            "password" => bcrypt("bebek1234"),
        ]);

        $user->assignRole("voter");

        $user = User::create([
            
            "name" => "kuda",
            "voterId" => "500003",
            "email" => "kuda@gmail.com",
            "classroom_id" => 2,
            "password" => bcrypt("kuda1234"),
        ]);

        $user->assignRole("voter");
    }
}
