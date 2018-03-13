@extends('templates.login')

@section('title') Login @endsection
@section('caption') Maitre @endsection



@section('content')

	<div class="row">
		<div class="module module-login span4 offset4">
			<form class="form-vertical" method="POST" action="{{ route('account-sign-in') }}">
			 {!! csrf_field() !!}
				<div class="module-head">
					<h3>Login </h3>
				</div>
				<div class="module-body">
					<div class="control-group">
						<div class="controls row-fluid">
							<input class="span12" type="text" id="inputEmail" placeholder="E-mail" name="email" value="{{ old('email') }}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls row-fluid">
							<input class="span12" type="password" id="inputPassword" name="password" placeholder="Senha">
						</div>
					</div>
				</div>
				<div class="module-foot">
					<div class="control-group">
						<div class="controls clearfix">
							<button type="submit" class="btn btn-primary pull-right">Login</button>
							<!--<label class="checkbox">
								<input type="checkbox"> Remember me
							</label>-->
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop
