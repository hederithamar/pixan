<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.access.products.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.auth.product.index') }}">{{ __('menus.backend.access.products.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.auth.product.create') }}">{{ __('menus.backend.access.products.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.auth.product.deleted') }}">{{ __('menus.backend.access.products.deleted') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>