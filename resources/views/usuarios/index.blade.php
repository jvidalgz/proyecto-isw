@foreach($usuarios as $usuario)
    {!! $usuario->nombre !!}
    {!! $usuario->apellido_p !!}
    {!! $usuario->apellido_m !!}
@endforeach