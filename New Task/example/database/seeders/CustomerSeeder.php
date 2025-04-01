<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerRole = Role::where('name', 'customer')->first();
        
        $customer=User::firstorcreate(
            ['email'=>'jainiksir340@gmail.com'],
            [ 
                'name'=>'customer',
                'password'=>bcrypt('customer123'),
                'role_id'=>$customerRole->id,
            ]
        );
        $customer->assignRole($customerRole);
    }
}
