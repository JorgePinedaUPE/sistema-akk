@extends('layouts.theme.app')

@section('content')
	<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Gestión de efemérides</h3>
		<h3 class="text-center"><a href="{{ route('efemerides.create') }}"><button class="btn btn-success">Registrar efeméride</button></a></h3>
		@include('efemerides.search')
	</div>
</div>

<div class="row justify-content-center h-100">
	<div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Título</th>
					<th>Imagen</th>
				</thead>
				@if(count($efemerides)<=0)
					<tr>
						<tr colspan="6">No hay resultados</tr>
					</tr>
				@else
				@foreach($efemerides as $efemeride)
				<tr>
					<td>{{$efemeride->id}}</td>
					<td>{{$efemeride->titulo}}</td>
					<td><img src="{{ asset('storage').'/'.$efemeride->image }}" width="200" height="150"></td>
					<td>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{ route('efemerides.edit', $efemeride->id) }}"><button class="btn btn-info">Editar</button></a>
						<form class="EfemerideDelete" action="{{route('efemerides.destroy', $efemeride->id)}}" method="POST">
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
			{{ $efemerides->links() }}
		</div>
	</div>
</div>
@endsection

@section('js')
	@if (session('registrado')=='ok')
    <script>
        Swal.fire(
		    '¡Datos guardados!',
		    'La efemeride fue registrada de manera exitosa.',
		    'success'
		    )
    </script>
	@endif

	@if (session('editado') == 'ok')
    <script>
        Swal.fire(
		    '¡Cambios guardados!',
		    'La efemeride fue registrada de manera exitosa.',
		    'success'
	    )
    </script>
    @endif

    @if(session('eliminado') == 'ok')
    <script>
        Swal.fire(
		'¡Eliminado!',
		'La efemeride fue eliminada.',
		'success'
		)
	</script>
	@endif

	<script>
		$('.EfemerideDelete').submit(function(e){
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