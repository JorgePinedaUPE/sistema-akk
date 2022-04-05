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
		<h1>Cursos</h1>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Cupo</th>
				<th>Modalidad</th>
				<th>FechaHora</th>
				<th>Dirección</th>
				<th>Costo</th>
				</thead>
				@if(count($cursos)<=0)
				<tr>
					<tr colspan="6">No hay resultados</tr>
				</tr>
				@else
				@foreach($cursos as $curso)
				<tr>
					<td>{{$curso->id}}</td>
					<td>{{$curso->nombre}}</td>
					<td>{{$curso->cupo}}</td>
					<td>{{$curso->modalidad}}</td>
					<td>{{$curso->fechaHora}}</td>
					<td>{{$curso->direccion}}</td>
					<td>{{$curso->costo}}</td>
				</tr>
				@endforeach
				@endif
		</table>
		<h3>Total de cursos: {{ $totalCursos }}</h3>
		<h3>Total de cursos en modalidad virtual: {{ $virtuales }}</h3>
		<h3>Total de cursos en modalidad presencial: {{ $presenciales }}</h3>
	</body>
</html>


