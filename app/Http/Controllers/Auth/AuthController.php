<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

        /**
         * Si el usuario ya inició sesión, no podrá ingresar a ninguna de las funciones de exte Controlador,
         * solamente podrá ingresar a la función getLogout
         */
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Muestra el formulario de registro para un nuevo usuario
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Recibe los datos de registro de un nuevo usuario
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{

		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));

		return redirect($this->redirectPath());
	}

    /**
     * Muestra el formulario para iniciar sesión
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Maneja los datos de inicio de sesión
     * (los datos enviados desde el formulario entregado por la función getLogin de este Controlador)     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            // Si la autenticación fué correcta:
            return redirect()->intended($this->redirectPath());
        }

        // Si los datos de inicio de sesión fueron incorrectos, se vuelve a mostrar formulario de inicio de sesión junto
        // a los errores
        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

	/**
	 * Cierra sesión de usuario
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

    /**
     * Retorna la ruta para redireccionar luego de:
     *  - Un registro exitodo de un nuevo usuario
     *  - Después de un login exitoso
     * @return string
     */
    public function redirectPath()
    {
        return '/usuarios';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return '/auth/login';
    }


}
