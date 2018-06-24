@extends('adminlte::page')

@section('Titulo', 'Usuarios')

@section('content')

<div class="box">
	
	<div class="box-header with-border">
		Serviços
	</div>

	<div class="box-body">
		<table class="table table-bodered">
			<tbody>
				<tr>
					<th>Usuario</th>
					<th>cnpj</th>
					<th>Titulo do Serviço</th>
					<th></th>
				</tr>
				@foreach ($usuarios as $usuario)
					@if(isset($usuario->servico_ids))
						@foreach($usuario->servicos as $servico)
							<tr>
								<td>{!! $usuario->name !!}</td>
								<td>{!! $usuario->cnpj !!}</td>
								<td>{!! $servico->titulo !!}</td>
								<td>
									{!! Form::open(['method' => 'DELETE', 'route' => ['servico.destroy', $servico->_id], 'class' => 'inline-button']) !!}
		                            	{!! Form::submit('Deletar', ['class' => 'btn btn-sm btn-danger']) !!}
	                            	{!! Form::close() !!}
	                            	<a href="
	                            	{{route('servico.show', ['id' => $servico->_id])}}" class="btn btn-sm btn-success">Visualizar</a>
	                            	<a href="{{route('servico.edit', ['id' => $servico->_id])}}" class="btn btn-sm btn-primary">Editar</a>
									</td>

							</tr>
						@endforeach
					@endif
				@endforeach
			</tbody>
		</table>
	</div>

</div>

@stop