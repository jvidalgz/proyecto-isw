@extends('master-layout')

@section('contenido')
    <ol class="breadcrumb">
        <li><a href="{!! URL::to('usuarios') !!}">Usuarios</a></li>
        <li class="active">{!! $usuario->nombre !!}</li>
    </ol>

        <div class="span8">
            <h3>Usuario: {!! $usuario->nombre !!}</h3>
            <h6>Apellido Paterno: {!! $usuario->apellido_p !!}</h6>
            <h6>Aepllido Materno: {!! $usuario->apellido_m!!}</h6>
            <h6>Email: {!! $usuario->email !!}</h6>

            <h6><a href="#">More... </a></h6>
        </div>

        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Acción
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{!! URL::to('usuarios/'.$usuario->id.'/edit')!!}"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
@stop('contenido')
