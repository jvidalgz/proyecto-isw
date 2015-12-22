<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        // Se capturan los datos, provenientes desde el formulario,
        // por medio del objeto $request.
        $input = [
            'nombre'     => $request->input('nombre'),
            'apellido_p' => $request->input('apellido_p'),
            'apellido_m' => $request->input('apellido_m'),
            'email'      => $request->input('email')

        ];

        // Se establecen las reglas que deben cumplir los datos.
        $rules = [
            'nombre' => 'required',
            'apellido_p' => 'required',
            'apellido_m' => 'required',
            'email' => 'required|email',
        ];

        // Los datos se validan
        $validation = Validator::make($input, $rules);


        if ($validation->fails()) {
            // Si la validación falla, se redirige al usuario a la misma ruta desde donde venían los
            // datos ('usuarios/create') junto con los mensajes de error.
            return redirect()->to('usuarios/create')
                ->withInput() // retorna los inputs que se hicieron en el formulario, para que el usuario los arregle
                ->withErrors($validation->errors());

        } else {
            // Si la validación es correcta, se crea el nuevo usuario
            $usuario = new Usuario();
            $usuario->nombre = $request->input('nombre');
            $usuario->apellido_p = $request->input('apellido_p');
            $usuario->apellido_m = $request->input('apellido_m');
            $usuario->email = $request->input('email');
            $usuario->save();

            // Luego del almacenamiento del nuevo usuario, se redirige a la ruta 'usuarios' junto con un mensaje.
            return redirect()->to('usuarios')->with('message', 'Usuario registrado exitosamente');

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
