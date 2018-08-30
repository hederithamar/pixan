<?php

Breadcrumbs::register('admin.auth.donation.clothes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.clothes.management'), route('admin.auth.donation.clothes.index'));
});

Breadcrumbs::register('admin.auth.donation.clothes.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.clothes.index');
    $breadcrumbs->push(__('menus.backend.access.clothes.deleted'), route('admin.auth.donation.clothes.deleted'));
});

Breadcrumbs::register('admin.auth.donation.clothes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.clothes.index');
    $breadcrumbs->push(__('labels.backend.access.clothes.create'), route('admin.auth.donation.clothes.create'));
});

Breadcrumbs::register('admin.auth.donation.clothes.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.clothes.index');
    $breadcrumbs->push(__('menus.backend.access.clothes.view'), route('admin.auth.donation.clothes.show', $id));
});

Breadcrumbs::register('admin.auth.donation.clothes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.clothes.index');
    $breadcrumbs->push(__('menus.backend.access.clothes.edit'), route('admin.auth.donation.clothes.edit', $id));
});
