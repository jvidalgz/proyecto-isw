<?php


class UsuariosControllerTest extends TestCase
{

    public function testingIndexFunction()
    {

        $user = \App\Usuario::where('email', '=', 'testing@testing.com')->first();

        $this->be($user);

        $this->call('GET', 'usuarios');

        $this->assertResponseOk();
    }

    public function testingShowFunction()
    {
        $user = \App\Usuario::where('email', '=', 'testing@testing.com')->first();

        $this->be($user);

        $usuario = \App\Usuario::all()->random(1);

        $respuesta = $this->action('GET', 'UsuariosController@show', ['id' => $usuario->id]);

        $this->assertEquals(200, $respuesta->getStatusCode());

    }

    public function testingStoreFunction()
    {
        $user = \App\Usuario::where('email', '=', 'testing@testing.com')->first();

        $this->be($user);

        Session::start();

        $datos = [
            'nombre'=>'NombreTest',
            'apellido_p'=>'ApellidoPaternoTest',
            'apellido_m'=>'ApellidoMaternoTest',
            'email'=>'EmailTest@gmail.com',
            'password'=>\Hash::make('ramdompass'),
            '_token' => csrf_token(),
        ];

        $this->call('POST', 'usuarios', $datos);

        $this->assertRedirectedTo('usuarios');

    }

}
