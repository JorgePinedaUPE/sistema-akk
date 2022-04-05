@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Registrar nuevo curso</h1>

<form action="/cursos" method="POST">
	@csrf
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label>
		@error('nombre')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{old('nombre')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Descripción</label>
		@error('description')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="description" name="description" type="text" class="form-control" tabindex="2" value="{{old('description')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Cupo</label>
		@error('cupo')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="cupo" name="cupo" type="text" class="form-control" tabindex="3" value="{{old('cupo')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Modalidad</label>
		<select name="select" class="form-control">
		  <option value="value1">Virtual</option>
		  <option value="value2">Presencial</option>
		</select>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Fecha y hora</label>
		@error('fechaHora')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="fechaHora" name="fechaHora" type="datetime-local" class="form-control" tabindex="4" value="{{old('fecha')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Direccion</label>
		@error('direccion')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="direccion" name="direccion" type="text" class="form-control" tabindex="5" value="{{old('direccion')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Costo</label>
		@error('costo')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="costo" name="costo" type="text" class="form-control" tabindex="6" value="{{old('costo')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Duración (en horas)</label>
		@error('duracion')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="duracion" name="duracion" type="text" class="form-control" tabindex="7" value="{{old('duracion')}}">
	</div>

	<a href="/cursos" class="btn btn-danger" tabindex="8">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="9">Guardar</button>
</form>

@endsection