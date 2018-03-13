@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection



@section('content')

	
	<div class="row">
		<div class="span9">
			<div class="content">

				<div class="module">
					<div class="module-head">
						<h3>Edição de Dados do Usuário do Sistema</h3>
					</div>
					<div class="module-body">
@foreach ($errors->all() as $error)
            <div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $error }}
			</div>                
            @endforeach
							
							<form class="form-horizontal row-fluid" method="POST" action="{{ route('ds-user-edit-post') }}">
							{{csrf_field()}}
								
								<input type="hidden" value="{{$user->id}}" name="id">

								
								<div class="control-group">
								<label class="control-label" for="basicinput">Status</label>
								<div class="controls">
									<div class="dropdown">												
										<select class="span8" name="user_status" required>
										<option value="" disabled selected>Selecione um Status</option>
										  @if($user_status)
										  	@foreach($user_status as $ust)
										  		@if($user->status_idstatus == $ust->idStatus)
										  		<option selected>{{$ust->nameStatus}}</option>
										  		@else
										  		<option>{{$ust->nameStatus}}</option>
										  		@endif
										  	@endforeach
										  @endif
										</select>
										@if ($errors->has('user_status'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('user_status') }}</strong>
				                        </span>
				                   	 	@endif
									</div>
								</div>
								</div>

								<div class="control-group">
								<label class="control-label" for="basicinput">Nivel</label>
								<div class="controls">
									<div class="dropdown">												
										<select class="span8" name="user_nivel" required>
										<option value="" disabled selected>Selecione um Nível</option>
										  @if($user_nivel)
										  	@foreach($user_nivel as $unl)										  	
										  		@if( $user->nivel_idnivel == $unl->idNivel)
										  		<option selected>{{$unl->nameNivel}}</option>
										  		@else
												<option>{{$unl->nameNivel}}</option>
										  		@endif
										  	@endforeach
										  @endif
										</select>
										@if ($errors->has('user_nivel'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('user_nivel') }}</strong>
				                        </span>
				                   	 	@endif
									</div>
								</div>
								</div>


								<div class="control-group">
								<label class="control-label" for="basicinput">Departamento</label>
								<div class="controls">
									<div class="dropdown">												
										<select class="span8" name="user_department" required>
										<option value="" disabled selected>Selecione um Departamento</option>
										  @if($user_department)
										    @foreach($user_department as $udp)
											  	@if( $user->department_iddepartment == $udp->idDepartment)
											  		<option selected>{{$udp->nameDepartment}}</option>
											  	@else
											  		<option>{{$udp->nameDepartment}}</option>
											  	@endif
										  	@endforeach
										  @endif
										</select>
										@if ($errors->has('user_department'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('user_department') }}</strong>
				                        </span>
				                   	 	@endif
									</div>
								</div>
								</div>



								<div class="control-group">
									<label class="control-label" for="basicinput">Nome</label>
									<div class="controls">
										<input type="text" id="basicinput" placeholder="Nome completo" class="span8" name="user_name" value="{{ $user->name }}">
										<span class="help-inline">Mínimo 5 caracteres</span>
										@if ($errors->has('user_name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('user_name') }}</strong>
	                                    </span>
	                               	 	@endif
									</div>
									
								</div>

								<div class="control-group">
									<label class="control-label" for="basicinput">E-mail</label>
									<div class="controls">
										<input type="text" id="basicinput" placeholder="E-mail" class="span8" name="user_email" value="{{ $user->email }}">
										@if ($errors->has('user_email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('user_email') }}</strong>
	                                    </span>
	                               	 	@endif
									</div>
									
								</div>

								
									
								<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-primary">Salvar Usuário</button>
									<a class="btn btn-warning" href="{{route('ds-user-list')}}">Cancelar</a>
								</div>
								</div>
							
							</form>
					</div>
				</div>

				
				
			</div><!--/.content-->
		</div><!--/.span9-->
	</div>

@stop
