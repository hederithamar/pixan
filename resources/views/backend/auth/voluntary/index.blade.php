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
                    {{ __('labels.backend.access.voluntaries.management') }} <small class="text-muted">{{ __('labels.backend.access.voluntaries.active') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-12">
            
           <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <i class="fa fa-undo bg-primary p-3 font-2xl mr-3"></i>
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Internos</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
           </div> 
           <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <i class="fa fa-repeat bg-primary p-3 font-2xl mr-3"></i>
                        
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.auth.donation.food.index') }}">
                            <span class="small font-weight-bold">Externos</span>
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


