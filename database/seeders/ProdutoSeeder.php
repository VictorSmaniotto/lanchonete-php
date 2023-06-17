<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        $categoriaIds = Categoria::pluck('id');

        foreach (range(1, 10) as $index) {
            Produto::create([
                'foto' => 'storage/produtos/produto.jpg',
                'titulo' => 'X-Salada ' . $faker->firstName(),
                'descricao' => $faker->text(60),
                'valor' => $faker->numberBetween(12, 35),
                'categoria_id' => $categoriaIds->random()
            ]);
        }
    }
}
