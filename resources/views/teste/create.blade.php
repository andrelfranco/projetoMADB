<html>
	{!! Form::open(['route' => 'teste.store', 'method' => 'POST']) !!}
		{!! Form::text('nome', '') !!}
		{!! Form::submit('Salvar') !!}

	    
	{!! Form::close() !!}
</html>