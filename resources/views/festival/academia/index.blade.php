@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Academias <a href="academia/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('festival.academia.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Academia</th>
					<th>Nome do Grupo</th>
					<th>Endereço</th>
					<th>Numero</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th>Diretor</th>
					<th>Pago</th>
					<th>Opções</th>
				</thead>
               @foreach ($academia as $aca)
				<tr>
					<td>{{ $aca->ID}}</td>
					<td>{{ $aca->ACADEMIA}}</td>
					<td>{{ $aca->NOMEDOGRUPO}}</td>
					<td>{{ $aca->ENDERECO}}</td>
					<td>{{ $aca->NUMERO}}</td>
					<td>{{ $aca->BAIRRO}}</td>
					<td>{{ $aca->CIDADE}}</td>
					<td>{{ $aca->UF}}</td>
					<td>{{ $aca->DIRETOR}}</td>
					<td>{{ $aca->PAGO}}</td>
					<td>
						<a href="{{URL::action('AcademiaController@edit',$aca->ID)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$aca->ID}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('festival.academia.modal')
				@endforeach
			</table>
		</div>
		{{$academia->render()}}
	</div>
</div>
@stop