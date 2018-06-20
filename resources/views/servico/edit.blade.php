@extends('adminlte::page')

@section('Titulo', 'Editar Usuário')

@section('content')

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Cadastor de Serviço</h3>
		</div>

		<div class="box-body">
			{!! Form::model($servico, ['route' => ['servico.update', $servico->_id], 'method' => 'PATCH']) !!}

				<div class="form-group">
					{!! Form::label('titulo', 'titulo') !!}
	    			{!! Form::text('titulo', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('descricao', 'Descrição') !!}
	    			{!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
				</div>

				<div class="box-footer">
					{!! Form::submit('Salvar', [ 'class' => 'btn btn-primary' ]) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@stop