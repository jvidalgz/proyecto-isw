<?php
use Illuminate\Database\Seeder;
use App\Usuario;


class UsuariosSeeder extends Seeder
{

    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            Usuario::create([
                'nombre' => $faker->name,
                'apellido_p' => $faker->lastName,
                'apellido_m' => $faker->lastName,
                'email' => $faker->email
            ]);
        }

    }

}

