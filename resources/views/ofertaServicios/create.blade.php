@extends('layouts.theme.app')

@section('content')
	
<h1 class="text-center text-muted mb-5">Solicitar servicio</h1>

<form action="/ofertaServicios" method="POST">
	@csrf
	<input id="usuario_id" name="usuario_id" type="hidden" class="" value="{{Auth::user()->id}}">

	<div class="mb-3">
		<label for="" class="form-label">Nombre del usuario</label>
		<input type="text" class="form-control" value="{{Auth::user()->name.' '.Auth::user()->apellidoPaterno.' '.Auth::user()->apellidoMaterno}}" readonly>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Nombre del servicio</label>
		<input type="text" class="form-control" value="{{$servicio->nombre}}" readonly>
	</div>
		
	<input id="servicio_id" name="servicio_id" type="hidden" class="" value="{{$servicio->id}}">

	<a href="/ofertaServicios" class="btn btn-danger" tabindex="9">Cancelar</a>
	<button type="submit" class="btn btn-success" tabindex="10">Solicitar</button>
</form>

@endsection

@section('js')
	@if (session('error')=='ok')
    <script>
        Swal.fire({
		 icon: 'error',
		  title: 'Servicio solicitado',
		  text: '¡Ya solicitaste este curso!',
		})
	</script>
	@endif
@endsection