@extends('master-layout')
    @section('contenido')

        {!! Form::model($usuario,['route'=>['usuarios.update',$usuario],'method'=> 'PUT','class' =>'form-horizontal']) !!}

           <div class="form-group">
               {!! Form::label('nombre', 'Nombre', ['class'=>'control-label']) !!}
               {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
           </div>

            <div class="form-group">
                {!! Form::label('apellido_p', 'Apellido Paterno', ['class'=>'control-label']) !!}
                {!! Form::text('apellido_p', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('apellido_m', 'Apellido Materno', ['class'=>'control-label']) !!}
                {!! Form::text('apellido_m', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
            </div>

        {!! Form::close() !!}
    @stop
