@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Registrar nuevo servicio</h1>

<form action="/servicios" method="POST">
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
		<label for="" class="form-label">Costo</label>
		@error('costo')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="costo" name="costo" type="text" class="form-control" tabindex="3" value="{{old('costo')}}">
	</div>

	<a href="/servicios" class="btn btn-danger" tabindex="4">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="5">Guardar</button>
</form>

@endsection