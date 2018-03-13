@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Cadastro de Categorias</h3>
			</div>

			
			<div class="module-body">
			
				<form enctype="multipart/form-data" class="form-horizontal row-fluid" method="POST" action="{{ route('ds-cate-create-post') }}">
				{{csrf_field()}}

					<div class="control-group">
					<label class="control-label" for="basicinput">Imagem da Categoria</label>						
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
					<br>

										
					<div class="control-group">
						<label class="control-label" for="basicinput">Código da Categoria</label>
						<div class="controls">
							<input type="text" placeholder="Código" class="span8" name="category_code" value="{{ old('category_code') }}" maxlength="5" required>
							<span class="help-inline">Máximo 5 digitos</span>
							@if ($errors->has('category_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_code') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					
					<div class="control-group">
						<label class="control-label" for="basicinput">Nome da Categoria</label>
						<div class="controls">
							<input type="text" id="basicinput" placeholder="Nome completo" class="span8" name="category_name" value="{{ old('category_name') }}" required>
							<span class="help-inline">Mínimo 5 caracteres</span>
							@if ($errors->has('category_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_name') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					
					<div class="control-group">
						<label class="control-label" for="basicinput">Descrição</label>
						<div class="controls">
							<textarea class="span8" rows="5" name="category_description">{{ old('category_description') }}</textarea>						
						@if ($errors->has('category_description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category_description') }}</strong>
                        </span>
                   	 	@endif
                   	 	</div>
					</div>

					

					
					<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">Criar Categoria</button>
						<a class="btn btn-warning" href="{{route('ds-cate-list')}}">Cancelar</a>
					</div>
					</div>

				</form>



			</div>

		</div>
		</div>
	</div>
	</div>

@stop
