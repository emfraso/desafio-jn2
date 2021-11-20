<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $now = Carbon::now()->format('Y-m-d H:i:s');
        
        DB::table('clientes')->insert([
            [
            'nome' => 'Paulo das Coves',
            'telefone' => '(47) 1234-1234',
            'cpf' => '999.999.999-99',
            'placa' => 'XYZ-1010',
            'created_at' => $now
            ],
            [
            'nome' => 'Rafael das Coves',
            'telefone' => '(47) 1234-1234',
            'cpf' => '999.999.999-99',
            'placa' => 'QWE-1011',
            'created_at' => $now
            ],
            [
            'nome' => 'Carlos das Coves',
            'telefone' => '(47) 1234-1234',
            'cpf' => '999.999.999-99',
            'placa' => 'ASD-1012',
            'created_at' => $now
            ],
            [
            'nome' => 'Miriam das Coves',
            'telefone' => '(47) 1234-1234',
            'cpf' => '999.999.999-99',
            'placa' => 'ZXC-1013',
            'created_at' => $now
            ],
            [
            'nome' => 'Rafaela das Coves',
            'telefone' => '(47) 1234-1234',
            'cpf' => '999.999.999-99',
            'placa' => 'IOP-1014',
            'created_at' => $now
            ],
            [
            'nome' => 'Rosangela das Coves',
            'telefone' => '(47) 1234-1234',
            'cpf' => '999.999.999-99',
            'placa' => 'KLC-1010',
            'created_at' => $now
            ]
        ]);
    }
}
