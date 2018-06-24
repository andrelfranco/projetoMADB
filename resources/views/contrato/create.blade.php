@extends('adminlte::page')

@section('content_header')
    <h1>Confirmar Contrato de Servico</h1>
@stop

@section('content')

<div class="box"> 	
	<div class="box-header with-border">
		<i class="fa fa-fw fa-gears "></i>
		<h2 class="box-title">{{ $servico->titulo }}</h2>
	</div>

	<div class="box-body">
		<dl>
			<dt>Descrição do Serviço</dt>
			<dd>{{ $servico->descricao }}</dd>
		</dl>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">
		<i class="fa fa-fw fa-wrench"></i>
		<h2 class="box-title">Informações do Prestador do Serviço</h2>
	</div>
	<div class="box-body">
		<dl>
			<dt>Nome</dt>
			<dd>{{ $servico->usuarios[0]->name }}</dd>
			<dt>Email</dt>
			<dd>{{ $servico->usuarios[0]->email }}</dd>
			<dt>CNPJ</dt>
			<dd>{{ $servico->usuarios[0]->cnpj }}</dd>
			<dt>Telefone</dt>
			<dd>{{ $servico->usuarios[0]->telefone }}</dd>
		</dl>
	</div>
	<div>
		{{ Form::open(['route' => ['contrato.store', 'servico' => $servico->_id], 'method' => 'POST']) }}
			<div class="form-group">
				{!! Form::label('info', 'Informações Adicionais') !!}
    			{!! Form::textarea('info', '', ['class' => 'form-control']) !!}
			</div>
			<div class="box-footer">
				{!! Form::submit('Confirmar', [ 'class' => 'btn btn-success' ]) !!}
			</div>
		{{ Form::close() }}
	</div>

</div>

@stop