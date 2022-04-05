@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Registrar nueva efeméride</h1>

<form action="/efemerides" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="mb-3">
		<label for="" class="form-label">Título</label>
		@error('titulo')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="titulo" name="titulo" type="text" class="form-control" tabindex="1" value="{{old('titulo')}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Imagen</label>
		@error('image')
			<br>
			<small>*{{$message}}</small>
			<br>
		@enderror
		<input id="image" name="image" type="file" class="form-control" tabindex="2" accept="image/*" value="{{old('image')}}">
	</div>

	<a href="/efemerides" class="btn btn-danger" tabindex="7">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
</form>

@endsection