<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleAndPermssion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $permissions=[
            'create-user',
            'edit-user',
            'view-user',
            'delete-user',
         ];   
         $roles=[
            'admin',
            'manager',
            'customer',
         ];

         

         foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
         }

         foreach($roles as $role){

            $role = ModelsRole::create(['name' => $role]);

         }
        $adminRole = ModelsRole::where('name','admin')->get()->first();
        $customerRole = ModelsRole::where('name','customer')->get()->first();
        $managerRole = ModelsRole::where('name','manager')->get()->first();
        $adminRole->givePermissionTo(Permission::all());
        $customerRole->givePermissionTo(['view-user']); 
        $managerRole->givePermissionTo(['create-user','view-user']);
        
    }
}

// $role->givePermissionTo(Permission::all());
            
//             $role = ModelsRole::create(['name' => 'customer'])->givePermissionTo(['create-user','edit-user']);

//             $role=ModelsRole::create(['name'=>'manager'])->
// 