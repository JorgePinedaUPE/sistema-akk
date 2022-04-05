@extends('layouts.theme.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto">
				<h1 class="text-center text-muted mb-5">Cursos</h1>

				<div class="row">
					@foreach($cursos as $curso)

					<div class="col-md-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title text-center mb-3">
									<a href="{{ route('ofertaCursos.show',$curso->id) }}" class="link-dangeer">{{ $curso->nombre }}</a>
								</h5>
								<p class="card-text text-muted ">{{ $curso->description }}</p>
							</div>
							<ul class="list-group list-group-flush">
							<li class="list-group-item">Cupo: {{ $curso->cupo }}</li>
							<li class="list-group-item"><h5><span class="badge bg-primary">$ {{ $curso->costo }}</span></h5></li>
						</ul>
						</div>
					</div>

					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
	@if (session('inscrito')=='ok')
    <script>
        Swal.fire(
		    '¡Datos guardados!',
		    'Tu inscripción se genero de manera exitosa.',
		    'success'
		    )
    </script>
	@endif
@endsection