@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<img src="{{asset('imagens/elencos/'.$elenco->FOTO_ANEXO) }}"width="100px" height="100px">
			<h3>Editar Participante: {{ $elenco->NOME }}</h3>
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

			{!!Form::model($elenco, ['method'=>'PATCH', 'route'=>['elenco.update', $elenco->ID], 'files'=>'true'])!!}
			{{Form::token()}}

           <div class="row">
            	
            	<div class="col-lg-6 col-sm-6 col-xs-12">
	            	<div class="form-group">
	            	<label for="NOME">Nome</label>
	            	<input type="text" name="NOME" required value="{{$elenco->NOME}}" class="form-control" placeholder="Nome...">
	            	</div>
            	</div>

            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            		<label>Academia</label>
            		<select name="ID_ACADEMIA" class="form-control">
	            		@foreach($academias as $aca)
	            			@if($aca->ID==$elenco->ID_ACADEMIA)
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
	            	<label for="DT_NASCIMENTO">Data de nascimento</label>
	            	<input type="text" name="DT_NASCIMENTO" required value="{{Carbon\Carbon::parse($elenco->DT_NASCIMENTO)->format('d/m/Y')}}" class="form-control" placeholder="Data de nascimento...">
	            	</div>
            	</div>
            		
            	<div class="col-lg-6 col-sm-6 col-xs-12">
            		<div class="form-group">
	            	<label for="RG">Rg</label>
	            	<input type="text" name="RG" required value="{{$elenco->RG}}" class="form-control" placeholder="Rg...">
	            	</div>	
            		
            	</div>

			   <div class="col-lg-6 col-sm-6 col-xs-12">
				   <div class="form-group">
					   <label for="CPF_ANEXO">Cpf Anexo</label>
					   <input type="file" name="CPF_ANEXO"
							  class="form-control">
					   @if(($elenco->imagem)!="")
						   <img src="{{asset('imagens/elencos/'.$elenco->CPF_ANEXO)}}" width="200px">
					   @endif
				   </div>

			   </div>

			   <div class="col-lg-6 col-sm-6 col-xs-12">
				   <div class="form-group">
					   <label for="RG_ANEXO">Rg Anexo</label>
					   <input type="file" name="RG_ANEXO"
							  class="form-control">
					   @if(($elenco->imagem)!="")
						   <img src="{{asset('imagens/elencos/'.$elenco->RG_ANEXO)}}" width="200px">
					   @endif
				   </div>

			   </div>

            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
	
@stop