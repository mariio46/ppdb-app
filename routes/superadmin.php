<?php

use App\Http\Controllers\HasRole\Superadmin\RoleController;
use Illuminate\Support\Facades\Route;

Route::controller(RoleController::class)->group(function () {
    Route::get('roles', 'index')->name('roles.index');
    Route::get('roles/create', 'create')->name('roles.create');
    Route::get('roles/{identifier}', 'edit')->name('roles.edit');
});
