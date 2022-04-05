@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Editar efeméride</h1>

<form action="/efemerides/{{$efemeride->id}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="mb-3">
		<label for="" class="form-label">Título</label>
		@error('titulo')
			<br>
			<small class="text-danger">*{{$message}}</small>
			<br>
		@enderror
		<input id="titulo" name="titulo" type="text" class="form-control" value="{{old('titulo',$efemeride->titulo)}}">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Imagen</label>
		<img src="{{ asset('storage').'/'.$efemeride->image }}">
		<input id="image" name="image" type="file" class="form-control" tabindex="2" accept="image/*">
		@error('image')
			<small class="text-danger">{{$message}}</small>
		@enderror
	</div>

	<a href="/cursos" class="btn btn-danger" tabindex="7">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
</form>

@endsection