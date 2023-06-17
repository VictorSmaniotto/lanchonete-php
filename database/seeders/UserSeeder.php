<?php

namespace Database\Seeders;

use App\Models\User;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('pt_BR');

        User::create([
            'nome' => 'Edson Rodrigues',
            'email' => 'edsonrb.2008@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'perfil' => 'administrador'
        ]);

        foreach (range(1, 10) as $index) {

            User::create([
                'nome' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
