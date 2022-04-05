<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		.table {
			width: 100%;
			border: 1px solid #999999;
		}
		.forma {
			margin-left: 40%;
		}
	</style>
</head>
	<body>
		<img class="forma" src="{{public_path('storage/images/logoakk.png')}}" alt="" width="100">
		<h1>Servicios</h1>
		<table class="table">
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
		</tr>
		@endforeach
		@endif
		</table>
		<h3>Total de servicios: {{ $totalServicios }}</h3>
	</body>
</html>