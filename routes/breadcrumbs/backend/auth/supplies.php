<?php

Breadcrumbs::register('admin.auth.donation.supplies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.supplies.management'), route('admin.auth.donation.supplies.index'));
});

Breadcrumbs::register('admin.auth.donation.supplies.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.supplies.index');
    $breadcrumbs->push(__('menus.backend.access.supplies.deleted'), route('admin.auth.donation.supplies.deleted'));
});

Breadcrumbs::register('admin.auth.donation.supplies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.supplies.index');
    $breadcrumbs->push(__('labels.backend.access.supplies.create'), route('admin.auth.donation.supplies.create'));
});

Breadcrumbs::register('admin.auth.donation.supplies.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.supplies.index');
    $breadcrumbs->push(__('menus.backend.access.supplies.view'), route('admin.auth.donation.supplies.show', $id));
});

Breadcrumbs::register('admin.auth.donation.supplies.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.supplies.index');
    $breadcrumbs->push(__('menus.backend.access.supplies.edit'), route('admin.auth.donation.supplies.edit', $id));
});
