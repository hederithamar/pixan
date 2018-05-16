<?php

Breadcrumbs::register('admin.auth.donation.service.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.services.management'), route('admin.auth.donation.service.index'));
});

Breadcrumbs::register('admin.auth.donation.service.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.service.index');
    $breadcrumbs->push(__('menus.backend.access.services.view'), route('admin.auth.donation.service.show', $id));
});