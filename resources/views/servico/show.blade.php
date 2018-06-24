@extends('adminlte::page')

@section('content')

	<div>
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
		</div>
		<div class="box">
			<div class="box-header with-border">
				<i class="fa fa-fw fa-gears "></i>
				<h2 class="box-title">Avaliacao</h2>
			</div>

			<div class="box-body">
				<dl>
					<div class="col-lg-12">
						<div class="star-rating">
							<span class="fa fa-star-o" data-rating="1"></span>
							<span class="fa fa-star-o" data-rating="2"></span>
							<span class="fa fa-star-o" data-rating="3"></span>
							<span class="fa fa-star-o" data-rating="4"></span>
							<span class="fa fa-star-o" data-rating="5"></span>
							<input type="hidden" name="avaliacao" class="rating-value" value="{{ $avaliacao }}">
						</div>
					</div>
				</dl>
			</div>
		</div>
		<div>
			<a type="button" href="{{ route('contrato.create', [ 'servico' => $servico->_id]) }}" class="btn btn-block btn-primary btn-lg">Contratar Serviço</a>
		</div>

	</div>

@stop

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/star-avaliate.css') }}
			">
@stop

@section('js')
	<script src="{{ URL::asset('js/star-avaliate.js') }}"></script>
@stop