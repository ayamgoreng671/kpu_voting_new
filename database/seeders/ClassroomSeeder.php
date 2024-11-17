<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("classrooms")->insert([
            [
                "classroom" => "X SIJA 1",
                "level" => "1",
                "major" => "SIJA",
                
            ],
            [
                "classroom" => "X SIJA 2",
                "level" => "1",
                "major" => "SIJA",
                
            ],
            [
                "classroom" => "X TJAT 1",
                "level" => "1",
                "major" => "TJAT",
            ],
            [
                "classroom" => "X TJAT 2",
                "level" => "1",
                "major" => "TJAT",
            ],
            [
                "classroom" => "X TJAT 3",
                "level" => "1",
                "major" => "TJAT",
            ],
            [
                "classroom" => "X TJAT 4",
                "level" => "1",
                "major" => "TJAT",
            ],
            [
                "classroom" => "X TJAT 5",
                "level" => "1",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XI SIJA 1",
                "level" => "2",
                "major" => "SIJA",
            ],
            [
                "classroom" => "XI SIJA 2",
                "level" => "2",
                "major" => "SIJA",
            ],
            [
                "classroom" => "XI TJAT 1",
                "level" => "2",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XI TJAT 2",
                "level" => "2",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XI TJAT 3",
                "level" => "2",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XI TJAT 4",
                "level" => "2",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XI TJAT 5",
                "level" => "2",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XI TJAT 6",
                "level" => "2",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XII SIJA 1",
                "level" => "3",
                "major" => "SIJA",
            ],
            [
                "classroom" => "XII SIJA 2",
                "level" => "3",
                "major" => "SIJA",
            ],
            [
                "classroom" => "XII TJAT 1",
                "level" => "3",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XII TJAT 2",
                "level" => "3",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XII TJAT 3",
                "level" => "3",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XII TJAT 4",
                "level" => "3",
                "major" => "TJAT",
            ],
            [
                "classroom" => "XII TJAT 5",
                "level" => "3",
                "major" => "TJAT",
            ],
            [
                "classroom" => "Guru",
                "level" => "3",
                "major" => "Guru",
            ],
        ]);
    }
}
