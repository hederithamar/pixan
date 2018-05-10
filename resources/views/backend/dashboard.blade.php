@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="card">
                    <div class="card-header">
                        <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                    </div><!--card-header-->
                   
                </div><!--card-->
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Como funciona" alt="Como funciona [800x400]" src="https://www.donaunicef.org.mx/wp-content/uploads/2016/10/Banner1300x600regalosbg.001.jpeg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>¿Como funciona?</h3>
                            <p>Enterete como puedes ayudar.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="https://donaunicef.org.mx/wp-content/uploads/2016/10/background-formas.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>¿Puedo ayudar?</h3>
                            <p>Claro que si, enterate.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="https://donaunicef.org.mx/wp-content/uploads/2016/10/background-educacion-1.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Evidencia</h3>
                            <p>Obtenevidencia de tu ayuda.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card">
                
            </div><!--card-->
            <div class="card">
                <div class="card-header">
                    <strong>Noticias</strong>
                </div><!--card-header-->
                <div class="card-block">
                    {!! __('strings.backend.welcome') !!}
                </div><!--card-block-->
            </div><!--card-->
        </div>


        <div class="col-sm-12 col-md-4">
   
            <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions1" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions1" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleCaptions1" data-slide-to="2" class=""></li>
                    <li data-target="#carouselExampleCaptions1" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Donaciones" alt="Donaciones [800x400]" src="https://okdiario.com/img/2017/09/08/donacion-de-organos-655x368.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Donación</h3>
                            <p>Puedes ayudar a otros danando cosas que ya no utilices</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Alimentos" alt="First slide [800x400]" src="https://articulos.elclasificado.com/wp-content/uploads/2011/10/donacion_de_alimentos.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Alimentos</h3>
                            <p>Puedes donar alimentos no perecederos</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Articulos para bebe" alt="Second slide [800x400]" src="https://www.elpais.cr/wp-content/uploads/2017/07/Beb%C3%A9-prematuro.-Archivo.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Articulos para bebe</h3>
                            <p>Puedes donar articulos para bebe</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Ropa" alt="Third slide [800x400]" src="http://www.emausvillaelsalvador.org/galeria/galeri-2016/galeria-donacion-ropa-vmt/donacion-ropa-vmt41.png" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Ropa</h3>
                            <p>Puedes donar la ropa que no uses.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>

            <div id="carouselExampleCaptions2" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions2" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions2" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleCaptions2" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="http://aztecasonora.com/wp-content/uploads/2018/01/comunitario-servicio-1024x653.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Servicio</h3>
                            <p>Puedes ofrecer tus servicios</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="https://www.mppeuct.gob.ve/sites/default/files/styles/foto_principal/public/media/images/servicio_comunitario_2.jpg?itok=gpw5Fr7R" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Profesion</h3>
                            <p>Cuentas con conocimiento para servir a los demas.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="http://www.unimet.edu.ve/unimetsite/wp-content/uploads/2015/06/Servicio-comunitario.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Oficio</h3>
                            <p>Comparte tu experiencia a personas necesitadas.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">siguiente</span>
                </a>
            </div>

            <div id="carouselExampleCaptions3" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions3" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions3" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleCaptions3" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="http://www.utel.edu.mx/blog/wp-content/uploads/2016/01/shutterstock_255404977.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Voluntarios</h3>
                            <p>Toda ayuda es dispensable unete.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="http://dip01.u-grenoble3.fr/wordpress/cicm17-4/wp-content/uploads/sites/177/2017/03/El_trabajo_voluntario_permite_conocer_nuevos_amigos..jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Voluntario interno</h3>
                            <p>Necesitamos ayuda para organizar actividades, forma parte del equipo.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="https://ep01.epimg.net/ccaa/imagenes/2017/10/20/catalunya/1508502569_461360_1508504355_noticia_normal.jpg" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Voluntario externo</h3>
                            <p>Puedes ayudar en campañas que organicemos.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions3" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions3" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
        
    </div><!--row-->
@endsection
