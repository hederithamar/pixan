<?php

Breadcrumbs::register('admin.auth.donation.toys.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.toys.management'), route('admin.auth.donation.toys.index'));
});

Breadcrumbs::register('admin.auth.donation.toys.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.toys.index');
    $breadcrumbs->push(__('menus.backend.access.toys.deleted'), route('admin.auth.donation.toys.deleted'));
});

Breadcrumbs::register('admin.auth.donation.toys.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.toys.index');
    $breadcrumbs->push(__('labels.backend.access.toys.create'), route('admin.auth.donation.toys.create'));
});

Breadcrumbs::register('admin.auth.donation.toys.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.toys.index');
    $breadcrumbs->push(__('menus.backend.access.toys.view'), route('admin.auth.donation.toys.show', $id));
});

Breadcrumbs::register('admin.auth.donation.toys.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.toys.index');
    $breadcrumbs->push(__('menus.backend.access.toys.edit'), route('admin.auth.donation.toys.edit', $id));
});
