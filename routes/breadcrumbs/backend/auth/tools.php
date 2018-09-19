<?php

Breadcrumbs::register('admin.auth.donation.tools.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.tools.management'), route('admin.auth.donation.tools.index'));
});

Breadcrumbs::register('admin.auth.donation.tools.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.tools.index');
    $breadcrumbs->push(__('menus.backend.access.tools.deleted'), route('admin.auth.donation.tools.deleted'));
});

Breadcrumbs::register('admin.auth.donation.tools.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.tools.index');
    $breadcrumbs->push(__('labels.backend.access.tools.create'), route('admin.auth.donation.tools.create'));
});

Breadcrumbs::register('admin.auth.donation.tools.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.tools.index');
    $breadcrumbs->push(__('menus.backend.access.tools.view'), route('admin.auth.donation.tools.show', $id));
});

Breadcrumbs::register('admin.auth.donation.tools.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.tools.index');
    $breadcrumbs->push(__('menus.backend.access.tools.edit'), route('admin.auth.donation.tools.edit', $id));
});
