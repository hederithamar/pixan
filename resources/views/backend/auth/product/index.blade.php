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
                    {{ __('labels.backend.access.products.management') }} <small class="text-muted">{{ __('labels.backend.access.products.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.auth.product.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-12">
            
                
                        @foreach ($products as $product)
                        <div class="col col-sm-2 order-1 order-sm-2  mb-3">
                            <div class="card mb-2 bg-light">
                                <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $product->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fa fa-info"></i> {{ $product->description }}<br/>
                                            <i class="fa fa-info"></i> {{ $product->category }}<br/>
                                            <i class="fa fa-info"></i> $ {{ $product->price }}<br/>
                                            
                                        </small>
                                    </p>

                                    <p class="card-text">

                                       {!! $product->action_buttons !!}
                                    
                                    </p>
                                </div>
                            </div>
                        </div><!--col-md-4-->
                            
                        @endforeach
                    
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $products->total() !!} {{ trans_choice('labels.backend.access.products.table.total', $products->total()) }}
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


