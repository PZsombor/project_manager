<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CommitsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\RepositoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('repositories', RepositoriesController::class);
Route::resource('branches', BranchesController::class);
Route::resource('commits', CommitsController::class);
Route::resource('files', FilesController::class);
