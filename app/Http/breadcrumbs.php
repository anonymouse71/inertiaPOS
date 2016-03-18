<?php

// Dashboard
Breadcrumbs::register('dashboard.index', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard.index'));
});

// Customers
Breadcrumbs::register('customers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Customers', route('customers.index'));
});
Breadcrumbs::register('customers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('customers.index');
    $breadcrumbs->push('Create Customer', route('customers.create'));
});
Breadcrumbs::register('customers.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('customers.index');
    $breadcrumbs->push('Edit Customer', route('customers.edit'));
});