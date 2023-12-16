<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Canal;
use App\Models\Ganadero;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('ganaderos')->insert([
                'nombres' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'email' => $faker->email,
                'direccion' => $faker->address,
            ]);
        }


        foreach (range(1, 20) as $index) {
            DB::table('animales')->insert([
                'codigo' => $faker->unique()->ean8,
                'ganadero_id' => 1,
                'raza' => $faker->word,
                'color' => $faker->colorName,
                'genero' => $faker->randomElement(['macho', 'hembra']),
                'fecha_nacimiento' => $faker->date,
                'peso' => $faker->randomFloat(2, 1, 100),
            ]);
        }

        foreach (range(1, 20) as $index) {
            DB::table('vacunas')->insert([
                'animal_id' => 1,
                'ganadero_id' => 1,
                'veterinario' => $faker->word,
                'tipo' => $faker->colorName,
                'fecha_vacunacion' => $faker->date,
                'fecha_vacunacion_proxima' => $faker->date,
                'costo' => $faker->randomFloat(2, 1, 100),
            ]);
        }

        foreach (range(1, 20) as $index) {
            DB::table('servicios')->insert([
                'animal_id' => 1,
                'ganadero_id' => 1,
                'descripcion' => $faker->word,
                'fecha_aplicacion' => $faker->date,
                'costo' => $faker->randomFloat(2, 1, 100),
            ]);
        }



        // Crear dos usuarios y asignar roles
        User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password1'),
            'ganadero_id' => 1
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password2'),
            'ganadero_id' => 1
        ]);




    }
}
