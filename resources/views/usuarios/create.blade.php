{!! Form::open(array('url' => 'usuarios')) !!}

    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', '',array('placeholder' => 'Lalo','autocomplete'=>'off')) !!}

    {!! Form::label('apellido_p', 'Apellido Paterno') !!}
    {!! Form::text('apellido_p', 'Landa') !!}

    {!! Form::label('apellido_m', 'Apellido Materno') !!}
    {!! Form::text('apellido_m', 'Landa') !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', 'example@gmail.com') !!}

    {!! Form::submit('Guardar') !!}

{!! Form::close() !!}

