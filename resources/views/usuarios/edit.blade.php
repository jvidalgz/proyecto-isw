{!! Form::model($usuario,['route'=>['usuarios.update',$usuario],'method'=> 'PUT']) !!}

    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null,array('placeholder' => 'Lalo','autocomplete'=>'off')) !!}

    {!! Form::label('apellido_p', 'Apellido Paterno') !!}
    {!! Form::text('apellido_p', null) !!}

    {!! Form::label('apellido_m', 'Apellido Materno') !!}
    {!! Form::text('apellido_m', null) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null) !!}

    {!! Form::submit('Guardar') !!}

{!! Form::close() !!}

