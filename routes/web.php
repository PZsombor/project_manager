<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CommitsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\RepositoriesController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});


