<?php

Breadcrumbs::register('admin.auth.donation.service.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.services.management'), route('admin.auth.product.index'));
});

Breadcrumbs::register('admin.auth.donation.service.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.service.index');
    $breadcrumbs->push(__('menus.backend.access.services.deleted'), route('admin.auth.product.deleted'));
});

Breadcrumbs::register('admin.auth.donation.service.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.service.index');
    $breadcrumbs->push(__('labels.backend.access.services.create'), route('admin.auth.product.create'));
});

Breadcrumbs::register('admin.auth.donation.service.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.service.index');
    $breadcrumbs->push(__('menus.backend.access.services.view'), route('admin.auth.product.show', $id));
});

Breadcrumbs::register('admin.auth.donation.service.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.service.index');
    $breadcrumbs->push(__('menus.backend.access.services.edit'), route('admin.auth.product.edit', $id));
});
