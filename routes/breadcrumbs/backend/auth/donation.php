<?php

Breadcrumbs::register('admin.auth.donation.donation.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.donations.management'), route('admin.auth.donation.donation.index'));
});

Breadcrumbs::register('admin.auth.donation.donation.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.donation.donation.index');
    $breadcrumbs->push(__('menus.backend.access.donations.view'), route('admin.auth.donation.donation.show', $id));
});