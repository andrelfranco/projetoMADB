@extends('adminlte::page')

@section('Titulo', 'Cadastro de Serviço')

@section('content')

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Cadastro de Serviço</h3>
		</div>

		<div class="box-body">
			{!! Form::open(['route' => 'servico.store', 'method' => 'POST']) !!}

				<div class="form-group">
					{!! Form::label('titulo', 'titulo') !!}
	    			{!! Form::text('titulo', '', ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('descricao', 'Descrição') !!}
	    			{!! Form::textarea('descricao', '', ['class' => 'form-control']) !!}
				</div>

				<div class="box-footer">
					{!! Form::submit('Cadastrar', [ 'class' => 'btn btn-primary' ]) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@stop