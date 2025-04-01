<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'admin')->first();
        
        $superAdmin=User::firstorcreate(
            ['email'=>'jadavdeep560@gmail.com'],
            [ 
                'name'=>'admin',
                'password'=>bcrypt('111293nil'),
                'role_id'=>$superAdminRole->id,
            ]
        );
        $superAdmin->assignRole($superAdminRole);
    }
}
