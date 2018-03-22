<?php

Breadcrumbs::register('admin.auth.product.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.products.management'), route('admin.auth.product.index'));
});

Breadcrumbs::register('admin.auth.product.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.product.index');
    $breadcrumbs->push(__('menus.backend.access.products.deleted'), route('admin.auth.product.deleted'));
});

Breadcrumbs::register('admin.auth.product.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.product.index');
    $breadcrumbs->push(__('labels.backend.access.products.create'), route('admin.auth.product.create'));
});

Breadcrumbs::register('admin.auth.product.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.product.index');
    $breadcrumbs->push(__('menus.backend.access.products.view'), route('admin.auth.product.show', $id));
});

Breadcrumbs::register('admin.auth.product.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.product.index');
    $breadcrumbs->push(__('menus.backend.access.products.edit'), route('admin.auth.product.edit', $id));
});

