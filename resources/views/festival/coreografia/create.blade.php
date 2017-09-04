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
				<input type="text" name="nomecoreografia" class="form-control" placeholder="Nome Coreografia..." required>
			</div>

			<div class="form-group">
				<label>Academia</label>
				<select name="id_academia" class="form-control">
					<option value="" selected></option>
					@foreach($academias as $aca)
						@if($aca->ID)
							<option value="{{$aca->ID}}">
								{{$aca->ACADEMIA}}
							</option>
						{{--@else--}}
							{{--<option value="{{$aca->ID}}">--}}
								{{--{{$aca->ACADEMIA}}--}}
							{{--</option>--}}
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Modalidade</label>
				<select name="classificacao" class="form-control" required>
					<option value="">Selecione a modalidade</option>
					<option value="Competição">Competição</option>
					<option value="Mostra Avaliada">Mostra Avaliada</option>
					<option value="Ambas">Ambas</option>
				</select>
			</div>
			<div class="form-group">
				<label>Gênero</label>
				<select name="modalidade" class="form-control" required>
					<option value="">Selecione o genero</option>
					<option value="Ballet Clássico/Neoclássico">Ballet Clássico/Neoclássico</option>
					<option value="Dança Moderna/Contemporânea">Dança Moderna/Contemporânea</option>
					<option value="Ballet Clássico de Repertório">Ballet Clássico de Repertório</option>
					<option value="Dança Livre">Dança Livre</option>
					<option value="Jazz">Jazz</option>
					<option value="Folclore de Projeção">Folclore de Projeção</option>
					<option value="Folclore de Imigração">Folclore de Imigração</option>
					<option value="Danças Urbanas">Danças Urbanas</option>
					<option value="Danças de Salão">Danças de Salão</option>
				</select>
			</div>
			<div class="form-group">
				<label>Categoria</label>
				<select name="categoria" class="form-control" required>
					<option value="">Selecione a categoria</option>
					<option value="Infantil">Infantil</option>
					<option value="Juvenil">Juvenil</option>
					<option value="Juvenil Avançado">Juvenil Avançado</option>
					<option value="Adulto">Adulto</option>
				</select>
			</div>
			<div class="form-group">
				<label for="duracao">Duração</label>
				<input type="text" name="duracao" class="form-control" placeholder="Duração..." required>
			</div>
			<div class="form-group">
				<label>Participação</label>
				<select name="participacao" class="form-control" required>
					<option value="">Selecione a participação</option>
					<option value="SOLO">Solo</option>
					<option value="DUO">Duo</option>
					<option value="TRIO">Trio</option>
					<option value="CONJUNTO">Conjunto</option>
				</select>
			</div>
			<div class="form-group">
				<label for="musica">Música</label>
				<input type="text" name="musica" class="form-control" placeholder="Música..." required>
			</div>

			<div class="form-group">
				<label for="arquivo_musica">Arquivo Música</label>
				<input type="file" name="arquivo_musica"
					   class="form-control">
			</div>

			<div class="form-group">
				<label for="coreografo">Coreógrafo</label>
				<input type="text" name="coreografo" class="form-control" placeholder="Coreógrafo..." required>
			</div>
			<div class="form-group">
				<label for="link_youtube">Link YouTube</label>
				<input type="text" name="link_youtube" class="form-control" placeholder="Link YouTube...">
			</div>
			<div class="form-group">
				<label>Confirmada</label>
				<select name="confirmada" class="form-control" required>
					<option value="NÃO">NÃO</option>
					<option value="SIM">SIM</option>
				</select>
			</div>
			<div class="form-group">
				<label for="horaapresentacao">Hora Apresentação</label>
				<input type="text" name="horaapresentacao" class="form-control" placeholder="Hora Apresentação..." required>
			</div>
			<div class="form-group">
				<label for="dataapresentacao">Data Apresentação(99/99/9999)</label>
				<input type="text" name="dataapresentacao" class="form-control" onkeypress="mascaraData(this)" placeholder="Data Apresentação..." required>
			</div>
			<div class="form-group">
				<label for="resumo">Release</label>
				<textarea name="resumo" id="" cols="30" rows="10" class="form-control"></textarea>
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}

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
            
		</div>
	</div>
@stop