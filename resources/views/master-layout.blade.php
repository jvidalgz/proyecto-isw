<!DOCTYPE html>
<html>
    <head>
        <!-- Etiqueta que indicará a los navegadores que nuestro sitio contrndrá un juego de caracteres de Unicode -->
        <meta charset="utf-8">
       <!-- Forzará a IE a usar el último motor de renderizado. Cuando IE se ejecute en modo de compatibilidad -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <!--Indica que nuestro sitio consumira la totalidad del espacio disponible dentro de la ventana del navegador (válido para smartphone, tablet o desktop)-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {!! Html::style('css/bootstrap.min.css') !!}
    </head>
    <body>

        <div class="container">
            @yield('contenido')
        </div>

        <!-- jQuery (necesario para los plugins JavaScript de Bootstrap) -->
        {!! Html::script('js/jquery-1.11.3.min.js') !!}
        <!-- Plugins JavaScript de Bootstrap-->
        {!! Html::script('js/bootstrap.min.js') !!}
    </body>
</html>