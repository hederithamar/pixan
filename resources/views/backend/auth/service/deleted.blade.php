@extends ('backend.layouts.app')

@section ('title', __('labels.backend.acces.services.management') . ' | ' . __('labels.backend.access.services.deleted'))

@section('breadcrumb-links')
    @include('backend.auth.service.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.services.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.services.deleted') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.access.services.table.name') }}</th>
                            <th>{{ __('labels.backend.access.services.table.description') }}</th>
                            <th>{{ __('labels.backend.access.services.table.category') }}</th>
                            <th>{{ __('labels.backend.access.services.table.stock') }}</th>
                            <th>{{ __('labels.backend.access.services.table.date_end') }}</th>
                            <th>{{ __('labels.backend.access.services.table.price') }}</th>
                            <th>{{ __('labels.backend.access.services.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($services->count())
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->description }}</td>
                                    <td>{{ $service->category }}</td>
                                    <td>{!! $service->stock !!}</td>
                                    <td>{!! $service->date_end !!}</td>
                                    <td>{!! $service->price !!}</td>
                                    <td>{{ $service->updated_at->diffForHumans() }}</td>
                                    <td>{!! $service->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.access.services.no_deleted') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $services->total() !!} {{ trans_choice('labels.backend.access.services.table.total', $services->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $services->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
