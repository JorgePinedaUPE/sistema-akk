@extends('layouts.theme.app')

@section('content')
<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Solicitudes de servicio</h3>
		@include('solicitudes.search')
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
						<th>Servicio</th>
						<th>Status</th>
					</thead>
					@if(count($solicitudes)<=0)
						<tr>
							<tr colspan="6">No hay resultados</tr>
						</tr>
					@else
					@foreach($solicitudes as $solicitud)
					<tr>
						<td>{{$solicitud->folio}}</td>
						<td>{{$solicitud->name}}</td>
						<td>{{$solicitud->apellidoPaterno}}</td>
						<td>{{$solicitud->apellidoMaterno}}</td>
						<td>{{$solicitud->nombre}}</td>
						<td>{{$solicitud->statusPago}}</td>
					</tr>
					@endforeach
					@endif
				</table>
				{{ $solicitudes->links() }}
			</div>
		</div>
	</div>
@endsection