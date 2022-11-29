<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Register', route('register'));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('cabinet', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Cabinet', route('cabinet'));
});

Breadcrumbs::for('password.request', function (BreadcrumbTrail $trail) {
    $trail->parent('login');
    $trail->push('Reset Password', route('password.request'));
});

Breadcrumbs::for('password.reset', function (BreadcrumbTrail $trail) {
    $trail->parent('login');
    $trail->push('Change Password', route('password.reset'));
});

Breadcrumbs::for('verification.notice', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Verify Email', route('verification.notice'));
});


    # Admin

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Admin', route('admin.index'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Create user', route('users.create'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push('Edit user', route('users.edit', $user));
});

    # Roles

Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Create', route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles.index');
    $trail->push('Edit', route('roles.edit', $role));
});


    # Permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Permissions', route('permissions.index'));
});