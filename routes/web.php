<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])->name('top-projects');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth','is.admin']], function () {
    Route::get('/projects/create', [ProjectController::class, 'showCreate'])->name('projects.show-create');
    Route::get('/projects/list', [ProjectController::class, 'listAll'])->name('projects.list');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
});
