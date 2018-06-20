@extends('adminlte::page')

@section('Titulo', 'Usuario')

@section('content')
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Editar Dados de Usuário</h3>
		</div>

		<div class="box-body">
			{!! Form::model($usuario, ['route' => ['usuario.update', $usuario->_id], 'method' => 'PATCH']) !!}
	    		<div class="form-group">
	    			{!! Form::label('nome', 'Nome') !!}
	    			{!! Form::text('nome', null, ['class' => 'form-control']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('email', 'Email') !!}
	    			{!! Form::text('email', null, ['class' => 'form-control']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('cnpj', 'CNPJ') !!}
	    			{!! Form::text('cnpj', null, ['class' => 'form-control']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('telefone', 'Telefone') !!}
	    			{!! Form::text('telefone', null, ['class' => 'form-control']) !!}
	    		</div>
	    		<div class="box-footer">
	    			{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
	    		</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop