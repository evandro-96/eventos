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
					   value="{{ $academia->CIDADE }}"
					   placeholder="Cidade...">
			</div>
			<div class="form-group">
				<label for="UF">Estado</label>
				<input type="text" name="ESTADO" class="form-control"
					   value="{{ $academia->ESTADO }}"
					   placeholder="Estado...">
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
				<input type="text" name="COMPROVANTE" class="form-control"
					   value="{{ $academia->COMPROVANTE }}"
					   placeholder="Comprovante...">
			</div>
			<div class="form-group">
				<label for="PAGO">Pago</label>
				<input type="text" name="PAGO" class="form-control"
					   value="{{ $academia->PAGO }}"
					   placeholder="Pago...">
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