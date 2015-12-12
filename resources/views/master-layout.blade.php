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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand">
                    {!! HTML::image('img/logo-ubb.png') !!}
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! URL::to('usuarios') !!}">Proyecto ISW</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        @if(Auth::check())
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->nombre !!} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! URL::to('auth/logout') !!}">Cerrar Sesión</a></li>
                            </ul>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{!! URL::to('auth/register') !!}">Registrarse</a></li>
                                <li><a href="{!! URL::to('auth/login') !!}">Inicio sesión</a></li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

        <div class="container">
            @yield('contenido')
        </div>

        <!-- jQuery (necesario para los plugins JavaScript de Bootstrap) -->
        {!! Html::script('js/jquery-1.11.3.min.js') !!}
        <!-- Plugins JavaScript de Bootstrap-->
        {!! Html::script('js/bootstrap.min.js') !!}
    </body>
</html>