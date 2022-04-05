@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Editar empleado</h1>

<form action="/empleados/{{$empleado->id}}" method="POST">
	@csrf
	@method('PUT')
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label>
		@error('nombre')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="nombre" name="nombre" type="text" class="form-control" value="{{old('nombre',$empleado->nombre)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Apellido paterno</label>
		@error('apellidoPaterno')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="apellidoPaterno" name="apellidoPaterno" type="text" class="form-control" value="{{old('apellidoPaterno',$empleado->apellidoPaterno)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Apellido materno</label>
		@error('apellidoMaterno')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="apellidoMaterno" name="apellidoMaterno" type="text" class="form-control" value="{{old('apellidoMaterno',$empleado->apellidoMaterno)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Correo</label>
		@error('correo')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="correo" name="correo" type="text" class="form-control" value="{{old('correo',$empleado->correo)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Telefono</label>
		@error('telefono')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="telefono" name="telefono" type="text" class="form-control" value="{{old('telefono',$empleado->telefono)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Numero seguro</label>
		@error('numSeguro')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="numSeguro" name="numSeguro" type="text" class="form-control" value="{{old('numSeguro',$empleado->numSeguro)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Puesto</label>
		@error('puesto')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="puesto" name="puesto" type="text" class="form-control" value="{{old('puesto',$empleado->puesto)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Tipo de sangre</label>
		@error('tipoSangre')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="tipoSangre" name="tipoSangre" type="text" class="form-control" value="{{old('tipoSangre',$empleado->tipoSangre)}}">
	</div>

	<a href="/empleados" class="btn btn-danger" tabindex="9">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="10">Guardar</button>
</form>

@endsection