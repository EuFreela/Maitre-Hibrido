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
			
				<form enctype="multipart/form-data" class="form-horizontal row-fluid" method="POST" action="{{route('ds-table-reserve-post')}}">
				{{csrf_field()}}							
					
					<input type="hidden" name="table_token" value="{{$table->token}}">
					<div class="control-group">
						<label class="control-label" for="basicinput">IP do cliente</label>
						<div class="controls">
							<input type="text" placeholder="Defina um IP" class="span8" name="table_ip" id="table_ip" maxlength="15">
							<span class="help-inline">Máximo 15 digitos</span>
							@if ($errors->has('table_ip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('table_ip') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>					

					<div class="control-group">
						<label class="control-label" for="basicinput">Token</label>
						<div class="controls">
							<label class="label label-warning">{{$table->token}}</label>
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Status Atual</label>
						<div class="controls">
						@if($table->codeStatus == 6)
							<label class="label label-danger">{{$table->statusname}}</label>
						@else
							<label class="label label-info">{{$table->statusname}}</label>
						@endif
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Ação</label>
						<div class="controls">
						@if($table->codeStatus == 6)
							<input type="radio" name="table" value="7"> Liberado&nbsp;
  							<input type="radio" name="table" value="6" checked> Ocupado
  						@else
							<input type="radio" name="table" value="7" checked> Liberado&nbsp;
  							<input type="radio" name="table" value="6" > Ocupado
  						@endif
						</div>									
					</div>
					
					<div class="control-group">
						<label class="control-label" for="basicinput">Descrição</label>
						<div class="controls">
							<textarea class="span8" rows="5" name="table_description">{{ $table->description }}</textarea>	
						@if ($errors->has('table_description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('table_description') }}</strong>
                        </span>
                   	 	@endif
                   	 	</div>
					</div>
					
					<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">Confirmar Reserva</button>
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