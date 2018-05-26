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


