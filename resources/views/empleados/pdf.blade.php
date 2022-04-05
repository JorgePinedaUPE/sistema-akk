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
		<h1>Empleados</h1>
		<table class="table">
			<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>ApellidoP</th>
			<th>ApellidoM</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Num Seguro</th>
			<th>Puesto</th>
			<th>TipoSangre</th>
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
				<td>{{$empleado->correo}}</td>
				<td>{{$empleado->telefono}}</td>
				<td>{{$empleado->numSeguro}}</td>
				<td>{{$empleado->puesto}}</td>
				<td>{{$empleado->tipoSangre}}</td>
			</tr>
			@endforeach
			@endif
		</table>
		<h3>Total de empleados: {{ $totalEmpleados }}</h3>
		<h3>Total de empleados sin seguro: {{ $sinSeguro }}</h3>
	</body>
</html>