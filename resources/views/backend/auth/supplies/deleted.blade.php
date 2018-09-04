@extends ('backend.layouts.app')

@section ('title', __('labels.backend.acces.products.management') . ' | ' . __('labels.backend.access.products.deleted'))

@section('breadcrumb-links')
    @include('backend.auth.product.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.products.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.products.deleted') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.access.products.table.name') }}</th>
                            <th>{{ __('labels.backend.access.products.table.description') }}</th>
                            <th>{{ __('labels.backend.access.products.table.category') }}</th>
                            <th>{{ __('labels.backend.access.products.table.stock') }}</th>
                            <th>{{ __('labels.backend.access.products.table.date_end') }}</th>
                            <th>{{ __('labels.backend.access.products.table.price') }}</th>
                            <th>{{ __('labels.backend.access.products.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($products->count())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{!! $product->stock !!}</td>
                                    <td>{!! $product->date_end !!}</td>
                                    <td>{!! $product->price !!}</td>
                                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                                    <td>{!! $product->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.access.products.no_deleted') }}</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
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
