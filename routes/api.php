<?php

use Illuminate\Http\Request;
//  V2
 use App\Http\Controllers\V2\AuthController;
 use App\Http\Controllers\V2\CollaboratorsController;
 use App\Http\Controllers\V2\BranchesController;
 use App\Http\Controllers\V2\CommitsController;
 use App\Http\Controllers\V2\FilesController;
 use App\Http\Controllers\V2\RepositoriesController;
 use App\Http\Controllers\V2\UsersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
** User signup/login and logout **
*/
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

/*
** Authenticated routes **
*/
Route::middleware('auth:sanctum')->group( function(){
    // Profile and settings
    

    // Users table
    Route::prefix('users')->group( function(){
        Route::get('/profile', [UsersController::class, 'profile']);
        Route::get('/', [UsersController::class, 'index']);
        Route::post('/', [UsersController::class, 'store']);
        Route::get('/{id}', [UsersController::class, 'show']);
        Route::put('/{id}', [UsersController::class, 'update']);
        Route::delete('/{id}', [UsersController::class, 'destroy']);
    });

    // Collaborators table
    Route::prefix('collaborators')->group( function(){
        Route::get('/', [CollaboratorsController::class, 'index']);
        Route::post('/', [CollaboratorsController::class, 'store']);
        Route::get('/{id}', [CollaboratorsController::class, 'show']);
        Route::put('/{id}', [CollaboratorsController::class, 'update']);
        Route::delete('/{id}', [CollaboratorsController::class, 'destroy']);
    });

    // Repositories table
    Route::prefix('repositories')->group( function(){
        Route::get('/', [RepositoriesController::class, 'index']);
        Route::get('/', [RepositoriesController::class, 'index']);
        Route::post('/', [RepositoriesController::class, 'store']);
        Route::get('/{id}', [RepositoriesController::class, 'show']);
        Route::put('/{id}', [RepositoriesController::class, 'update']);
        Route::delete('/{id}', [RepositoriesController::class, 'destroy']);
    });

    // Branches table
    Route::prefix('branches')->group( function(){
        Route::get('/', [BranchesController::class, 'index']);
        Route::post('/', [BranchesController::class, 'store']);
        Route::get('/{id}', [BranchesController::class, 'show']);
        Route::put('/{id}', [BranchesController::class, 'update']);
        Route::delete('/{id}', [BranchesController::class, 'destroy']);
    });

    // Commits table
    Route::prefix('commits')->group( function(){
        Route::get('/', [CommitsController::class, 'index']);
        Route::post('/', [CommitsController::class, 'store']);
        Route::get('/{id}', [CommitsController::class, 'show']);
        Route::put('/{id}', [CommitsController::class, 'update']);
        Route::delete('/{id}', [CommitsController::class, 'destroy']);
    });

    // Files table
    Route::prefix('files')->group( function(){
        Route::get('/', [FilesController::class, 'index']);
        Route::post('/', [FilesController::class, 'store']);
        Route::get('/{id}', [FilesController::class, 'show']);
        Route::put('/{id}', [FilesController::class, 'update']);
        Route::delete('/{id}', [FilesController::class, 'destroy']);
    });
});    





