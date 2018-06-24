@extends('adminlte::page')

@section('content')

<div class="box-body box-profile">
	<img class="profile-user-img img-responsive img-circle" src="http://busc.hol.es/Imagens/1378383_528629757230900_1270787052_n.jpg" alt="User profile picture">
	<h3 class="profile-username text-center">{!! $usuario->name !!}</h3>

	<p class="text-muted text-center">{!! $usuario->email !!}</p>

	<ul class="list-group list-group-unbordered">
		<li class="list-group-item">
			<b>Telefone</b> <a class="pull-right">{!! $usuario->telefone !!}</a>
		</li>
		<li class="list-group-item">
			<b>CNPJ</b> <a class="pull-right">{!! $usuario->cnpj !!}</a>
		</li>
	</ul>
</div>

@stop