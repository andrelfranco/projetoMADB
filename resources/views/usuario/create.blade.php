@extends('adminlte::page')

@section('Titulo', 'Cadastro de Usuário')

@section('content')
    <div class="box box-primary">
    	<div class="box-header with-border">
    		<h3 class="box-title">Cadastro de Usuário</h3>
    	</div>

    	<div class="box-body">
    		{!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
	    		<div class="form-group">
	    			{!! Form::label('cnpj', 'CNPJ') !!}
	    			{!! Form::text('cnpj', '', ['class' => 'form-control']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('telefone', 'Telefone') !!}
	    			{!! Form::text('telefone', '', ['class' => 'form-control']) !!}
	    		</div>
	    		<div class="box-footer">
	    			{!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
	    		</div>
			{!! Form::close() !!}
    	</div>
    </div>
@stop