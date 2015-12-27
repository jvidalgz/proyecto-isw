<?php

class LoginTest extends TestCase
{
    /**
     * Realiza un login y si es correcto redirecciona a ruta 'usuarios'
     * @return void
     */
    public function testingLogin()
    {

        /*\App\Usuario::create([
            'email'          => 'testing@testing.com',
            'password'       => Hash::make('testing')
        ]);*/

        Session::start();

        $credentials = [
            'email'    => 'testing@testing.com',
            'password' => 'testing',
            '_token' => csrf_token()
        ];


        $this->call('POST', 'auth/login', $credentials);

        $this->assertRedirectedTo('usuarios');

    }

}