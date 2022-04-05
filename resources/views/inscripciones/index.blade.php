@extends('layouts.theme.app')

@section('content')
<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Inscripciones</h3>
		@include('inscripciones.search')
	</div>
</div>

	<div class="row justify-content-center h-100">
		<div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido paterno</th>
						<th>Apellido materno</th>
						<th>Curso</th>
						<th>Status</th>
						<th>Seguimiento</th>
					</thead>
					@if(count($inscripciones)<=0)
						<tr>
							<tr colspan="6">No hay resultados</tr>
						</tr>
					@else
					@foreach($inscripciones as $inscripcion)
					<tr>
						<td>{{$inscripcion->folio}}</td>
						<td>{{$inscripcion->name}}</td>
						<td>{{$inscripcion->apellidoPaterno}}</td>
						<td>{{$inscripcion->apellidoMaterno}}</td>
						<td>{{$inscripcion->nombre}}</td>
						<td>{{$inscripcion->statusPago}}</td>
						<td>{{$inscripcion->segumiento}}</td>
					</tr>
					@endforeach
					@endif
				</table>
				{{ $inscripciones->links() }}
			</div>
		</div>
	</div>
@endsection