<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class superAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
       
      
        $superAdminRole = ModelsRole::where('name', 'super-admin')->first();

        
        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'], 
            [
                'name' => 'Super Admin',
                'password' => bcrypt('superadminpassword'),
                'RoleID'=>8
            ]
        );

        
        $superAdminUser->assignRole($superAdminRole);
    }
    }

