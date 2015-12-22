@extends('master-layout')
    @section('contenido')
        <ol class="breadcrumb">
            <li class="active">Usuarios</li>
        </ol>

        @if(session('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                {!! session('message') !!}
            </div>
        @endif
        {!! Html::style('css/big-table.css') !!}
        <table class="table table-striped table-bordered table-hover table-condensed cf" id="no-more-tables">
            <thead id="no-more-tables">
            <tr id="no-more-tables">
                <th id="no-more-tables">Nombre</td>
                <th id="no-more-tables">Apellido Paterno</th>
                <th id="no-more-tables">Apellido Materno</th>
                <th id="no-more-tables">Email</th>

                <th id="no-more-tables">Acciones</th>
            </tr>
            </thead>
            <tbody id="no-more-tables">
                @foreach($usuarios as $usuario)
                    <tr id="no-more-tables">
                        <td id="no-more-tables" data-title="Nombre">{!! $usuario->nombre !!}</td>
                        <td id="no-more-tables" data-title="Apellido Paterno">{!! $usuario->apellido_p !!}</td>
                        <td id="no-more-tables" data-title="Apellido Materno">{!! $usuario->apellido_m !!}</td>
                        <td id="no-more-tables" data-title="Email">{!! $usuario->email !!}</td>
                        <td id="no-more-tables" data-title="Acciones">
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



