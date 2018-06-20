@extends('adminlte::page')

@section('content')
	@foreach ($testes as $teste)	
		<td>{{ 	$teste->nome }}</td>
	@endforeach
@stop
