@extends('layouts.theme.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto">
				<h1 class="text-center text-muted mb-5">{{ $servicio->nombre }}</h1>

				<div class="row">
					<div class="col-md-8 mx-auto">
						<div class="card mb-3">
							<div class="card-body">
								<p class="card-text text-muted ">{{ $servicio->description }}</p>
							</div>
							
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><h5><span class="badge bg-primary">$ {{ $servicio->costo }}</span></h5></li>
							</ul>
							<p align="right"><a href="{{ route('Servicio.solicitud',$servicio) }}"><button class="btn btn-success">Solicitar servicio</button></a></h3></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection