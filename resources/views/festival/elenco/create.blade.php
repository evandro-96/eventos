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
	            	<input type="text" name="NOME" required value="{{old('NOME')}}" class="form-control" placeholder="Nome...">
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
	            	<label for="DT_NASCIMENTO">Data de Nascimento</label>
	            	<input type="text" name="DT_NASCIMENTO" required value="{{old('DT_NASCIMENTO')}}" class="form-control" placeholder="Data de nascimento...">
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
						<input type="file" name="RG_ANEXO"
						class="form-control">
            		</div>
            	</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="CPF_ANEXO">Cpf Anexo</label>
						<input type="file" name="CPF_ANEXO"
							   class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="FOTO_ANEXO">Foto Anexo</label>
						<input type="file" name="FOTO_ANEXO"
							   class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Coreografia</label>
						<select name="ID_ACADEMIA" class="form-control">
							@foreach($coreografia as $cor)
								@if($cor->id_inscricao)
									<option value="{{$cor->id_inscricao}}" selected>
										{{$cor->nomecoreografia}}
									</option>
								@else
									<option value="{{$cor->id_inscricao}}">
										{{$cor->nomecoreografia}}
									</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

            </div>
           
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		
@stop