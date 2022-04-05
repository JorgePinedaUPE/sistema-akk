@extends('layouts.theme.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto">
				<h1 class="text-center text-muted mb-5">{{ $curso->nombre }}</h1>

				<div class="row">
					<div class="col-md-8 mx-auto">
						<div class="card mb-3">
							<div class="card-body">
								<p class="card-text text-muted ">{{ $curso->description }}</p>
								<p class="card-text text-muted ">Fecha y hora de inicio: {{ $curso->fechaHora }}</p>
							</div>
							
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Cupo: {{ $curso->cupo }}</li>
								<li class="list-group-item"><h5><span class="badge bg-primary">$ {{ $curso->costo }}</span></h5></li>
							</ul>
							<p align="right"><a href="{{ route('Curso.inscripcion',$curso) }}"><button class="btn btn-success">Inscribirse</button></a></h3></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	@endsection

	