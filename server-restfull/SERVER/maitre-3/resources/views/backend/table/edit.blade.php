@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	
	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Cadastro de Mesas</h3>
			</div>

			<div class="module-body">
			
				<form enctype="multipart/form-data" class="form-horizontal row-fluid" method="POST" action="{{route('ds-table-edit-post')}}">
				{{csrf_field()}}

					<div class="control-group">
					<label class="control-label" for="basicinput">Imagem da Categoria</label>
					<div class="controls">
					<p><input type="file" name="qrcode" onclick="uploadImageTumblr(this);" accept="image/*" class="btn btn-default" /></p>						
						@if ($errors->has('qrcode'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('qrcode') }}</strong>
	                    </span>
	               	 	@endif	               	 	
               	 	</div>					
					</div>					
					<div class="control-group">					
					<label class="control-label" for="basicinput">Imagem atual</label>						
					<div class="controls">
						<img id="image1" width="200" height="200" src='{{asset($path.$table_list->img.".jpg")}}'/>
						<img id="image2" width="125" height="125" src='{{asset($path.$table_list->img.".jpg")}}'/>
						<img id="image3" width="75" height="75" src='{{asset($path.$table_list->img.".jpg")}}'/>
               	 	</div>				
					</div>
					<br><br>


					<input type="hidden" value="{{$table_list->idTable}}" name="table_id">

					
					
					<div class="control-group">
						<label class="control-label" for="basicinput">Código da Mesa</label>
						<div class="controls">
							<input type="text" placeholder="Código" class="span8" name="table_code" value="{{$table_list->codeTable}}" maxlength="5" required>
							<span class="help-inline">Máximo 5 digitos</span>
							@if ($errors->has('table_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('table_code') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					

					<div class="control-group">
						<label class="control-label" for="basicinput">Token</label>
						<div class="controls">
							<input type="text" id="basicinput" class="span8" name="table_token" value="{{$table_list->token}}" required>
							<span class="help-inline">Mínimo 5 caracteres</span>
							@if ($errors->has('table_token'))
                            <span class="help-block">
                                <strong>{{ $errors->first('table_token') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					
					<div class="control-group">
						<label class="control-label" for="basicinput">Descrição</label>
						<div class="controls">
							<textarea class="span8" rows="5" name="table_description">{{$table_list->description}}</textarea>						
						@if ($errors->has('table_description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('table_description') }}</strong>
                        </span>
                   	 	@endif
                   	 	</div>
					</div>

					

					
					<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">Atualizar Mesa</button>
						<a class="btn btn-warning" href="{{route('ds-table-list')}}">Cancelar</a>
					</div>
					</div>

				</form>



			</div>

		</div>
		</div>
	</div>
	</div>





@stop