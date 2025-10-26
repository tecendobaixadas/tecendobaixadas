<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class JovemUserSeeder extends Seeder
{
    public function run(): void
    {
        // Garante que o papel jovem exista
        $jovemRole = Role::firstOrCreate(['name' => 'jovem']);

        // Cria o usuário jovem
        $jovem = User::firstOrCreate(
            ['email' => 'jovem@jovem.com'],
            [
                'name' => 'Usuário Jovem',
                'password' => Hash::make('admin'),
                'data_nascimento' => '2000-01-01',
                'estado' => 'RJ',
                'cidade' => 'Nova Iguaçu',
                'aceito_termos' => true,
                'receber_novidades' => false,
            ]
        );

        // Atribui o papel jovem
        if (!$jovem->hasRole('jovem')) {
            $jovem->assignRole($jovemRole);
        }

        $this->command->info('- Usuário jovem criado com sucesso!');
    }
}