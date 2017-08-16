@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Coreografia <a href="coreografia/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('festival.coreografia.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Academia</th>
					<th>Nome coreografia</th>
					<th>Classificação</th>
					<th>Modalidade</th>
					<th>Categoria</th>
					<th>Duração</th>
					<th>Participação</th>
					<th>Musica</th>
					<th>Arquivo musica</th>
					<th>Coreógrafo</th>
					<th>Link YouTube</th>
					<th>Confirmada</th>
					<th>Apresentação</th>
					<th>Hora ensaio</th>
					<th>Hora Apresentação</th>
				</thead>
               @foreach ($coreografia as $core)
				<tr>
					<td>{{ $core->id_inscricao}}</td>
					<td>{{ $core->ACADEMIA}}</td>
					<td>{{ $core->nomecoreografia}}</td>
					<td>{{ $core->classificacao}}</td>
					<td>{{ $core->modalidade}}</td>
					<td>{{ $core->categoria}}</td>
					<td>{{ $core->duracao}}</td>
					<td>{{ $core->participacao}}</td>
					<td>{{ $core->musica}}</td>
					<td>{{ $core->arquivo_musica}}</td>
					<td>{{ $core->coreografo}}</td>
					<td>{{ $core->link_youtube}}</td>
					<td>{{ $core->confirmada}}</td>
					<td>{{ $core->apresentacao}}</td>
					<td>{{ $core->horaensaio}}</td>
					<td>{{ $core->horaapresentacao}}</td>
					<td>
						<a href="{{URL::action('CoreografiaController@edit',$core->id_inscricao)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$core->id_inscricao}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('festival.coreografia.modal')
				@endforeach
			</table>
		</div>
		{{$coreografia->render()}}
	</div>
</div>
@stop