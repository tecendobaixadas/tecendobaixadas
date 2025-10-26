<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // --- Papéis ---
        $roles = [
            'admin',
            'editor',
            'viewer',
            'jovem',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // --- Permissões ---
        $permissions = [
            'users.create',
            'users.edit',
            'users.delete',
            'users.view',
            'posts.create',
            'posts.edit',
            'posts.delete',
            'posts.view',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        // --- Vincula permissões básicas a cada papel ---
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $viewerRole = Role::where('name', 'viewer')->first();

        // Admin tem todas as permissões
        $adminRole->givePermissionTo(Permission::all());

        // Editor tem apenas permissões de posts
        $editorRole->givePermissionTo([
            'posts.create', 'posts.edit', 'posts.view',
        ]);

        // Viewer só pode visualizar
        $viewerRole->givePermissionTo([
            'users.view', 'posts.view',
        ]);
    }
}