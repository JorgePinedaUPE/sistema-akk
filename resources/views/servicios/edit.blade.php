@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Editar servicio</h1>

<form action="/servicios/{{$servicio->id}}" method="POST">
	@csrf
	@method('PUT')
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label>
		@error('nombre')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="nombre" name="nombre" type="text" class="form-control" value="{{old('nombre',$servicio->nombre)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Descripción</label>
		@error('description')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="description" name="description" type="text" class="form-control" value="{{old('description',$servicio->description)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Costo</label>
		@error('costo')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="costo" name="costo" type="text" class="form-control" value="{{old('costo',$servicio->costo)}}">
	</div>

	<a href="/servicios" class="btn btn-danger" tabindex="9">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="10">Guardar</button>
</form>

@endsection