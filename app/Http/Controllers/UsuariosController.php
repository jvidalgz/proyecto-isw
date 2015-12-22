<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function __construct()
    {
        // Para toda petición a alguna función de este Controlador, primero se ejecutará el Middleware que
        // verifica que el usuario ha iniciado sesión
        //$this->middleware('auth');
    }


    /**
     * Muestra todos los usuarios
     *
     * @return Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(12);

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra formulario para crear nuevo usuario
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Almacena un nuevo usuario
     *
     * @return Response
     */

    public function store(Request $request)
    {

        $usuario = new Usuario();
        $usuario->nombre = \Input::get('nombre');
        $usuario->apellido_p = \Input::get('apellido_p');
        $usuario->apellido_m = \Input::get('apellido_m');
        $usuario->email = \Input::get('email');
        $exito = $usuario->save();

        if ($exito) {
            return "Almacenado con exito";
        } else {
            return "No se guardo";
        }


    }

    /**
     * Muestra usuario especifico
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Muestra el formulario para editar un usuario
     *
     * @param  int $ide
     * @return Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit', compact('usuario', $usuario));
    }

    /**
     * Actualiza un usuario identificado con 'id'
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request)
    {
       $input =[
           'nombre'      => $request->input('nombre'),
           'apellido_p'  => $request->input('apellido_p'),
           'apellido_m'  => $request->input('apellido_m'),
           'email'       => $request->input('email'),
       ];

        $rules= [
            'nombre'     => 'required',
            'apellido_p' => 'required',
            'apellido_m' => 'required',
            'email'      =>'required|email'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()){

            return redirect()->to('usuarios/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator->messages());
        }else{

            $usuario = Usuario::find($id);
            $usuario->nombre = $request->input('nombre');
            $usuario->apellido_p = $request->input('apellido_p');
            $usuario->apellido_m = $request->input('apellido_m');
            $usuario->email = $request->input('email');
            $usuario->save();

            return redirect()->to('usuarios')->with('message', 'Usuario actualizado correctamente');
        }





    }

    /**
     * Elimina un usuario identificado con 'id'
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
