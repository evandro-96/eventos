@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Coreografia</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'festival/coreografia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="form-group">
				<label for="nomecoreografia">Nome coreografia</label>
				<input type="text" name="nomecoreografia" class="form-control" placeholder="Nome Coreografia...">
			</div>

			<div class="form-group">
				<label>Academia</label>
				<select name="id_academia" class="form-control">
					@foreach($academias as $aca)
						@if($aca->ID)
							<option value="{{$aca->ID}}" selected>
								{{$aca->ACADEMIA}}
							</option>
						@else
							<option value="{{$aca->ID}}">
								{{$aca->ACADEMIA}}
							</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Classificação</label>
				<select name="classificacao" class="form-control">
					<option value="Competição">Competição</option>
					<option value="Mostra Avaliada">Mostra Avaliada</option>
					<option value="Ambas">Ambas</option>
				</select>
			</div>
			<div class="form-group">
				<label>Modalidade</label>
				<select name="modalidade" class="form-control">
					<option value="Ballet Clássico/Neoclássico">Ballet Clássico/Neoclássico</option>
					<option value="Dança Moderna/Contemporânea">Dança Moderna/Contemporânea</option>
					<option value="Ballet Clássico de Repertório">Ballet Clássico de Repertório</option>
					<option value="Dança Livre">Dança Livre</option>
					<option value="Jazz">Jazz</option>
					<option value="Folclore de Projeção">Folclore de Projeção</option>
				</select>
			</div>
			<div class="form-group">
				<label>Categoria</label>
				<select name="categoria" class="form-control">
					<option value="Infantil">Infantil</option>
					<option value="Juvenil">Juvenil</option>
					<option value="Juvenil Avançado">Juvenil Avançado</option>
					<option value="Adulto">Adulto</option>
				</select>
			</div>
			<div class="form-group">
				<label for="duracao">Duração</label>
				<input type="text" name="duracao" class="form-control" placeholder="Duração...">
			</div>
			<div class="form-group">
				<label>Participação</label>
				<select name="participacao" class="form-control">
					<option value="SOLO">Solo</option>
					<option value="DUO">Duo</option>
					<option value="TRIO">Trio</option>
					<option value="GRUPO/CONJUNTO">Grupo/Conjunto</option>
				</select>
			</div>
			<div class="form-group">
				<label for="musica">Música</label>
				<input type="text" name="musica" class="form-control" placeholder="Música...">
			</div>
			<div class="form-group">
				<label for="arquivo_musica">Arquivo Musica</label>
				<input type="text" name="arquivo_musica" class="form-control" placeholder="Arquivo musica...">
			</div>
			<div class="form-group">
				<label for="coreografo">Coreógrafo</label>
				<input type="text" name="coreografo" class="form-control" placeholder="Coreógrafo...">
			</div>
			<div class="form-group">
				<label for="link_youtube">Link YouTube</label>
				<input type="text" name="link_youtube" class="form-control" placeholder="Link YouTube...">
			</div>
			<div class="form-group">
				<label>Confirmada</label>
				<select name="confirmada" class="form-control">
					<option value="NÃO">Não</option>
					<option value="SIM">SIM</option>
				</select>
			</div>
			<div class="form-group">
				<label for="apresentacao">Apresentação</label>
				<input type="text" name="apresentacao" class="form-control" placeholder="Apresentação...">
			</div>
			<div class="form-group">
				<label for="horaensaio">Hora ensaio</label>
				<input type="text" name="horaensaio" class="form-control" placeholder="Hora Ensaio...">
			</div>
			<div class="form-group">
				<label for="horaapresentacao">Hora Apresentação</label>
				<input type="text" name="horaapresentacao" class="form-control" placeholder="Hora Apresentação...">
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop