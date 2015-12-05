@extends('master-layout')
    @section('contenido')
        <table class="table table-bordered">
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Email</th>
            <th>Acciones</th>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{!! $usuario->nombre !!}</td>
                        <td>{!! $usuario->apellido_p !!}</td>
                        <td>{!! $usuario->apellido_m !!}</td>
                        <td>{!! $usuario->email !!}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{!! URL::to('usuarios/'.$usuario->id) !!}">Ver</a>
                            <a class="btn btn-xs btn-success" href="{!! URL::to('usuarios/'.$usuario->id.'/edit') !!}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        <!-- Paginacion -->
       <div class="text-center"> {!! $usuarios->render() !!}</div>
    @stop('contenido')



