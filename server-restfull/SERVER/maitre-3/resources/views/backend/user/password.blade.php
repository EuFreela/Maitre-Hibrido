@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection



@section('content')

	<div class="row">
		<div class="span9">
			<div class="content">

				<div class="module">
					<div class="module-head">
						<h3>Edição de Credenciais do Usuário no Sistema</h3>
					</div>

					<div class="module-body">

							
							<form class="form-horizontal row-fluid" method="POST" action="{{ route('ds-user-password-edit-post') }}">
							{{csrf_field()}}
									
								<div class="control-group">
								<div class="controls">
									<label class="" for="basicinput">Você esta editando as credenciais do Usuário <span class="label label-danger">{{$user->name}}.</span></label>
									</div>
								</div>		
								<br>					
								<input type="hidden" value="{{$user->id}}" name="id">
								
								<div class="control-group">
									<label class="control-label" for="basicinput">Senha</label>
									<div class="controls">
										<input type="password"  class="span8" name="password" placeholder="Senha">
										@if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                	@endif
									</div>
									
								</div>


								<div class="control-group">
									<label class="control-label" for="basicinput">Confirme a Senha</label>
									<div class="controls">
										<input type="password"  class="span8" name="password_confirmation" placeholder="Confirme a senha">
										@if ($errors->has('password_confirmation'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                    </span>
	                                	@endif
									</div>
									
								</div>

								<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-primary">Salvar</button>
									<a class="btn btn-warning" href="{{route('ds-home')}}">Cancelar</a>
								</div>
								</div>
							
							</form>
					</div>
				</div>

				
				
			</div><!--/.content-->
		</div><!--/.span9-->
	</div>
@stop