@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Cadastro de Produtos</h3>
			</div>

			<div class="module-body">
			
				<form enctype="multipart/form-data" class="form-horizontal row-fluid" method="POST" action="{{ route('ds-prod-create-post') }}">
				{{csrf_field()}}

					<div class="control-group">
					<label class="control-label" for="basicinput">Imagem do Produto</label>						
					<div class="controls">
					<input type="file" name="img" onclick="uploadImageTumblr(this);" accept="image/*" class="btn btn-default"/><br><br>			
						<img id="image1" width="200" height="200" />
						<img id="image2" width="125" height="125" />
						<img id="image3" width="75" height="75" />						
					@if ($errors->has('img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('img') }}</strong>
                    </span>
               	 	@endif
               	 	</div>
					</div>
					<br><br>

					<div class="control-group">
						<label class="control-label" for="basicinput">Categoria</label>
						<div class="controls">
							<div class="dropdown">												
								<select class="span8" name="product_category" required>
								  <option  disabled selected>Selecione uma Categoria</option>
								  @if($cate_list)
								  @foreach( $cate_list as $cate )
							  		<option>{{ $cate->nameCategory }}</option>
								  @endforeach
								  @endif
								</select>
								@if ($errors->has('product_category'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('product_category') }}</strong>
		                        </span>
		                   	 	@endif
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="basicinput">Código do Produto</label>
						<div class="controls">
							<input type="text" placeholder="Código" class="span8" name="product_code" value="{{ old('product_code') }}" maxlength="5" required>
							<span class="help-inline">Máximo 5 digitos</span>
							@if ($errors->has('product_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_code') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Nº de estoque</label>
						<div class="controls">
							<input type="text" placeholder="Estoque" class="span8" name="product_stock" value="{{ old('product_stock') }}" required maxlength="6">							
							<span class="help-inline">Máximo 6 digitos</span>
							@if ($errors->has('product_stock'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_stock') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Nome do Produto</label>
						<div class="controls">
							<input type="text" id="basicinput" placeholder="Nome completo" class="span8" name="product_name" value="{{ old('product_name') }}" required>
							<span class="help-inline">Mínimo 5 caracteres</span>
							@if ($errors->has('product_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_name') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					
					<div class="control-group">
						<label class="control-label" for="basicinput">Descrição do Produto</label>
						<div class="controls">
							<textarea class="span8" rows="5" name="product_descryption">{{ old('product_descryption') }}</textarea>						
						@if ($errors->has('product_descryption'))
                        <span class="help-block">
                            <strong>{{ $errors->first('product_descryption') }}</strong>
                        </span>
                   	 	@endif
                   	 	</div>
					</div>

					

					
					<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">Criar Produto</button>
						<a class="btn btn-warning" href="{{route('ds-prod-list')}}">Cancelar</a>
					</div>
					</div>

				</form>



			</div>

		</div>
		</div>
	</div>
	</div>

@stop
