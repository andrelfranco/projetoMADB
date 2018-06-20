@extends('adminlte::page')

@section('Titulo', 'Usuarios')

@section('content')

	<div class="box">
		<div class="box-header with-border">
			Usuarios
		</div>
		<div class="box-body">
			<table class="table table-bodered">
				<tbody>
					<tr>
						<th>#</th>
						<th>nome</th>
						<th>email</th>
						<th>cnpj</th>
						<th>telefone</th>
						<th></th>
					</tr>
					@foreach ($usuarios as $usuario)	
						<tr>
							<td></td>
							<td>{{ 	$usuario->nome }}</td>
							<td>{{ 	$usuario->email }}</td>
							<td>{{ 	$usuario->cnpj }}</td>
							<td>{{ 	$usuario->telefone }}</td>
							<td class="inline-button">
	                            {!! Form::open([
	                            	'method' => 'DELETE', 'route' => ['usuario.destroy', $usuario->_id], 'class' => 'inline-button'
	                            	]) !!}
	                            	{!! Form::submit('Deletar', ['class' => 'btn btn-sm btn-danger']) !!}
	                            {!! Form::close() !!}
	                            <a href=
	                            "{{route('usuario.edit', ['id' => $usuario->_id])}}" class="btn btn-sm btn-primary">Editar</a>
	                            <a href=
	                            "{{route('usuario.show', ['id' => $usuario->_id])}}" class="btn btn-sm btn-success">Visualizar</a>
                        	</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
