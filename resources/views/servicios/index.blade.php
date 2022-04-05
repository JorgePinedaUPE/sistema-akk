@extends('layouts.theme.app')

@section('content')
	<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Gestión de servicios</h3>

		<h3 class="text-center"><a href="{{ route('servicios.pdf') }}"><button class="btn btn-primary">Generar PDF</button></a>&nbsp;&nbsp;<a href="{{ route('servicios.excel') }}"><button class="btn btn-primary">Generar Excel</button></a>&nbsp;&nbsp;<a href="{{ route('servicios.create') }}"><button class="btn btn-success">Registrar servicio</button></a></h3>
		@include('servicios.search')
	</div>
</div>

<div class="row justify-content-center h-100">
	<div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Costo</th>
				</thead>
				@if(count($servicios)<=0)
					<tr>
						<tr colspan="6">No hay resultados</tr>
					</tr>
				@else
				@foreach($servicios as $servicio)
				<tr>
					<td>{{$servicio->id}}</td>
					<td>{{$servicio->nombre}}</td>
					<td>{{$servicio->description}}</td>
					<td>{{$servicio->costo}}</td>
					<td>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{ route('servicios.edit', $servicio->id) }}"><button class="btn btn-info">Editar</button></a>
						<form class="ServicioDelete" action="{{route('servicios.destroy', $servicio->id)}}" method="POST">
	    					@csrf
	    					@method('delete')
	    					<input class="btn btn-danger eliminar" type="submit" value="Eliminar">
						</form>
					</div>
					</td>
				</tr>
				@endforeach
				@endif
			</table>
			{{ $servicios->links() }}
		</div>
	</div>
</div>
@endsection

@section('js')
	@if (session('registrado')=='ok')
    <script>
        Swal.fire(
		    '¡Datos guardados!',
		    'El servicio fue registrado de manera exitosa.',
		    'success'
		    )
    </script>
	@endif

	@if (session('editado') == 'ok')
    <script>
        Swal.fire(
		    '¡Cambios guardados!',
		    'El servicio fue editado de manera exitosa.',
		    'success'
	    )
    </script>
    @endif

    @if(session('eliminado') == 'ok')
    <script>
        Swal.fire(

		'¡Eliminado!',
		'El servicio fue eliminado.',
		'success'
		)
	</script>
	@endif

	<script>
		$('.ServicioDelete').submit(function(e){
		e.preventDefault();
		Swal.fire({
		title: '¿Seguro que desea eliminar el registro?',
		text: "¡Una vez eliminado no se podrá recuperar la información!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: '¡Cancelar!',
		confirmButtonText: '¡Si, deseo eliminar el registro!'
		}).then((result) => {
				if (result.isConfirmed) {
					this.submit();
				}
			})
		});
    </script>

@endsection