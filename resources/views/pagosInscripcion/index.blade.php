@extends('layouts.theme.app')

@section('content')

	

	<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Mis cursos</h3>
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
						<td>
							@php
								// SDK de Mercado Pago
								require base_path('/vendor/autoload.php');
								// Agrega credenciales
								MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
								// Crea un objeto de preferencia
								$preference = new MercadoPago\Preference();

								// Crea un ítem en la preferencia
								foreach($inscripciones as $inscripcion){
									$item = new MercadoPago\Item();
									$item->title = $inscripcion->nombre;
									$item->quantity = 1;
									$item->unit_price = $inscripcion->costo;

									$products[] = $item;
								}

								$preference->items = $products;
								$preference->save();
							@endphp
							<div class="cho-container"></div>
							<a href="{{ route('inscripciones.pdf',$inscripcion->folio) }}"><button class="btn btn-primary">Imprimir</button></a>
						</td>
					</tr>
					@endforeach
					@endif
				</table>
				{{ $inscripciones->links() }}
			</div>
		</div>
	</div>

<script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
  // Agrega credenciales de SDK
  const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
    locale: "es-AR",
  });

  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: '{{ $preference->id }}',
    },
    render: {
      container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
      label: "Pagar", // Cambia el texto del botón de pago (opcional)
    },
  });
</script>

@endsection