{!! Form::open(['route' => ['cursos.destroy', $curso->id], 'method' => 'DELETE']) !!}

	{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}