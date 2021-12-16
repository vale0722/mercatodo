<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UsersController::class, 'index'])
            ->middleware(['auth'])
            ->name('admin.users');