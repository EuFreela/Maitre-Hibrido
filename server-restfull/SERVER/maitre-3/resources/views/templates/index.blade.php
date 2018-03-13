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
                    <div class="span3">
                        <div class="sidebar">

                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{route('ds-home')}}"><i class="menu-icon icon-dashboard"></i>
                                HOME
                                </a></li>                               
                            </ul>
                                                                                   
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#users"><i class="menu-icon icon-user">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Usuários </a>
                                    <ul id="users" class="collapse unstyled">
                                        <li><a href="{{route('ds-user-create')}}"><i class="icon-save">
                                            </i>Registrar Usuários </a></li>
                                        <li><a href="{{route('ds-user-password-edit',Auth::user()->id)}}">&nbsp;<i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Edição de Credenciais </a></li>
                                        <li><a href="{{route('ds-user-list')}}"><i class="icon-th-list">
                                            </i>Todos os Usuários </a></li>
                                        <li><a href="{{route('ds-user-list-token')}}"><i class="icon-key">
                                            </i>API Tokens </a></li>
                                    </ul>
                                </li>                                
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li>
                                <a class="collapsed" data-toggle="collapse" href="#products">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                <i class="icon-chevron-down pull-right"></i>
                                <i class="icon-chevron-up pull-right"></i>
                                Produtos 
                                </a>
                                    <ul id="products" class="collapse unstyled">
                                        <li><a href="{{route('ds-cate-create')}}"><i class="icon-save">
                                            </i>Cadastrar Categorias </a></li>
                                        <li><a href="{{route('ds-prod-create')}}"><i class="icon-save">
                                            </i>Cadastro de Produtos </a></li>
                                        <li><a href="{{route('ds-cate-list')}}"><i class="icon-th-list">
                                            </i>Todas as Categorias </a></li>
                                        <li><a href="{{route('ds-prod-list')}}"><i class="icon-th-list">
                                            </i>Todos os Produtos </a></li>                                        
                                    </ul>
                                </li>
                                <li>
                                <a class="collapsed" data-toggle="collapse" href="#menu">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <i class="icon-chevron-down pull-right"></i>
                                <i class="icon-chevron-up pull-right"></i>
                                Cardápio 
                                </a>
                                    <ul id="menu" class="collapse unstyled">
                                        <li><a href="{{route('ds-menu-create')}}"><i class="icon-save">
                                            </i>Criação do Cardápio </a></li>
                                        <li><a href="{{route('ds-menu-list')}}"><i class="icon-th-list">
                                            </i>Lista </a></li>
                                    </ul>
                                </li> 
                                <li>
                                <a class="collapsed" data-toggle="collapse" href="#table">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <i class="icon-chevron-down pull-right"></i>
                                <i class="icon-chevron-up pull-right"></i>
                                Mesas
                                </a>
                                    <ul id="table" class="collapse unstyled">
                                        <li><a href="{{route('ds-table-create')}}"><i class="icon-save">
                                            </i>Cadastro de Mesas </a></li>
                                        <li><a href="{{route('ds-table-list')}}"><i class="icon-th-list">
                                            </i>Lista de Tokens das Mesas</a></li>
                                    </ul>
                                </li>
                                <li>
                                <a class="collapsed" data-toggle="collapse" href="#kitchen">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                <i class="icon-chevron-down pull-right"></i>
                                <i class="icon-chevron-up pull-right"></i>
                                Cozinha
                                </a>
                                    <ul id="kitchen" class="collapse unstyled">
                                        <li><a href="{{route('ds-kitchen-list')}}"><i class="icon-save">
                                            </i>Lista de Pedidos </a></li>                                        
                                    </ul>
                                </li>                                         
                            </ul>    


                               
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('fr-home')}}"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>&nbsp;Frontend </a></li>
                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('logout')}}"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

                    <!--/.span3-->
                    @yield('content')
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
