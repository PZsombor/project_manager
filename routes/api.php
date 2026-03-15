<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CommitsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\RepositoriesController;
use App\Http\Controllers\UsersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('users', UsersController::class);
Route::resource('repositories', RepositoriesController::class);
Route::resource('branches', BranchesController::class);
Route::resource('commits', CommitsController::class);
Route::resource('files', FilesController::class);