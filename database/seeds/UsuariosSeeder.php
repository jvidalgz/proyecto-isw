<?php
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder{

public function run(){

    $faker = \Faker\Factory::create();

    for ($i = 0; $i < 100; $i++) {
        \DB::table('usuarios')->insert([
        'nombre' => $faker->name,
        'apellido_p'=>$faker->lastName,
        'apellido_m'=>$faker->lastName,
        'email'=>$faker->email
        ]);
    }
}



}