<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Garante que o papel admin exista
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Cria o usuário admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin'),
                'data_nascimento' => '2000-01-01',
                'estado' => 'BA',
                'cidade' => 'Salvador',
                'aceito_termos' => true,
                'receber_novidades' => false,
            ]
        );

        // Atribui o papel admin
        if (!$admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }

        $this->command->info('- Usuário admin criado com sucesso!');
    }
}