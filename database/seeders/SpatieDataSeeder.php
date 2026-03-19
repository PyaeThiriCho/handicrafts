<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SpatieDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Define Standard Permissions
        $permissions = [
            ['name' => 'view products', 'actions' => 'Can browse and search the handicraft inventory.'],
            ['name' => 'add products', 'actions' => 'Can create new handicraft entries.'],
            ['name' => 'edit products', 'actions' => 'Can update details of existing crafts.'],
            ['name' => 'delete products', 'actions' => 'Can remove items from the inventory permanently.'],
        ];

        foreach ($permissions as $p) {
            Permission::updateOrCreate(
                ['name' => $p['name']], 
                ['actions' => $p['actions'], 'guard_name' => 'web']
            );
        }

        // 2. ADMIN ROLE
        $adminRole = Role::updateOrCreate(
            ['name' => 'Admin'], 
            ['actions' => 'Full control: Can View, Create, Edit, and Delete everything.', 'guard_name' => 'web']
        );
        $adminRole->syncPermissions(Permission::all());

        // 3. USER ROLE (Read-Only)
        $userRole = Role::updateOrCreate(
            ['name' => 'User'], 
            ['actions' => 'Read-only: Can only browse the handicrafts. No editing allowed.', 'guard_name' => 'web']
        );
        // Only give them ONE permission
        $userRole->syncPermissions(['view products']);
    }
}