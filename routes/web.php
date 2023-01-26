<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index'])->name('top-projects');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'is.admin']], function () {
    Route::prefix('projects')->group(function () {
        Route::get('/create', [ProjectController::class, 'showCreate'])->name('projects.show-create');
        Route::get('{project}/edit', [ProjectController::class, 'showEdit'])->name('projects.show-edit');
        Route::get('/list', [ProjectController::class, 'listAll'])->name('projects.list');
        Route::post('store', [ProjectController::class, 'store'])->name('projects.store');
        Route::put('{project}/update', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('{project}/delete', [ProjectController::class, 'delete'])->name('projects.delete');
    });
});
