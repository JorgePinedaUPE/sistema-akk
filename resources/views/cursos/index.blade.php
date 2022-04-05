@extends('layouts.theme.app')

@section('content')
	<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Gestión de cursos</h3>
		<h3 class="text-center"><a href="{{ route('cursos.pdf') }}"><button class="btn btn-primary">Generar PDF</button></a>&nbsp;&nbsp;<a href="{{ route('cursos.excel') }}"><button class="btn btn-primary">Generar Excel</button></a>&nbsp;&nbsp;<a href="{{ route('cursos.create') }}"><button class="btn btn-success">Registrar curso</button></a></h3> 
		@include('cursos.search')
	</div>
</div>

<div class="row justify-content-center h-100">
	<div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead><!--Nombres de las columnas-->
					<th>ID</th>
					<th>Nombre</th>
					<th>Cupo</th>
					<th>Modalidad</th>
					<th>Fecha y hora</th>
					<th>Dirección</th>
					<th>Costo</th>
				</thead>
				@if(count($cursos)<=0)<!--Condicional si cursos es = 0-->
					<tr>
						<tr colspan="6">No hay resultados</tr>
					</tr>
				@else<!--Si no es igual a 0-->
				@foreach($cursos as $curso)<!--Recorrido de todos los registro-->
				<tr>
					<td>{{$curso->id}}</td>
					<td>{{$curso->nombre}}</td>
					<td>{{$curso->cupo}}</td>
					<td>{{$curso->modalidad}}</td>
					<td>{{$curso->fechaHora}}</td>
					<td>{{$curso->direccion}}</td>
					<td>{{$curso->costo}}</td>
					<td>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{ route('cursos.edit', $curso->id) }}"><button class="btn btn-info">Editar</button></a>
						<form class="CursoDelete" action="{{route('cursos.destroy', $curso->id)}}" method="POST">
	    					@csrf
	    					@method('delete')
	    					<input class="btn btn-danger eliminar" type="submit" value="Eliminar">
						</form>
					</div>
					</td>
				</tr>
				@endforeach<!--Fin del recorrido-->
				@endif<!--Fin de la condicional-->
			</table>
			{{ $cursos->links() }}<!--Paginacion de los registros-->
		</div>
	</div>
</div>
@endsection

@section('js')

	@if (session('registrado')=='ok')
    <script>
        Swal.fire(
		    '¡Datos guardados!',
		    'El curso fue creado de manera exitosa.',
		    'success'
		    )
    </script>
	@endif

	@if (session('editado') == 'ok')
    <script>
        Swal.fire(
		    '¡Cambios guardados!',
		    'El curso fue editado de manera exitosa.',
		    'success'
	    )
    </script>
    @endif

    @if(session('eliminado') == 'ok')
    <script>
        Swal.fire(

		'¡Eliminado!',
		'El curso fue eliminada.',
		'success'
		)
	</script>
	@endif

	<script>
		$('.CursoDelete').submit(function(e){
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