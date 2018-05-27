<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.access.services.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.auth.donation.service.index') }}">{{ __('menus.backend.access.services.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.auth.donation.service.create') }}">{{ __('menus.backend.access.services.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.auth.donation.service.deleted') }}">{{ __('menus.backend.access.services.deleted') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>