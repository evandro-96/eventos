@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Participante</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

		</div>
</div>

			{!!Form::open(array('url'=>'festival/elenco','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

            <div class="row">
            	
            	<div class="col-lg-6 col-sm-6 col-xs-12">
	            	<div class="form-group">
	            	<label for="NOME">Nome</label>
	            	<input type="text" name="NOME"onblur="" required value="{{old('NOME')}}" class="form-control" placeholder="Nome...">
	            	</div>
            	</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Academia</label>
						<select name="ID_ACADEMIA" class="form-control">
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
				</div>



            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="DT_NASCIMENTO">Data de Nascimento(99/99/9999)</label>
	            	<input type="text" name="DT_NASCIMENTO" id="DT_NASCIMENTO" required value="{{old('DT_NASCIMENTO')}}" class="form-control" onkeypress="mascaraData(this)" placeholder="Data de nascimento...">
	            	</div>
            	</div>
            		
            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="RG">Rg</label>
	            	<input type="text" name="RG" required value="{{old('RG')}}" class="form-control" placeholder="Rg...">
	            	</div>
            	</div>

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
						<label for="RG_ANEXO">Rg Anexo</label>
						<input type="file" name="RG_ANEXO" required="required"
						class="form-control">
            		</div>
            	</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="CPF_ANEXO">Cpf Anexo</label>
						<input type="file" name="CPF_ANEXO" required="required"
							   class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="FOTO_ANEXO">Foto Anexo</label>
						<input type="file" name="FOTO_ANEXO" required="required"
							   class="form-control">
					</div>
				</div>

				<div class="form-group ">
					{!! Form::label('id_inscricao', 'Coreografia', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
					<div class="col-md-6 col-sm-6 col-xs-12">
						{!! Form::select('id_inscricao', \sistemaLaravel\Coreografia::pluck('nomecoreografia', 'id_inscricao'), null, ['class'=>'form-control']) !!}
					</div>
				</div>

            </div>
           
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
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
			{!!Form::close()!!}

@stop
