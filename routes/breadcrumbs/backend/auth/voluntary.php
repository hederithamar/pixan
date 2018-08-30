<?php


Breadcrumbs::register('admin.auth.donation.voluntary.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.voluntaries.management'), route('admin.auth.product.index'));
});

Breadcrumbs::register('admin.auth.donation.voluntary.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.voluntary.index');
    $breadcrumbs->push(__('menus.backend.access.voluntaries.deleted'), route('admin.auth.product.deleted'));
});

Breadcrumbs::register('admin.auth.donation.voluntary.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.voluntary.index');
    $breadcrumbs->push(__('labels.backend.access.voluntaries.create'), route('admin.auth.product.create'));
});

Breadcrumbs::register('admin.auth.donation.voluntary.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.voluntary.index');
    $breadcrumbs->push(__('menus.backend.access.voluntaries.view'), route('admin.auth.product.show', $id));
});

Breadcrumbs::register('admin.auth.donation.voluntary.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.voluntary.index');
    $breadcrumbs->push(__('menus.backend.access.voluntaries.edit'), route('admin.auth.product.edit', $id));
});
