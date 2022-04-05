@extends('layouts.theme.app')

@section('content')
	<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Gestión de empleados</h3>
		<h3 class="text-center"><a href="{{ route('empleados.pdf') }}" class="btn btn-primary">Generar PDF</a>&nbsp;&nbsp;<a href="{{ route('empleados.excel') }}"><button class="btn btn-primary">Generar Excel</button></a>&nbsp;&nbsp;<a href="{{ route('empleados.create') }}"><button class="btn btn-success">Registrar empleado</button></a></h3> 
		@include('empleados.search')
	</div>
</div>

<div class="row justify-content-center h-100">
	<div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>ApellidoP</th>
					<th>ApellidoM</th>
					<th>Num Seguro</th>
					<th>Puesto</th>
				</thead>
				@if(count($empleados)<=0)
					<tr>
						<tr colspan="6">No hay resultados</tr>
					</tr>
				@else
				@foreach($empleados as $empleado)
				<tr>
					<td>{{$empleado->id}}</td>
					<td>{{$empleado->nombre}}</td>
					<td>{{$empleado->apellidoPaterno}}</td>
					<td>{{$empleado->apellidoMaterno}}</td>
					<td>{{$empleado->numSeguro}}</td>
					<td>{{$empleado->puesto}}</td>
					<td>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{ route('empleados.edit', $empleado->id) }}"><button class="btn btn-info">Editar</button></a>
						<form class="EmpleadoDelete" action="{{route('empleados.destroy', $empleado->id)}}" method="POST">
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
			{{ $empleados->links() }}
		</div>
	</div>
</div>


@endsection

@section('js')
	@if (session('registrado')=='ok')
    <script>
        Swal.fire(
		    '¡Datos guardados!',
		    'El empleado fue registrado de manera exitosa.',
		    'success'
		    )
    </script>
	@endif

	@if (session('editado') == 'ok')
    <script>
        Swal.fire(
		    '¡Cambios guardados!',
		    'El empleado fue editado de manera exitosa.',
		    'success'
	    )
    </script>
    @endif

    @if(session('eliminado') == 'ok')
    <script>
        Swal.fire(

		'¡Eliminado!',
		'El empleado fue eliminado.',
		'success'
		)
	</script>
	@endif


	<script>
		$('.EmpleadoDelete').submit(function(e){
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