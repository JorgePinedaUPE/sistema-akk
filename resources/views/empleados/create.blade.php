@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Registrar nuevo empleado</h1>

<form action="/empleados" method="POST">
	@csrf
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label>
		<input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{old('nombre')}}">
		@error('nombre')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Apellido paterno</label>
		<input id="apellidoPaterno" name="apellidoPaterno" type="text" class="form-control" tabindex="2" value="{{old('apellidoPaterno')}}">
		@error('apellidoPaterno')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Apellido materno</label>
		<input id="apellidoMaterno" name="apellidoMaterno" type="text" class="form-control" tabindex="3" value="{{old('apellidoMaterno')}}">
		@error('apellidoMaterno')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Correo</label>
		<input id="correo" name="correo" type="text" class="form-control" tabindex="4" value="{{old('correo')}}">
		@error('correo')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Telefono</label>
		<input id="telefono" name="telefono" type="text" class="form-control" tabindex="5" value="{{old('telefono')}}">
		@error('telefono')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Numero seguro</label>
		<input id="numSeguro" name="numSeguro" type="text" class="form-control" tabindex="6" value="{{old('numSeguro')}}">
		@error('numSeguro')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Puesto</label>
		<input id="puesto" name="puesto" type="text" class="form-control" tabindex="7" value="{{old('puesto')}}">
		@error('puesto')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Tipo de sangre</label>
		<input id="tipoSangre" name="tipoSangre" type="text" class="form-control" tabindex="8" value="{{old('tipoSangre')}}">
		@error('tipoSangre')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
	</div>

	<a href="/empleados" class="btn btn-danger" tabindex="9">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="10">Guardar</button>
</form>

@endsection