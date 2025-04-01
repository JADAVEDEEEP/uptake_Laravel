<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managerrole = ModelsRole::where('name', 'manager')->first();
        
        $manager=User::firstorcreate(
            ['email'=>'harshpanchal230@gmail.com'],
            [ 
                'name'=>'manager',
                'password'=>bcrypt('manager123'),
                'role_id'=>$managerrole->id,
            ]
        );
        $manager->assignRole($managerrole);
    }
}
