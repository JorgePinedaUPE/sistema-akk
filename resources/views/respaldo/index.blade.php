@extends('layouts.theme.app')

@section('content')
<div class="row justify-content-center h-100 text">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Respaldo de la base de datos</h3>
	</div>
</div>
<br>
<br>
<br>
<div class="mb-3 text-center">
	<form action="/respaldo"><button type="submit" class="btn btn-success" tabindex="10">Generar respaldo</button></form>
</div>
<br>
<br>
<br>
<br>
<br>
<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Restauración de la base de datos</h3>
	</div>
</div>

<div class="mb-3 text-center">
	<form action="/restauracion" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file" class="form-control" tabindex="2" required=""><button class="btn btn-info">Restaurar</button></form>
</div>


@endsection