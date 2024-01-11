<?php

use App\Http\Controllers\HasRole\Superadmin\PermissionController;
use App\Http\Controllers\HasRole\Superadmin\RoleController;
use Illuminate\Support\Facades\Route;

Route::controller(RoleController::class)->group(function () {
    Route::get('roles', 'index')->name('roles.index');
    Route::get('roles/create', 'create')->name('roles.create');
    Route::get('roles/{id}', 'edit')->name('roles.edit');

    Route::get('roles/json/roles', 'roles');
    Route::get('roles/json/permissions', 'permissions');
    Route::get('roles/json/roles/{id}', 'role');
});

Route::controller(PermissionController::class)->group(function () {
    Route::get('permissions', 'index')->name('permissions.index');
    Route::get('permissions/create', 'create')->name('permissions.create');
    Route::get('permissions/edit/{id}', 'edit')->name('permissions.edit');

    Route::get('permissions/json/permissions', 'permissions');
    Route::get('permissions/json/permission/{id}', 'permission');
});
