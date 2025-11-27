<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Clear cached roles & permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            // User Management
            'user.create', 'user.view', 'user.update', 'user.delete',

            // Roles
            'role.create', 'role.view', 'role.update', 'role.delete',

            // Content
            'content.create', 'content.view', 'content.update', 'content.delete',

            // Profile
            'profile.view', 'profile.update'
        ];

        //create all permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create Roles
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $admin      = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $user       = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        //Assign permissions to roles
         // Admin permissions (limited)
         $admin->syncPermissions([
            'user.view',
            'user.update',
            'content.create',
            'content.update',
            'content.view',
        ]);

        // Normal user has no advanced permissions
        $user->syncPermissions([
            'profile.view', 'profile.update', 'content.view',
        ]);

        // Super Admin gets ALL permissions (full access)
        $superAdmin->syncPermissions(Permission::all());

          // Reset again
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


    }
}
