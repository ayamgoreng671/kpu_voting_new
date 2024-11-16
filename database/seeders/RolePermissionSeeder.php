<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "insert votes",
            "view votes result",
            "start election",
            "end election",
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                "name" => $permission
            ]);
        }


        $adminRole = Role::create([
            "name" => "admin"
        ]);

        $adminRole->givePermissionTo([
            "view votes result",
            "start election",
            "end election",
        ]);

        $voterRole = Role::create([
            "name" => "voter"
        ]);

        $voterRole->givePermissionTo([
            "insert votes",
        ]);

        $admin = User::create([
            "name" => "admin",
            "voterId" => "000000",
            "email" => "admin@gmail.com",
            "classroom_id" => 1,
            "password" => bcrypt("admin1234"),
        ]);

        $admin->assignRole($adminRole);
    }
}
