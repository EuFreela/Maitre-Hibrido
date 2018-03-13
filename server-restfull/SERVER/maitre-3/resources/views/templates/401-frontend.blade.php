<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="{{asset('templates/delicious/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('templates/delicious/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('templates/delicious/css/style.css')}}">
    <link type="text/css" href="{{ asset('templates/edmin/css/maitre-css.css') }}" rel="stylesheet">
    <!-- =======================================================
        Theme Name: Delicious
        Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  
    <!--about-->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Desculpe</h1>
                    <p class="header-p"></p> </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="col-md-6 col-sm-6">
                        <div class="about-info">
                            <h2 class="heading">Caro Cliente, </h2>
                            <p>Não há mesas disponíveis neste momento, todas encontram-se em ocupadas.</p>
                            <p>Entre em contato com o garçon, ele poderá lhe indicar alguma Disponível</p>
                           <!-- <div class="details-list">
                                <ul>
                                    <li><i class="fa fa-check"></i>Retornar</li>
                                    <li><i class="fa fa-check"></i>Quisque finibus eu lorem quis elementum</li>
                                    <li><i class="fa fa-check"></i>Vivamus accumsan porttitor justo sed </li>
                                    <li><i class="fa fa-check"></i>Curabitur at massa id tortor fermentum luctus</li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="img/res01.jpg" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!--/about-->

    <!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <h4 class="widget-title">Maitre</h4>
                        <address>UEMG<br>Passos - MG</address>
                        <div class="social-list">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                        <p class="copyright clear-float">
                            © Maitre. Trabalho de Conclusão de Curso
                            <div class="credits">
                                <!-- 
                                    All the links in the footer should remain intact. 
                                    You can delete the links only if you purchased the pro version.
                                    Licensing information: https://bootstrapmade.com/license/
                                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Delicious
                                -->
                                Designed by <a href="#">Free Bootstrap Themes</a>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->
    
    <script src="{{asset('templates/delicious/js/jquery.min.js')}}"></script>
    <script src="{{asset('templates/delicious/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('templates/delicious/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('templates/delicious/js/jquery.mixitup.min.js')}}"></script>
    <script src="{{asset('templates/delicious/js/custom.js')}}"></script>
    <script src="{{asset('templates/delicious/contactform/contactform.js')}}"></script>
    
</body>
</html>