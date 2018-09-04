@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.access.babies.management'))

@section('breadcrumb-links')
    @include('backend.auth.product.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.babies.management') }} <small class="text-muted">{{ __('labels.backend.access.babies.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.auth.babies.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-12">
            @foreach ($products as $product)
<div class="col col-sm-3 order-1 order-sm-3  mb-3">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab{{$product->id}}" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home{{$product->id}}" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-heart"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile{{$product->id}}" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-info-circle"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact{{$product->id}}" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-truck"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="action-tab" data-toggle="tab" href="#action{{$product->id}}" role="tab" aria-controls="action" aria-selected="false"><i class="fa fa-gear"></i></a>
        </li>
        </ul>
        <div class="tab-content" id="myTab{{$product->id}}Content">
            <div class="tab-pane fade show active" id="home{{$product->id}}" role="tabpanel" aria-labelledby="home-tab">
                <h5>
                    <small class="text-muted">
                      {{ $product->name }}<br/>
                    </small>
                </h5>
                
                <img class="card-img-top" src="{{ $product->picture }}" alt="Profile Picture" height="150" width="150">
            </div>

            <div class="tab-pane fade" id="profile{{$product->id}}" role="tabpanel" aria-labelledby="profile-tab">
                
                <div class="callout callout-info">
                    <strong class="h4">{{ $product->category }}</strong>
                    <br>
                    <small class="text-muted"><i class="fa fa-info"></i> {{ $product->sub_category }}</small>
                    <br>
                    <small class="text-muted"><i class="fa fa-info"></i> {{ $product->description }}</small>
                    <br>
                    <small class="text-muted"><i class="fa fa-info"></i> {{ $product->number_product }}</small>
                    <br>
                    <small class="text-muted"><i class="fa fa-user"></i> {{ $product->user->name }}</small>
                    <br>
                    <div class="chart-wrapper">
                        <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact{{$product->id}}" role="tabpanel" aria-labelledby="contact-tab">
               
                <div class="callout callout-warning">
                    <small class="text-muted"><i class="fa fa-map"></i>  {{ $product->direccion }}</small>
                    <br>
                    <small class="text-muted"><i class="fa fa-calendar"></i>  {{ $product->fecha }}</small>
                    <br>
                    <br>
                    <strong class="h4">{{ $product->status }}</strong>
                    
                    <div class="chart-wrapper">
                        <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="action{{$product->id}}" role="tabpanel" aria-labelledby="action-tab">
               
                <div class="callout callout-success">
                    {!! $product->action_food_buttons !!}
                </div>
            </div>

        </div>
    </div>
</div><!--col-md-4-->
@endforeach
                               
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $products->total() !!} {{ trans_choice('labels.backend.access.foods.table.total', $products->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $products->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection


