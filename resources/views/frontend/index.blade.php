<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>APOMEFT - Part Of Me For They</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href="theme/img/favicon.ico">

    {{ style('theme/css/bootstrap-responsive.css') }}
    {{ style('theme/css/style.css') }}
    {{ style('theme/css/defaeult.css') }}

<body>
    <!-- navbar -->
    <div class="navbar-wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <!-- Responsive navbar -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                    <h1 class="brand"><a href="index.html">APOMEFT</a></h1>
                    <!-- navigation -->
                    <nav class="pull-right nav-collapse collapse">
                        <ul id="menu-main" class="nav">
                            <li><a title="team" href="#about">Información</a></li>
                            <li><a title="services" href="#services">Donaciones</a></li>
                            <li><a title="works" href="#works">Servicios</a></li>
                            <li><a title="blog" href="#blog">Voluntarios</a></li>
                            
            @guest
                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">{{ __('navs.frontend.login') }}</a></li>

                @if (config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">{{ __('navs.frontend.register') }}</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    
                </li>
                @can('view backend')
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link {{ active_class(Active::checkRoute('admin.dashboard')) }}">{{ __('navs.frontend.user.administration') }}</a></li>
                @endcan
                <li class="nav-item"><a href="{{ route('frontend.user.account') }}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.account')) }}">{{ __('navs.frontend.user.account') }}</a></li>

                <li class="nav-item"><a href="{{ route('frontend.auth.logout') }}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.logout')) }}">{{ __('navs.general.logout') }}</a></li>
            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header area -->
    <div id="header-wrapper" class="header-slider">
        <header class="clearfix">
            <div class="logo">
                <img src="theme/img/icons/APOMEFT DONACIONES.png" alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="main-flexslider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <p class="home-slide-content">
                                        <strong>APOMEFT</strong>
                                    </p>
                                </li>
                                <li>
                                    <p class="home-slide-content">
                                        Apart Of Me <strong>For They</strong>
                                    </p>
                                </li>
                                <li>
                                    <p class="home-slide-content">
                                        Una parte de mi <strong>para ellos</strong>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <!-- end slider -->
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- spacer section -->
    <section class="spacer green">
        <div class="container">
            <div class="row">
                <div class="span6 alignright flyLeft">
                    <blockquote class="large">
                        El nombre APOMEFT por sus siglas en ingles significa Apart Of Me For They en español...<cite>Una parte de mi para ellos.</cite>
                    </blockquote>
                </div>
                <div class="span6 aligncenter flyRight">
                    <i class="icon-heart icon-10x"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- end spacer section -->
    <!-- section: team -->
    <section id="about" class="section">
        <div class="container">
            <h4>¿Quienes somos?</h4>
            <div class="row">
                <div class="span4 offset1">
                    <div>
                        <h2>Una parte de mi <strong>para ellos.</strong></h2>
                        <p>
                            Somos la organización donaciones APOMEFT, especializada en recaudar donaciones de: productos y servicios profesionales sin fines de lucro, cubriendo la necesidad de apoyo mutuo bajo el contrato de permuta; la solidaridad, voluntad, confianza y seguridad nos distinguen...  
                        </p>
                    </div>
                </div>
                <div class="span6">
                    <div class="aligncenter">
                        <img src="theme/img/icons/APOMEFT DONACIONES.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3 offset1 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="theme/img/team/img-1.jpg" alt="" />
                        <h3>Donaciones</h3>
                        <p>
                            Ayuda a los demás.
                        </p>
                    </div>
                </div>
                <div class="span3 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="theme/img/team/img-2.jpg" alt="" />
                        <h3>Servicios</h3>
                        <p>
                            Ponte en practica.
                        </p>
                    </div>
                </div>
                <div class="span3 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="theme/img/team/img-3.jpg" alt="" />
                        <h3>Voluntarios</h3>
                        <p>
                            La union hace la fuerza.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- end section: team -->
    <!-- section: services -->
    <section id="services" class="section orange">
        <div class="container">
            <h4>Donaciones</h4>
            <!-- Four columns -->
            <div class="row">
                <div class="span3 animated-fast flyIn">
                    <div class="service-box">
                        <img src="theme/img/icons/basket.png" alt="" />
                        <h2>Alimentos</h2>
                        <p>
                            Puedes donar alimentos.
                        </p>
                    </div>
                </div>
                <div class="span3 animated flyIn">
                    <div class="service-box">
                        <img src="theme/img/icons/lab.png" alt="" />
                        <h2>Ropa</h2>
                        <p>
                            Puedes donar ropa.
                        </p>
                    </div>
                </div>
                <div class="span3 animated-fast flyIn">
                    <div class="service-box">
                        <img src="theme/img/icons/laptop.png" alt="" />
                        <h2>Libros</h2>
                        <p>
                            puedes donar libros.
                        </p>
                    </div>
                </div>
                <div class="span3 animated-slow flyIn">
                    <div class="service-box">
                        <img src="theme/img/icons/camera.png" alt="" />
                        <h2>Juguetes</h2>
                        <p>
                            Puedes donar juguetes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section: services -->
    <!-- section: works -->
    <section id="works" class="section">
        <div class="container clearfix">
            <h4>Servicios</h4>
            <!-- portfolio filter -->
            <div class="row">
                <div id="filters" class="span12">
                    <ul class="clearfix">
                        <li>
                            <a href="#" data-filter="*" >
                                <h5>Profesión</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-filter=".web">
                                <h5>Oficios</h5>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END PORTFOLIO FILTERING -->
            </div>
            
        </div>
    </section>
    <!-- spacer section -->
    <section class="spacer bg3">
        <div class="container">
            <div class="row">
                <div class="span12 aligncenter flyLeft">
                    <blockquote class="large">
                        Tu ayuda puede marcar la diferiencia.
                    </blockquote>
                </div>
                <div class="span12 aligncenter flyRight">
                    <i class="icon-rocket icon-10x"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- end spacer section -->
    <!-- section: blog -->
    <section id="blog" class="section">
        <div class="container">
            <h4>Voluntarios</h4>
            <!-- Three columns -->
            <div class="row">
                <div class="span6">
                    <div class="home-post">
                        <div class="post-image">
                            <img class="max-img" src="theme/img/blog/img1.jpg" alt="" />
                        </div>
                        
                        <div class="entry-content">
                            <h5><strong><a href="#">Internos</a></strong></h5>
                            <p>
                               Necesitamos tu apoyo para coordinar... &hellip;
                            </p>
                            <a href="#" class="more">Saber más</a>
                        </div>
                    </div>
                </div>
               
                <div class="span6">
                    <div class="home-post">
                        <div class="post-image">
                            <img class="max-img" src="theme/img/blog/img4.jpg" alt="" />
                        </div>
                        
                        <div class="entry-content">
                            <h5><strong><a href="#">Externos</a></strong></h5>
                            <p>
                                Ayuda en campañas que realicemos. &hellip;
                            </p>
                            <a href="#" class="more">Saber más...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blankdivider30"></div>
        </div>
    </section>

    <!-- end spacer section -->
    <!-- section: contact -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="span6 offset3">
                    <ul class="social-networks">
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
                    </ul>
                    <p class="copyright">
                       
                    </p>
                </div>
            </div>
        </div>
        <!-- ./container -->
    </footer>
    <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
   
    {{ script('theme/js/jquery.js') }}
    {{ script('theme/js/jquery.scrollTo.js') }}
    {{ script('theme/js/jquery.nav.js') }}
    {{ script('theme/js/jquery.localScroll.js') }}
    {{ script('theme/js/bootstrap.js') }}
    {{ script('theme/js/jquery.prettyPhoto.js') }}
    {{ script('theme/js/isotope.js') }}
    {{ script('theme/js/jquery.flexslider.js') }}
    {{ script('theme/js/inview.js') }}
    {{ script('theme/js/animate.js') }}
    {{ script('theme/js/custom.js') }}
    {{ script('theme/contactform/contactform.js') }}



</body>

</html>
