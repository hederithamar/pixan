<?php

Breadcrumbs::register('admin.auth.donation.babies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.babies.management'), route('admin.auth.donation.babies.index'));
});

Breadcrumbs::register('admin.auth.donation.babies.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.babies.index');
    $breadcrumbs->push(__('menus.backend.access.babies.deleted'), route('admin.auth.donation.babies.deleted'));
});

Breadcrumbs::register('admin.auth.donation.babies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.babies.index');
    $breadcrumbs->push(__('labels.backend.access.babies.create'), route('admin.auth.donation.babies.create'));
});

Breadcrumbs::register('admin.auth.donation.babies.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.babies.index');
    $breadcrumbs->push(__('menus.backend.access.babies.view'), route('admin.auth.donation.babies.show', $id));
});

Breadcrumbs::register('admin.auth.donation.babies.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.babies.index');
    $breadcrumbs->push(__('menus.backend.access.babies.edit'), route('admin.auth.donation.babies.edit', $id));
});
