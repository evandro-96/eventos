@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Academia</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'festival/academia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="ACADEMIA">Academia</label>
            	<input type="text" name="ACADEMIA" class="form-control" placeholder="Academia...">
            </div>
            <div class="form-group">
            	<label for="NOMEDOGRUPO">Nome do grupo</label>
            	<input type="text" name="NOMEDOGRUPO" class="form-control" placeholder="Nome do grupo...">
            </div>
			<div class="form-group">
				<label for="ENDERECO">Endereco</label>
				<input type="text" name="ENDERECO" class="form-control" placeholder="Endereço...">
			</div>
			<div class="form-group">
				<label for="NUMERO">Numero</label>
				<input type="text" name="NUMERO" class="form-control" placeholder="Numero...">
			</div>
			<div class="form-group">
				<label for="BAIRRO">Bairro</label>
				<input type="text" name="BAIRRO" class="form-control" placeholder="Bairro...">
			</div>
			<div class="form-group">
				<label for="CEP">CEP</label>
				<input type="text" name="CEP" class="form-control" placeholder="Cep...">
			</div>
			<div class="form-group">
				<label for="PAIS">País</label>
				<input type="text" name="PAIS" class="form-control" placeholder="País...">
			</div>
			<div class="form-group">
				<label for="CIDADE">Cidade</label>
				<input type="text" name="CIDADE" class="form-control" placeholder="Cidade...">
			</div>
			<div class="form-group">
				<label for="UF">UF</label>
				<input type="text" name="UF" class="form-control" placeholder="UF...">
			</div>
			<div class="form-group">
				<label for="EMAIL">Email</label>
				<input type="text" name="EMAIL" class="form-control" placeholder="Email...">
			</div>
			<div class="form-group">
				<label for="TELEFONE">Telefone</label>
				<input type="text" name="TELEFONE" class="form-control" placeholder="Telefone...">
			</div>
			<div class="form-group">
				<label for="DIRETOR">Diretor</label>
				<input type="text" name="DIRETOR" class="form-control" placeholder="Diretor...">
			</div>
			<div class="form-group">
				<label for="CELULAR">Celular</label>
				<input type="text" name="CELULAR" class="form-control" placeholder="Celular...">
			</div>
			<div class="form-group">
				<label for="USER">Usuario</label>
				<input type="text" name="USER" class="form-control" placeholder="Usuario...">
			</div>
			<div class="form-group">
				<label for="PASS">Senha</label>
				<input type="text" name="PASS" class="form-control" placeholder="Senha...">
			</div>
			<div class="form-group">
				<label for="COMPROVANTE">Comprovante</label>
				<input type="text" name="COMPROVANTE" class="form-control" placeholder="Comprovante...">
			</div>
			<div class="form-group">
				<label for="PAGO">Pago(s/n)</label>
				<input type="text" name="PAGO" class="form-control" placeholder="Pago...">
			</div>
			<div class="form-group">
				<label for="CPF">CPF</label>
				<input type="text" name="CPF" class="form-control" placeholder="CPF...">
			</div>
			<div class="form-group">
				<label for="COMPROVANTECPF">Comprovante CPF</label>
				<input type="text" name="COMPROVANTECPF" class="form-control" placeholder="Comprovante CPF...">
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop