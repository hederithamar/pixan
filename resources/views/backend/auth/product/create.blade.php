@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.products.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.product.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.product.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            {{ __('labels.backend.access.products.management') }}
                            <small class="text-muted">{{ __('labels.backend.access.products.create') }}</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr />

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                           
                            <div class="col-md-6">
                                {{ html()->label(__('validation.attributes.backend.access.products.name'))->class('col-md-12 form-control-label')->for('name') }}

                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.products.name_input'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->

                             <div class="col-md-6">
                                {{ html()->label(__('validation.attributes.backend.access.products.category'))->class('col-md-12 form-control-label')->for('category') }}

                                {{ html()->text('category')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.products.category_input'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        
                            <div class="col-md-12">
                                {{ html()->label(__('validation.attributes.backend.access.products.description'))->class('col-md-12 form-control-label')->for('description') }}

                                {{ html()->text('description')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.products.description_input'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                         <div class="form-group row">
                       
                            <div class="col-md-6">
                                 {{ html()->label(__('validation.attributes.backend.access.products.stock'))->class('col-md-12 form-control-label')->for('stock') }}


                                {{ html()->text('stock')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.products.stock_input'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->

                            <div class="col-md-6">
                                {{ html()->label(__('validation.attributes.backend.access.products.date_end'))->class('col-md-12 form-control-label')->for('date_end') }}

                                {{ html()->text('date_end')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.products.description_input'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                
                        <div class="form-group row">
                            <div class="col-md-6">
                                {{ html()->label(__('validation.attributes.backend.access.products.price'))->class('col-md-12 form-control-label')->for('price') }}

                                {{ html()->text('price')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.products.price_input'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->

                             <div class="col-md-6">
                                {{ html()->label(__('validation.attributes.backend.access.products.user_id'))->class('col-md-12 form-control-label')->for('user_id') }}
                                
                                <select name="user_id" id="user_id" class="form-control" required="required">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <div class="col-md-3">
                                {{ html()->label(__('validation.attributes.backend.access.products.active'))->class('col-md-12 form-control-label')->for('active') }}

                                <label class="switch switch-3d switch-primary">
                                    {{ html()->checkbox('active', true, '1')->class('switch-input') }}
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div><!--col-->

                            <div class="col-md-9">
                                    <div class="form-group">
                                        {{ html()->label(__('validation.attributes.backend.access.products.image'))->for('image') }}

                                       
                                    </div><!--form-group-->

                                    <div class="form-group hidden" id="image_location">
                                        {{ html()->file('image_location')->class('form-control') }}
                                    </div><!--form-group-->
                                </div><!--col-->
                        </div><!--form-group-->

                        
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.product.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection