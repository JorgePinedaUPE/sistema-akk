{!! Form::open(['route' => ['servicios.destroy', $servicio->id], 'method' => 'DELETE']) !!}

	{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}