@extends('layouts.admin')
@section('conteudo')

<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<h3>Editar Coreografia: {{$coreografia->nomecoreografia }}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($coreografia, ['method'=>'PATCH', 'route'=>['coreografia.update', $coreografia->id_inscricao]])!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nomecoreografia">Nome Coreografia</label>
						<input type="text" name="nomecoreografia" required value="{{$coreografia->nomecoreografia}}" class="form-control" placeholder="Nome Coreografia...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Academia</label>
						<select name="id_academia" class="form-control">
							@foreach($academias as $aca)
								@if($aca->ID==$coreografia->id_academia)
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
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Classificação</label>
						<select name="classificacao" class="form-control">
							<option value="Competição">Competição</option>
							<option value="Mostra Avaliada">Mostra Avaliada</option>
							<option value="Ambas">Ambas</option>
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
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
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Categoria</label>
						<select name="categoria" class="form-control">
							<option value="Infantil">Infantil</option>
							<option value="Juvenil">Juvenil</option>
							<option value="Juvenil Avançado">Juvenil Avançado</option>
							<option value="Adulto">Adulto</option>
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="duracao">Duração</label>
						<input type="text" name="duracao" required value="{{$coreografia->duracao}}" class="form-control" placeholder="Duração...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Participação</label>
						<select name="participacao" class="form-control">
							<option value="SOLO">Solo</option>
							<option value="DUO">Duo</option>
							<option value="TRIO">Trio</option>
							<option value="GRUPO/CONJUNTO">Grupo/Conjunto</option>
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="musica">Música</label>
						<input type="text" name="musica" required value="{{$coreografia->musica}}" class="form-control" placeholder="Música...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="arquivo_musica">Arquivo Música</label>
						<input type="file" name="arquivo_musica"
							   class="form-control">
						@if(($coreografia->arquivo_musica)!="")
							<audio src="{{asset('musicas/'.$coreografia->arquivo_musica)}}"/>
						@endif
					</div>

				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="coreografo">Coreógrafo</label>
						<input type="text" name="coreografo" required value="{{$coreografia->coreografo}}" class="form-control" placeholder="Coreógrafo...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="link_youtube">Link Youtube</label>
						<input type="text" name="link_youtube"  value="{{$coreografia->link_youtube}}" class="form-control" placeholder="Link YouTube...">
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Confirmada</label>
						<select name="confirmada" class="form-control">
							<option value="NÃO">Não</option>
							<option value="SIM">Sim</option>
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="dataapresentacao">Data Apresentação(99/99/9999)</label>
						<input type="text" name="dataapresentacao" required value="{{Carbon\Carbon::parse($coreografia->dataapresentacao)->format('d/m/Y')}}"
							   onkeypress="mascaraData(this)" class="form-control" placeholder="Data Apresentação...">
					</div>
				</div>
			</div>


				<div class="form-group">
					<button class="btn btn-primary" type="submit">Salvar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
		</div>

			{!!Form::close()!!}

	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
		<div class="table-responsive">

			<table class="table table-striped table-bordered table-condensed table-hover">
				<h3>Elenco <a href="/festival/elenco/create"><button class="btn btn-success">Novo Participante</button></a></h3>
				<th>ID</th>
				<th>Participante</th>
				<th>Categoria</th>
				<th>Opções</th>
				</thead>
					@foreach ($coreografiaElenco as $corEle)
						@if($corEle->ID_COREOGRAFIA == $coreografia->id_inscricao)
						<tr>
							<td>{{ $corEle->ID}}</td>
							<td>{{ $corEle->elenco['NOME']}}</td>
							<td>{{ $corEle->elenco['DT_NASCIMENTO']}}</td>
							<td>
								<a href="{{URL::action('CoreografiaController@destroyCoreografiaElenco',$corEle->ID)}}" ><button class="btn btn-danger">Excluir</button></a>
							</td>
						</tr>
						@endif
					@include('festival.coreografia.modalCoreografiaElenco')
					@endforeach
			</table>
		</div>
	</div>
</div>
<script>
    function mascaraData(val) {
        var pass = val.value;
        var expr = /[0123456789]/;

        for (i = 0; i < pass.length; i++) {
            // charAt -> retorna o caractere posicionado no índice especificado
            var lchar = val.value.charAt(i);
            var nchar = val.value.charAt(i + 1);

            if (i == 0) {
                // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
                // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
                // instStr.search(expReg);
                if ((lchar.search(expr) != 0) || (lchar > 3)) {
                    val.value = "";
                }

            } else if (i == 1) {

                if (lchar.search(expr) != 0) {
                    // substring(indice1,indice2)
                    // indice1, indice2 -> será usado para delimitar a string
                    var tst1 = val.value.substring(0, (i));
                    val.value = tst1;
                    continue;
                }

                if ((nchar != '/') && (nchar != '')) {
                    var tst1 = val.value.substring(0, (i) + 1);

                    if (nchar.search(expr) != 0)
                        var tst2 = val.value.substring(i + 2, pass.length);
                    else
                        var tst2 = val.value.substring(i + 1, pass.length);

                    val.value = tst1 + '/' + tst2;
                }

            } else if (i == 4) {

                if (lchar.search(expr) != 0) {
                    var tst1 = val.value.substring(0, (i));
                    val.value = tst1;
                    continue;
                }

                if ((nchar != '/') && (nchar != '')) {
                    var tst1 = val.value.substring(0, (i) + 1);

                    if (nchar.search(expr) != 0)
                        var tst2 = val.value.substring(i + 2, pass.length);
                    else
                        var tst2 = val.value.substring(i + 1, pass.length);

                    val.value = tst1 + '/' + tst2;
                }
            }

            if (i >= 6) {
                if (lchar.search(expr) != 0) {
                    var tst1 = val.value.substring(0, (i));
                    val.value = tst1;
                }
            }
        }

        if (pass.length > 10)
            val.value = val.value.substring(0, 10);
        return true;
    }
</script>

@stop