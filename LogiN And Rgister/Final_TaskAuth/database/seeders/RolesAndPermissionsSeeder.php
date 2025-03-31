<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view products',
            'create products',
            'edit products',
            'delete products',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
            'view sizes',
            'create sizes',
            'edit sizes',
            'delete sizes',
            'view colors',
            'create colors',
            'edit colors',
            'delete colors',
            'delete-skus',
            'edit-skus',
            'create-skus',
            'view-skus',
        ];

      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

       
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $subAdminRole = Role::create(['name' => 'sub-admin']);

        $superAdminRole->givePermissionTo(Permission::all());

        
        $subAdminRole->givePermissionTo([
            'view users', 'view products', 'view categories', 'view sizes', 'view colors'
        ]);
    }
}