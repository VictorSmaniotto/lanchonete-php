<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'titulo' => 'Pizza',
                'icone' => 'storage/icones/icone.png'
            ],
            [
                'titulo' => 'Bebida',
                'icone' => 'storage/icones/icone.png'
            ],
            [
                'titulo' => 'Lanche',
                'icone' => 'storage/icones/icone.png'
            ],
            [
                'titulo' => 'Suco',
                'icone' => 'storage/icones/icone.png'
            ],
            [
                'titulo' => 'Porção',
                'icone' => 'storage/icones/icone.png'
            ],
        ]);
    }
}
