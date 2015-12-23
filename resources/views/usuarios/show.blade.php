@extends('master-layout')

@section('contenido')
    <ol class="breadcrumb">
        <li><a href="{!! URL::to('usuarios') !!}">Usuarios</a></li>
        <li class="active">{!! $usuario->nombre !!}</li>
    </ol>

    <div class="well span6">
        <div class="row-fluid">
            <div class="span2" >
                <img src="{!! $usuario->url_avatar !!}" width="100" alt="avatar" class="img-thumbnail">
            </div> <!-- /span2 -->

            <div class="span8">
                <h3>Usuario: {!! $usuario->nombre !!}</h3>
                <h6>Apellido Paterno: {!! $usuario->apellido_p !!}</h6>
                <h6>Aepllido Materno: {!! $usuario->apellido_m!!}</h6>
                <h6>Email: {!! $usuario->email !!}</h6>
            </div> <!-- /span8 -->

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
                        Acción
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! URL::to('usuarios/'.$usuario->id.'/edit')!!}"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
                        <li>
                            {!! Form::open(['url' => ['usuarios', 'id' => $usuario->id], 'method' => 'delete']) !!}
                            <button id="button" class="list-group-item" data-submit-confirm-text="{!! "Confirmación" !!}">
                                <span class="glyphicon glyphicon-trash">Eliminar</span>
                            </button>
                            {!! Form::close() !!}

                        </li>
                    </ul>
                </div> <!-- /btn-group -->
            </div> <!-- /span2 -->
        </div> <!-- /row-fluid -->
    </div> <!-- /well span6 -->
@stop('contenido')
