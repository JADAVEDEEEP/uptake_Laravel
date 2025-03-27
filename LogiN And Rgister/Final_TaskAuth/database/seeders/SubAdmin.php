<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SubAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subAdminRole = Role::where('name', 'sub admin')->first();

      
        $subAdminUser = User::firstOrCreate(
            ['email' => 'subadmin@example.com'], 
            [
                'name' => 'Sub Admin',
                'password' => bcrypt('subadminpassword'), 
                'RoleID'=>9
            ]
        );

      
        $subAdminUser->assignRole($subAdminRole);
    }
    }

