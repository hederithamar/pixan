@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.access.voluntaries.management'))

@section('breadcrumb-links')
    @include('backend.auth.voluntary.includes.breadcrumb-links')
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

            <div class="col-sm-7">
                @include('backend.auth.voluntary.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-12">
            @foreach ($voluntaries as $voluntary)
<div class="col col-sm-3 order-1 order-sm-3  mb-3">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab{{$voluntary->id}}" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home{{$voluntary->id}}" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-heart"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile{{$voluntary->id}}" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-info-circle"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact{{$voluntary->id}}" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="action-tab" data-toggle="tab" href="#action{{$voluntary->id}}" role="tab" aria-controls="action" aria-selected="false"><i class="fa fa-newspaper-o"></i></a>
        </li>
        </ul>
        <div class="tab-content" id="myTab{{$voluntary->id}}Content">
            <div class="tab-pane fade show active" id="home{{$voluntary->id}}" role="tabpanel" aria-labelledby="home-tab">
                <h5>
                    <small class="text-muted">
                      {{ $voluntary->celphone }}<br/>
                    </small>
                </h5>
                
                <img class="card-img-top" src="{{ $voluntary->picture }}" alt="Profile Picture" height="150" width="150">
            </div>

            <div class="tab-pane fade" id="profile{{$voluntary->id}}" role="tabpanel" aria-labelledby="profile-tab">
                
                <div class="callout callout-info">
                    <strong class="h4">{{ $voluntary->sexo }}</strong>
                    <br>
                    <small class="text-muted"><i class="fa fa-info"></i> {{ $voluntary->facebook }}</small>
                    <br>
                    <small class="text-muted"><i class="fa fa-user"></i> {{ $voluntary->user->name }}</small>
                    <br>
                    <div class="chart-wrapper">
                        <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                    </div>
                   
                </div>
            </div>
            <div class="tab-pane fade" id="contact{{$voluntary->id}}" role="tabpanel" aria-labelledby="contact-tab">
               
                <div class="callout callout-warning">
                    <small class="text-muted"><i class="fa fa-map"></i>  {{ $voluntary->escolaridad }}</small>
                    <br>
                    <small class="text-muted"><i class="fa fa-calendar"></i>  {{ $voluntary->carrera }}</small>
                    <br>
                    <br>
                    <strong class="h4">{{ $voluntary->status }}</strong>
                    
                    <div class="chart-wrapper">
                        <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="action{{$voluntary->id}}" role="tabpanel" aria-labelledby="action-tab">
                @if ($voluntary->status != "En espera")
                    <div class="callout callout-success">
                        <strong class="h4"><i class="fa fa-check"></i> Tus servicio son requeridos, te contactaremos lo mas breve posible. {{ $voluntary->evidence_text }}</strong>
                        
                       
                    </div>
                @else
                    <div class="callout callout-warning">
                    <strong class="h4"><i class="fa fa-info"></i> Estamos procesando tu solicitud espera respuesta :)</strong>
                    </div>
                @endif
               
            </div>

        </div>
    </div>
</div><!--col-md-4-->
@endforeach
                               
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $voluntaries->total() !!} {{ trans_choice('labels.backend.access.voluntaries.table.total', $voluntaries->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $voluntaries->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection


