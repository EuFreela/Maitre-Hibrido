<!DOCTYPE html>
<html lang="pt-br">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link type="text/css" href="{{ asset('templates/edmin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('templates/edmin/bootstrap/css/bootstrap-responsive.min.css' )}}" rel="stylesheet">
        <link type="text/css" href="{{ asset('templates/edmin/css/theme.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('templates/edmin/images/icons/css/font-awesome.css') }} " rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
    </head>
<body>

	
	<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">@yield('caption') </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">    
						@if(Auth::check())
                        <ul class="nav pull-right">
                            <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>-->
                            <li><a href="#">Suporte </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('templates/edmin/images/user.png')}}" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">&nbsp;&nbsp;Nível: {{Auth::user()->nivel_idnivel}}</li>
                                    <li><a href="{{route('ds-home')}}">Home</a></li>
                                    <li><a href="#">Configuração da Conta</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
		
	<!--div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">@yield('caption')</a>

				<!--<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="#">
							Sign Up
						</a></li>

						

						<li><a href="#">
							Forgot your password?
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			<!--</div>
		</div><!-- /navbar-inner -->
	<!--</div><!-- /navbar -->
	

	<div class="wrapper">
		<div class="container">
			@yield('content')

			@foreach ($errors->all() as $error)
            <div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $error }}
			</div>                
            @endforeach
            @if( Session::has('flash_msg') )
            <div class="alert">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ Session::get('flash_msg') }}
			</div>
            @endif
		</div>
	</div><!--/.wrapper-->

	
	
	<div class="footer">
		<div class="container">
			<b class="copyright">&copy; 2017-2018 @yield('caption'). </b> Trabalho de conclusão de curso de Carlos Eduardo Borges.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>