<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     *
     */
    public function run(): void
    {
        
    
        
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'view sizes']);
        Permission::create(['name' => 'create sizes']);
        Permission::create(['name' => 'edit sizes']);
        Permission::create(['name' => 'delete sizes']);
        Permission::create(['name' => 'view colors']);
        Permission::create(['name' => 'create colors']);
        Permission::create(['name' => 'edit colors']);
        Permission::create(['name' => 'delete colors']);
        Permission::create(['name' => 'view sku']);
        Permission::create(['name' => 'create sku']);
        Permission::create(['name' => 'edit sku']);
        Permission::create(['name' => 'delete sku']);

        // Create Roles
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $subAdminRole = Role::create(['name' => 'Sub Admin']);

        // Assign Permissions to Super Admin (Full access)
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign limited permissions to Sub Admin
        $subAdminRole->givePermissionTo([
            'view users', 'view products', 'view categories', 'view sizes', 'view colors', 'view sku'
        ]);
    }

    }

