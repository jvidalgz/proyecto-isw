@extends('master-layout')

@section('contenido')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro nuevo usuario</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hay errores en en registro<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Apellido Materno</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellido_p" value="{{ old('apellido_p') }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Apellido Materno</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellido_m" value="{{ old('apellido_m') }}" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Clave</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar Clave</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
