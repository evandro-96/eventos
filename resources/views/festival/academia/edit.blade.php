@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<h3>Editar Academia: {{$academia->ACADEMIA }}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($academia, ['method'=>'PATCH', 'route'=>['academia.update', $academia->ID]])!!}
			{{Form::token()}}

            <div class="form-group">
            	<label for="ACADEMIA">Academia</label>
            	<input type="text" name="ACADEMIA" class="form-control"
            	value="{{ $academia->ACADEMIA }}"
            	placeholder="Academia...">
            </div>
            <div class="form-group">
            	<label for="NOMEDOGRUPO">Nome do grupo</label>
            	<input type="text" name="NOMEDOGRUPO" class="form-control"
            	value="{{ $academia->NOMEDOGRUPO }}"
            	 placeholder="Nome do grupo...">
            </div>
			<div class="form-group">
				<label for="ENDERECO">Endereço</label>
				<input type="text" name="ENDERECO" class="form-control"
					   value="{{ $academia->ENDERECO }}"
					   placeholder="Endereço...">
			</div>
			<div class="form-group">
				<label for="NUMERO">Número</label>
				<input type="text" name="NUMERO" class="form-control"
					   value="{{ $academia->NUMERO }}"
					   placeholder="Número...">
			</div>
			<div class="form-group">
				<label for="BAIRRO">Bairro</label>
				<input type="text" name="BAIRRO" class="form-control"
					   value="{{ $academia->BAIRRO }}"
					   placeholder="Bairro...">
			</div>
			<div class="form-group">
				<label for="CEP">Cep</label>
				<input type="text" name="CEP" class="form-control"
					   value="{{ $academia->CEP }}"
					   placeholder="Cep...">
			</div>
			<div class="form-group">
				<label for="PAIS">País</label>
				<input type="text" name="PAIS" class="form-control"
					   value="{{ $academia->PAIS }}"
					   placeholder="Pais...">
			</div>
			<div class="form-group">
				<label for="CIDADE">Cidade</label>
				<input type="text" name="CIDADE" class="form-control"
					   value="{{$academia->CIDADE}}"
					   placeholder="Cidade...">
			</div>
			<div class="form-group">
				<label>Estado</label>
				<select name="UF" class="form-control" required>
					<option value="">Selecione o Estado</option>
					@if($academia->UF == "AC")
						<option value="AC" selected>Acre</option>
					@else
						<option value="AC">Acre</option>
					@endif
					@if($academia->UF == "AL")
						<option value="AL" selected>Alagoas</option>
					@else
						<option value="AL">Alagoas</option>
					@endif
					@if($academia->UF == "AM")
						<option value="AM" selected>Amazonas</option>
					@else
						<option value="AM">Amazonas</option>
					@endif
					@if($academia->UF == "AP")
						<option value="AP" selected>Amapá</option>
					@else
						<option value="AP">Amapá</option>
					@endif
					@if($academia->UF == "BA")
						<option value="BA" selected>Bahia</option>
					@else
						<option value="BA">Bahia</option>
					@endif
					@if($academia->UF == "CE")
						<option value="CE" selected>Ceará</option>
					@else
						<option value="CE">Ceará</option>
					@endif
					@if($academia->UF == "DF")
						<option value="DF" selected>Distrito Federal</option>
					@else
						<option value="DF">Distrito Federal</option>
					@endif
					@if($academia->UF == "ES")
						<option value="ES" selected>Espirito Santo</option>
					@else
						<option value="ES">Espirito Santo</option>
					@endif
					@if($academia->UF == "GO")
						<option value="GO" selected>Goiás</option>
					@else
						<option value="GO">Goiás</option>
					@endif
					@if($academia->UF == "MA")
						<option value="MA" selected>Maranhão</option>
					@else
						<option value="MA">Maranhão</option>
					@endif
					@if($academia->UF == "MT")
						<option value="MT" selected>Mato Grosso</option>
					@else
						<option value="MT">Mato Grosso</option>
					@endif
					@if($academia->UF == "MS")
						<option value="MS" selected>Mato Grosso do Sul</option>
					@else
						<option value="MS">Mato Grosso do Sul</option>
					@endif
					@if($academia->UF == "MG")
						<option value="MG" selected>Minas Gerais</option>
					@else
						<option value="MG">Minas Gerais</option>
					@endif
					@if($academia->UF == "PA")
						<option value="PA" selected>Pará</option>
					@else
						<option value="PA">Pará</option>
					@endif
					@if($academia->UF == "PB")
						<option value="PB" selected>Paraíba</option>
					@else
						<option value="PB">Paraíba</option>
					@endif
					@if($academia->UF == "PR")
						<option value="PR" selected>Paraná</option>
					@else
						<option value="PR">Paraná</option>
					@endif
					@if($academia->UF == "PE")
						<option value="PE" selected>Pernambuco</option>
					@else
						<option value="PE">Pernambuco</option>
					@endif
					@if($academia->UF == "PI")
						<option value="PI" selected>Piauí</option>
					@else
						<option value="PI">Piauí</option>
					@endif
					@if($academia->UF == "RJ")
						<option value="RJ" selected>Rio de Janeiro</option>
					@else
						<option value="RJ">Rio de Janeiro</option>
					@endif
					@if($academia->UF == "RN")
						<option value="RN" selected>Rio Grande do Norte</option>
					@else
						<option value="RN">Rio Grande do Norte</option>
					@endif
					@if($academia->UF == "RO")
						<option value="RO" selected>Rondônia</option>
					@else
						<option value="RO">Rondônia</option>
					@endif
					@if($academia->UF == "RS")
						<option value="RS" selected>Rio Grande do Sul</option>
					@else
						<option value="RS">Rio Grande do Sul</option>
					@endif
					@if($academia->UF == "RR")
						<option value="RR" selected>Roraima</option>
					@else
						<option value="RR">Roraima</option>
					@endif
					@if($academia->UF == "SC")
						<option value="SC" selected>Santa Catarina</option>
					@else
						<option value="SC">Santa Catarina</option>
					@endif
					@if($academia->UF == "SE")
						<option value="SE" selected>Sergipe</option>
					@else
						<option value="SE">Sergipe</option>
					@endif
					@if($academia->UF == "SP")
						<option value="SP" selected>São Paulo</option>
					@else
						<option value="SP">São Paulo</option>
					@endif
					@if($academia->UF == "TO")
						<option value="TO" selected>Tocantins</option>
					@else
						<option value="TO">Tocantins</option>
					@endif
				</select>
			</div>
			<div class="form-group">
				<label for="EMAIL">Email</label>
				<input type="text" name="EMAIL" class="form-control"
					   value="{{ $academia->EMAIL }}"
					   placeholder="Email...">
			</div>
			<div class="form-group">
				<label for="TELEFONE">Telefone</label>
				<input type="text" name="TELEFONE" class="form-control"
					   value="{{ $academia->TELEFONE }}"
					   placeholder="Teledone...">
			</div>
			<div class="form-group">
				<label for="EMAIL">Email</label>
				<input type="text" name="EMAIL" class="form-control"
					   value="{{ $academia->EMAIL }}"
					   placeholder="Email...">
			</div>
			<div class="form-group">
				<label for="DIRETOR">Diretor</label>
				<input type="text" name="DIRETOR" class="form-control"
					   value="{{ $academia->DIRETOR }}"
					   placeholder="Diretor...">
			</div>
			<div class="form-group">
				<label for="CELULAR">Celular</label>
				<input type="text" name="CELULAR" class="form-control"
					   value="{{ $academia->CELULAR }}"
					   placeholder="Celular...">
			</div>
			<div class="form-group">
				<label for="COMPROVANTE">Comprovante</label>
				<input type="file" name="COMPROVANTE"
					   class="form-control">
				@if(($academia->imagem)!="")
					<img src="{{asset('imagens/elencos/'.$academia->COMPROVANTE)}}" width="200px">
				@endif
			</div>
			<div class="form-group">
				<label for="PAGO">Pago</label>
				<select name="PAGO" class="form-control" required>
					@if($academia->PAGO == "s")
						<option value="s" selected>Sim</option>
						<option value="n">Não</option>
					@else
						<option value="s" >Sim</option>
						<option value="n" selected>Não</option>
					@endif
				</select>
			</div>
			<div class="form-group">
				<label for="CPF">Cpf</label>
				<input type="text" name="CPF" class="form-control"
					   value="{{ $academia->CPF }}"
					   placeholder="Cpf...">
			</div>
			<div class="form-group">
				<label for="COMPROVANTECPF">Comprovante Cpf</label>
				<input type="text" name="COMPROVANTECPF" class="form-control"
					   value="{{ $academia->COMPROVANTECPF }}"
					   placeholder="Comprovante Cpf...">
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}

		</div>
	</div>
@stop