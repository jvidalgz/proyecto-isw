<?php



class AuthRoutesTest extends TestCase {

    /**
     *  Verifica el funcionamiento de rutas que requieren autenticación.
     *  La ruta 'usuarios' requiere que el usuario haya iniciado sesión antes de acceder a ella.
     *  Debería redireccionar a 'auth/login'
     *
     * @return void
     */
    public function testUsuariosIndex()
    {
        $respuesta = $this->call('GET', 'usuarios');

        $this->assertEquals(302, $respuesta->getStatusCode());
    }

    /**
     * Verifica que ruta 'usuarios/10' esté protegida por autenticación antes de acceder a ella.
     * Deberá redirecionar a 'auth'login'
     */
    public function testUsuariosView()
    {
        $this->call('GET', 'usuarios/10');

        $this->assertRedirectedTo('auth/login');

    }


}