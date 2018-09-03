<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('home'));
});

Breadcrumbs::register('tasks', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tasks', url('tasks'));
});
