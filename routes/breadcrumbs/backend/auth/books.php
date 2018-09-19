<?php

Breadcrumbs::register('admin.auth.donation.books.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.books.management'), route('admin.auth.donation.books.index'));
});

Breadcrumbs::register('admin.auth.donation.books.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.books.index');
    $breadcrumbs->push(__('menus.backend.access.books.deleted'), route('admin.auth.donation.books.deleted'));
});

Breadcrumbs::register('admin.auth.donation.books.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.donation.books.index');
    $breadcrumbs->push(__('labels.backend.access.books.create'), route('admin.auth.donation.books.create'));
});

Breadcrumbs::register('admin.auth.donation.books.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.books.index');
    $breadcrumbs->push(__('menus.backend.access.books.view'), route('admin.auth.donation.books.show', $id));
});

Breadcrumbs::register('admin.auth.donation.books.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.books.index');
    $breadcrumbs->push(__('menus.backend.access.books.edit'), route('admin.auth.donation.books.edit', $id));
});
