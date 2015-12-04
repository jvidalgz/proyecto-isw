<?php
use Illuminate\Database\Seeder;
use App\Usuario;


class UsuariosSeeder extends Seeder
{

    public function run()
    {

        $faker = \Faker\Factory::create();

        \DB::table('usuarios')->truncate();

        $avatar = [
            'https://avatars.githubusercontent.com/u/5294167',
            'https://avatars.githubusercontent.com/u/5294169',
            'https://avatars.githubusercontent.com/u/5294172',
            'https://avatars.githubusercontent.com/u/5294173',
            'https://avatars.githubusercontent.com/u/5294174',
            'https://avatars.githubusercontent.com/u/5294175',
            'https://avatars.githubusercontent.com/u/5294176',
            'https://avatars.githubusercontent.com/u/5294177',
            'https://avatars.githubusercontent.com/u/5294178',
            'https://avatars.githubusercontent.com/u/5294179',
            'https://avatars.githubusercontent.com/u/5294180',
        ];

        for ($i = 0; $i < 100; $i++) {

            Usuario::create([
                'nombre' => $faker->name,
                'apellido_p' => $faker->lastName,
                'apellido_m' => $faker->lastName,
                'email' => $faker->email,
                'url_avatar'=>$faker->randomElement($avatar)
            ]);
        }

    }

}

