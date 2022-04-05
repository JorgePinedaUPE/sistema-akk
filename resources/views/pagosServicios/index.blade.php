@extends('layouts.theme.app')

@section('content')

	@php
		// SDK de Mercado Pago
		require base_path('/vendor/autoload.php');
		// Agrega credenciales
		MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
		// Crea un objeto de preferencia
		$preference = new MercadoPago\Preference();

		// Crea un ítem en la preferencia
		foreach($solicitudes as $solicitud){
			$item = new MercadoPago\Item();
			$item->title = $solicitud->nombre;
			$item->quantity = 1;
			$item->unit_price = $solicitud->costo;

			$products[] = $item;
		}

		$preference->items = $products;
		$preference->save();
	@endphp

	<div class="row justify-content-center h-100">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 class="text-center">Mis solicitudes de servicio</h3>
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
						<td>
							<div class="cho-container"></div>
							<a href="{{ route('solicitudes.pdf',$solicitud->folio) }}"><button class="btn btn-primary">Imprimir</button></a>
						</td>
					</tr>
					@endforeach
					@endif
				</table>
				{{ $solicitudes->links() }}
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