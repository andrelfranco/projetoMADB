@extends('adminlte::page')

@section('content')
    <div class="small-box bg-aqua">
            <div class="inner">
             	<h3>{{ $quant_servicos }}</h3>
             	<p>Serviços Cadastrados</p>
            </div>
            <div class="icon">
             	<i class="ion ion-bag"></i>
           	</div>
           	<a href="{{ route('servico.index') }}" class="small-box-footer">Visualizar Serviços <i class="fa fa-arrow-circle-right"></i></a>
    </div>
@stop