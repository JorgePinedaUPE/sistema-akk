@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Registrar nuevo curso</h1>

<form action="/cursos/{{$curso->id}}" method="POST">
	@csrf
	@method('PUT')
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label>
		@error('nombre')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="nombre" name="nombre" type="text" class="form-control" value="{{old('nombre',$curso->nombre)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Descripcion</label>
		@error('description')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="description" name="description" type="text" class="form-control" value="{{old('description',$curso->description)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Cupo</label>
		@error('cupo')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="cupo" name="cupo" type="text" class="form-control" value="{{old('cupo',$curso->cupo)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Modalidad</label>
		@error('modalidad')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="modalidad" name="modalidad" type="text" class="form-control" value="{{old('modalidad',$curso->modalidad)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Fecha y hora</label>
		@error('fechaHora')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="fechaHora" name="fechaHora" type="text" class="form-control" value="{{old('fechaHora',$curso->fechaHora)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Direccion</label>
		@error('direccion')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="direccion" name="direccion" type="text" class="form-control" value="{{old('direccion',$curso->direccion)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Costo</label>
		@error('costo')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="costo" name="costo" type="text" class="form-control" value="{{old('costo',$curso->costo)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Duración (en horas)</label>
		@error('duracion')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="duracion" name="duracion" type="text" class="form-control" value="{{old('duracion',$curso->duracion)}}">
	</div>

	<a href="/cursos" class="btn btn-danger" tabindex="7">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
</form>

@endsection