@extends('adminlte::page')

@section('Titulo', 'Meu Perfil')

@section('content_header')
    <h1>Meu Perfil</h1>
@stop

@section('content')

<div class="row">
	
	<div class="col-md-4">
		<div class="box box-primary">
			<img class="profile-user-img img-responsive img-circle" src="http://busc.hol.es/Imagens/1378383_528629757230900_1270787052_n.jpg" alt="User profile picture">

			<h3 class="profile-username text-center">{!! $profile->name !!}</h3>
			<p class="text-muted text-center">{!! $profile->email !!}</p>

			<ul class="list-group list-group-unbordered">
				<li class="list-group-item">
					<b>Telefone</b> <a class="pull-right">{!! $profile->telefone !!}</a>
				</li>
				<li class="list-group-item">
					<b>CNPJ</b> <a class="pull-right">{!! $profile->cnpj !!}</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="col-md-8">
		
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
              <li class="active"><a href="#servicos" data-toggle="tab" aria-expanded="false">Servicos</a></li>
              <li class=""><a href="#servicos_contratados" data-toggle="tab" aria-expanded="false">Servicos Contratados</a></li>
            </ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="servicos">
				@foreach($profile->servicos as $servico)
					<div class="box box-success">
						<div class="box-header with-border">
				            <i class="fa fa-text-width"></i>

				            <h3 class="box-title">{{ $servico->titulo }}</h3>
			            </div>
			            <div class="box-body">
							<dl class="dl-horizontal">
								<dt>Descricao</dt>
								<dd>{{ $servico->descricao }}</dd>
							</dl>
			            </div>
			            <div class="box-footer">
			            	{!! Form::open(['method' => 'DELETE', 'route' => ['servico.destroy', $servico->_id], 'class' => 'inline-button']) !!}
                            	{!! Form::submit('Deletar', ['class' => 'btn btn-sm btn-danger']) !!}
                        	{!! Form::close() !!}
                        	<a href="
                        	{{route('servico.show', ['id' => $servico->_id])}}" class="btn btn-sm btn-success">Visualizar</a>
                        	<a href="{{route('servico.edit', ['id' => $servico->_id])}}" class="btn btn-sm btn-primary">Editar</a>
			            </div>
					</div>
					
				@endforeach
			</div>
			<div class="tab-pane" id="servicos_contratados">
				@foreach($profile->contratos as $contrato)
					<div class="box box-success">
						<div class="box-header with-border">
				            <i class="fa fa-text-width"></i>

				            <h3 class="box-title">{{ $contrato->servico[0]->titulo }}</h3>
			            </div>
			            <div class="box-body">
							<dl class="dl-horizontal">
								<dt>Descricao</dt>
								<dd>{{ $contrato->servico[0]->descricao  }}</dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Informacoes adicionais sobre o Contrato</dt>
								<dd>{{ $contrato->info }}</dd>
							</dl>
			            </div>
			            <div class="box-footer">
			            	<button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#avaliacao_{{ $contrato->_id }}">
									Avaliar Servico
							</button>
<!-- Modal -->
			            	<div class="modal fade" id="avaliacao_{{ $contrato->_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">gg</span></button>
											<h4 class="modal-title" id="myModalLabel">Avaliacao de Servico</h4>
										</div>
										<div class="modal-body">
											<div class="row">
											    {!! Form::model($contrato, ['route' => ['avaliacao', $contrato->_id], 'method' => 'PATCH']) !!}
												<div class="form-group">
													<div class="col-lg-12">
														<div class="star-rating">
															<span class="fa fa-star-o" data-rating="1"></span>
															<span class="fa fa-star-o" data-rating="2"></span>
															<span class="fa fa-star-o" data-rating="3"></span>
															<span class="fa fa-star-o" data-rating="4"></span>
															<span class="fa fa-star-o" data-rating="5"></span>
															<input type="hidden" name="avaliacao" class="rating-value" value="0">
														</div>
													</div>
													<div class="form-group">
														{!! Form::label('comentario', 'Comentario') !!}
														{!! Form::textarea('comentario_avaliacao', null, ['class' => 'form-control']) !!}
													</div>
												</div>
										  </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											{!! Form::submit('Salvar', [ 'class' => 'btn btn-primary' ]) !!}
											{!! Form::close() !!}
										</div>
									</div>
								</div>
							</div>
			            </div>
					</div>
				@endforeach
			</div>
		</div>

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