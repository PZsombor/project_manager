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

//users
Route::get('users', [UsersController::class, 'index']);
Route::post('users', [UsersController::class, 'store']);
Route::get('users/{id}', [UsersController::class, 'show']);
Route::put('users/{id}', [UsersController::class, 'update']);
Route::delete('users/{id}', [UsersController::class, 'destroy']);

Route::get('repositories', [RepositoriesController::class, 'index']);
Route::post('repositories', [RepositoriesController::class, 'store']);
Route::get('repositories/{id}', [RepositoriesController::class, 'show']);
Route::put('repositories/{id}', [RepositoriesController::class, 'update']);
Route::delete('repositories/{id}', [RepositoriesController::class, 'destroy']);

Route::get('branches', [BranchesController::class, 'index']);
Route::post('branches', [BranchesController::class, 'store']);
Route::get('branches/{id}', [BranchesController::class, 'show']);
Route::put('branches/{id}', [BranchesController::class, 'update']);
Route::delete('branches/{id}', [BranchesController::class, 'destroy']);

Route::get('commits', [CommitsController::class, 'index']);
Route::post('commits', [CommitsController::class, 'store']);
Route::get('commits/{id}', [CommitsController::class, 'show']);
Route::put('commits/{id}', [CommitsController::class, 'update']);
Route::delete('commits/{id}', [CommitsController::class, 'destroy']);

Route::get('files', [FilesController::class, 'index']);
Route::post('files', [FilesController::class, 'store']);
Route::get('files/{id}', [FilesController::class, 'show']);
Route::put('files/{id}', [FilesController::class, 'update']);
Route::delete('files/{id}', [FilesController::class, 'destroy']);