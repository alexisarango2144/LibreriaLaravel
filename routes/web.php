<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::inertia('/home', 'welcome')->name('home');

Route::get('/', HomeController::class);

Route::get('api/users/{username}', UserController::class . '@show');
    