{!! Form::open(['route' => ['efemerides.destroy', $efemeride->id], 'method' => 'DELETE']) !!}

	{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}