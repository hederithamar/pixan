<?php

Breadcrumbs::register('admin.auth.donation.furniture.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.furniture.management'), route('admin.auth.donation.furniture.index'));
});

Breadcrumbs::register('admin.auth.donation.furniture.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.furniture.index');
    $breadcrumbs->push(__('menus.backend.access.furniture.deleted'), route('admin.auth.donation.furniture.deleted'));
});

Breadcrumbs::register('admin.auth.donation.furniture.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.furniture.index');
    $breadcrumbs->push(__('labels.backend.access.furniture.create'), route('admin.auth.donation.furniture.create'));
});

Breadcrumbs::register('admin.auth.donation.furniture.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.furniture.index');
    $breadcrumbs->push(__('menus.backend.access.furniture.view'), route('admin.auth.donation.furniture.show', $id));
});

Breadcrumbs::register('admin.auth.donation.furniture.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.furniture.index');
    $breadcrumbs->push(__('menus.backend.access.furniture.edit'), route('admin.auth.donation.furniture.edit', $id));
});
