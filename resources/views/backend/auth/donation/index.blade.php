@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.access.products.management'))

@section('breadcrumb-links')
    @include('backend.auth.product.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.donations.management') }} <small class="text-muted">{{ __('labels.backend.access.donations.active') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-12">
            
           <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                    <img align="center" src="{{asset('theme/img/icons/donaciones/alimentos1.jpg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a  href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Alimentos</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
           <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <!--i class="fa fa-github-alt bg-primary p-3 font-2xl mr-3"></i-->
                        <img src="{{asset('theme/img/icons/donaciones/bebe.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Bebes</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div>
           <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                    <img src="{{asset('theme/img/icons/donaciones/ropa.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.clothes.index') }}">
                            <span class="small font-weight-bold">Ropa</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
           <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <img src="{{asset('theme/img/icons/donaciones/muebles.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Muebles</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div>  
           <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <img src="{{asset('theme/img/icons/donaciones/utiles escolares.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Utiles Escolares</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div>  
           <div class="col-6  col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <img src="{{asset('theme/img/icons/donaciones/libros.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Libros</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
           <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <img src="{{asset('theme/img/icons/donaciones/juguetes.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Juguetes</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
           <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <img src="{{asset('theme/img/icons/donaciones/herramientas.jpeg')}}"  height="150" width="220">
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Herramienta</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
        </div><!--row-->
        <div class="row">
            
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection


