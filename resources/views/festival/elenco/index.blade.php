@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Participantes <a href="elenco/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('festival.elenco.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Academia</th>
					<th>Data de nascimento</th>
					<th>Rg</th>
					<th>Categoria</th>
					<th>Opções</th>
				</thead>
               @foreach ($elenco as $ele)
				<tr>
					<td>{{ $ele->ID}}</td>
					<td>{{ $ele->NOME}}</td>
					<td>{{ $ele->ACADEMIA}}</td>
					<td>{{Carbon\Carbon::parse($ele->DT_NASCIMENTO)->format('d/m/Y')}}</td>
					<td>{{ $ele->RG}}</td>
					@if((Carbon\Carbon::parse($ele->DT_NASCIMENTO)->year - 2017) <= '-4' and (Carbon\Carbon::parse($ele->DT_NASCIMENTO)->year - 2017)>= '-10')
						<td>Infantil</td>
					@elseif((Carbon\Carbon::parse($ele->DT_NASCIMENTO)->year - 2017) <= '-11' and (Carbon\Carbon::parse($ele->DT_NASCIMENTO)->year - 2017)>= '-14')
						<td>Juvenil</td>
					@elseif((Carbon\Carbon::parse($ele->DT_NASCIMENTO)->year - 2017) <= '-15' and (Carbon\Carbon::parse($ele->DT_NASCIMENTO)->year - 2017)>= '-17')
						<td>Juvenil Avançado</td>
					@else
						<td>Adulto</td>
					@endif
					<td>
						<a href="{{URL::action('ElencoController@edit',$ele->ID)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ele->ID}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('festival.elenco.modal')
				@endforeach
			</table>
		</div>
		{{$elenco->render()}}
	</div>
</div>
@stop