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
                @if ($logged_in_user->isAdmin())
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <i class="fa fa-cutlery bg-primary p-3 font-2xl mr-3"></i>
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.product.index') }}">
                            <span class="small font-weight-bold">productos</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
           <div class="col-6 col-lg-3">
                
           </div> 
              @endif
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ route('admin.auth.donation.donation.index') }}">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Como funciona" alt="Como funciona [800x400]" src="{{asset('img/backend/bg1.jpeg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>¿Que puedo donar?</h3>
                            <p>Enteraté como puedes ayudar.</p>
                        </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                         <a href="{{ route('admin.auth.donation.service.index') }}">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="{{asset('img/backend/bg2.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>¿Puedo ayudar?</h3>
                            <p>Claro que si, enterate.</p>
                        </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('admin.auth.donation.voluntary.index') }}">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="{{asset('img/backend/bg3.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Voluntarios</h3>
                            <p>Obtén evidencia de tu ayuda.</p>
                        </div>
                        </a>
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
                    No hay noticias por este momento
                </div><!--card-block-->
            </div><!--card-->

            <div class="card"><!--Reglamentos-->
                <div class="card-header">
                    <strong>Tips</strong>
                </div><!--card-header-->
                <div class="card-block">
                    La ropa especialmente para niños y bebés no es económica. Así mismo, adultos y jóvenes de escasos recursos difícilmente pueden hacerse de ropa confortable y necesaria para el invierno, o el calor extremo, que les permita proteger su cuerpo y su dignidad. Por eso, dona la ropa que aún se encuentre en buen estado y desees darle un buen uso, puedes hacer mucho bien.
                    <br> <br>
                    Ideas para donar
                    <br> <br>
                    1.-Playeras y blusas que ya no usen tus hijos
                    Pantalones, shorts y faldas respecto a los que cambiaste de opinión y ya no son de tu agrado o adecuados para ti
                    Zapatos, tenis y sandalias aún funcionales pero que ya reemplazaste.
                    <br>
                    2.- Ropa para el invierno o el calor extremo.
                    <br>
                    3.- Ropa de tu bebé y niños pequeños que ya no usarán.
                    <br>
                    4.- Donar muebles, ayuda a  que familias e individuos, puedan crear un espacio habitable y óptimo para su desarrollo.
                    <br>
                    5.- Cosas que damos por sentado como tener donde sentarse,  un comedor para tomar los alimentos con la familia; 
                    <br>son desafíos a veces infranqueables para muchas personas.
                    <br><br>
                    Te invitamos a ayudar a otros, creando más espacio en tu casa.

                    <br><br>
                    Satisfacción al Donante: No existe nada más gratificante saber que no estás desperdiciando algún producto y que en su lugar está beneficiando a alguien que realmente lo necesita.
                    <br><br>
                    A continuación te dejamos una lista de alimentos y víveres de primera necesidad, se recomiendan alimentos enlatados, no perecederos y que puedan consumirse sin necesidad de calentar o cocinar.
                    <br><br>
                    Agua embotellada
                    Bolsas de arroz y lentejas
                    Latas de atún y sardinas
                    Latas o bolsas de frijoles
                    Azúcar, café y chocolate
                    Leche y leche en polvo
                    Aceite
                    Galletas
                    Sopa de pasta
                    Vegetales enlatados
                    Fruta en almíbar 
                    Alimento para bebé y mascotas
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
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Donaciones" alt="Donaciones [800x400]" src="{{asset('img/backend/bg9.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Donación</h3>
                            <p>Puedes ayudar a otros danando cosas que ya no utilices</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Alimentos" alt="First slide [800x400]" src="{{asset('img/backend/bg7.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Alimentos</h3>
                            <p>Puedes donar alimentos no perecederos</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Articulos para bebe" alt="Second slide [800x400]" src="{{asset('img/backend/bg4.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Articulos para bebe</h3>
                            <p>Puedes donar articulos para bebe</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Ropa" alt="Third slide [800x400]" src="{{asset('img/backend/bg5.png')}}" data-holder-rendered="true">
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
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="{{asset('img/backend/bg8.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Servicio</h3>
                            <p>Puedes ofrecer tus servicios</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="{{asset('img/backend/bg9.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Profesion</h3>
                            <p>Cuentas con conocimiento para servir a los demas.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="{{asset('img/backend/bg10.jpg')}}" data-holder-rendered="true">
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
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="{{asset('img/backend/bg11.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Voluntarios</h3>
                            <p>Toda ayuda es dispensable unete.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="{{asset('img/backend/bg12.jpg')}}" data-holder-rendered="true">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Voluntario interno</h3>
                            <p>Necesitamos ayuda para organizar actividades, forma parte del equipo.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="{{asset('img/backend/bg1.jpeg')}}" data-holder-rendered="true">
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
