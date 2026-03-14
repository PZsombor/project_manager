<?php

use App\Http\Controllers\RepositoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('repositories', RepositoriesController::class);
Route::resource('branches', RepositoriesController::class);
Route::resource('commits', RepositoriesController::class);
Route::resource('files', RepositoriesController::class);
