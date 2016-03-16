<?php

// Dashboard
Breadcrumbs::register('dashboard.index', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard.index'));
});

// Customers
Breadcrumbs::register('customers.index', function($breadcrumbs){
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Customers', route('customers.index'));
});