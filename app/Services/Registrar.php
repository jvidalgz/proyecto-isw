<?php namespace App\Services;

use App\Usuario;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'nombre' => 'required|max:255',
			'apellido_p' => 'required|max:64',
			'apellido_m' => 'required|max:64',
			'email' => 'required|email|max:255|unique:usuarios',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return Usuario::create([
			'nombre' => $data['nombre'],
			'apellido_p' => $data['apellido_p'],
			'apellido_m' => $data['apellido_m'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
