@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Inscribirse</h1>

<form action="/ofertaCursos" method="POST">
	@csrf
	
	<input id="usuario_id" name="usuario_id" type="hidden" class="" value="{{Auth::user()->id}}">

	<div class="mb-3">
		<label for="" class="form-label">Nombre del usuario</label>
		<input type="text" class="form-control" value="{{Auth::user()->name.' '.Auth::user()->apellidoPaterno.' '.Auth::user()->apellidoMaterno}}" readonly>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Nombre del curso</label>
		<input type="text" class="form-control" value="{{$curso->nombre}}" readonly>
	</div>
		
	<input id="curso_id" name="curso_id" type="hidden" class="" value="{{$curso->id}}">

	<a href="/ofertaCursos" class="btn btn-danger" tabindex="9">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="10">Inscribirse</button>
</form>

@endsection

@section('js')
	@if (session('error')=='ok')
    <script>
        Swal.fire({
		 icon: 'error',
		  title: 'Usuario inscrito',
		  text: '¡Ya estas inscrito en este curso!',
		})
	</script>
	@endif

	@if (session('cupo')=='ok')
    <script>
        Swal.fire({
		 icon: 'error',
		  title: 'Sin cupo',
		  text: '¡Este curso esta lleno!',
		})
	</script>
	@endif
@endsection