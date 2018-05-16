<?php

Breadcrumbs::register('admin.auth.donation.voluntary.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.voluntaries.management'), route('admin.auth.donation.voluntary.index'));
});

Breadcrumbs::register('admin.auth.donation.voluntary.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.voluntary.index');
    $breadcrumbs->push(__('menus.backend.access.voluntaries.view'), route('admin.auth.donation.voluntary.show', $id));
});