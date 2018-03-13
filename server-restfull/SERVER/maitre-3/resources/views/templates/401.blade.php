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
        <link type="text/css" href="{{ asset('templates/edmin/css/maitre-css.css') }}" rel="stylesheet">
        <link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">        
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>

            <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
        
    </head>

    <body>

    
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">@yield('caption') </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">    

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
                                    <li><a href="{{route('ds-user-show',Auth::user()->id)}}">Configuração da Conta</a></li>
                                    <li><a href="{{route('ds-user-password-edit',Auth::user()->id)}}">Edição de Credenciais</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->



        <div class="wrapper">
            <div class="container">

             @if( Session::has('flash_msg') )
                <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_msg') }}</div>
             @endif
             @if( Session::has('flash_msg_success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_msg_success') }}</div>
             @endif

                <div class="row">
                    

                    <!--/.span3-->
                   	
                   <div class="page-header">
					  <h1>ERRO 401: ACESSO NEGADO <small>Você não tem privilégio para acessar esta página</small></h1>
					  <a href="{{route('ds-home')}}">Retornar à Home</a>
					</div>

                    <!--/.span9-->


                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2017-2018 @yield('caption'). </b> Trabalho de conclusão de curso de Carlos Eduardo Borges.
            </div>
        </div>
        <!-- MAITRE -->
        <script src="{{ asset('js/maitre-js.js') }}"></script>
        <!-- /MAITRE -->
        <script src="{{ asset('templates/edmin/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
        <script src="{ asset('templates/edmin/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('templates/edmin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('templates/edmin/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
        <script src="{{ asset('templates/edmin/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('templates/edmin/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('templates/edmin/scripts/common.js') }}" type="text/javascript"></script>
      
    </body>
