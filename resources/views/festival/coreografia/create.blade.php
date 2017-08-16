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
            	<label for="ACADEMIA">Academia</label>
            	<input type="text" name="ACADEMIA" class="form-control" placeholder="Academia...">
            </div>
			<div class="form-group">
				<label for="classificacao">Classificação</label>
				<input type="text" name="classificacao" class="form-control" placeholder="Classificação...">
			</div>
			<div class="form-group">
				<label for="modalidade">Modalidade</label>
				<input type="text" name="modalidade" class="form-control" placeholder="Modalidade...">
			</div>
			<div class="form-group">
				<label for="categoria">Categoria</label>
				<input type="text" name="categoria" class="form-control" placeholder="Categoria...">
			</div>
			<div class="form-group">
				<label for="duracao">Duração</label>
				<input type="text" name="duracao" class="form-control" placeholder="Duração...">
			</div>
			<div class="form-group">
				<label for="participacao">Participação</label>
				<input type="text" name="participacao" class="form-control" placeholder="Participação...">
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
				<label for="confirmada">Confirmada(SIM/NAO)</label>
				<input type="text" name="confirmada" class="form-control" placeholder="Confirmada...">
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