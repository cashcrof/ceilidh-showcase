<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
Route::get('/about', [ProjectController::class, 'about']);
Route::get('/', [ProjectController::class, 'home']);
Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);
Route::get('/register', [RegisterUserController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('/admin/projects/create', [ProjectController::class, 'create']);
Route::post('/admin/projects/create', [ProjectController::class, 'store']);
Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit']);
Route::patch('/admin/projects/{project}/edit', [ProjectController::class, 'update']);
Route::delete('/admin/projects/{project}/delete', [ProjectController::class, 'destroy']);
Route::get('/admin/users/create', [RegisterUserController::class, 'create']);
Route::post('/admin/users/create', [RegisterUserController::class, 'store']);
Route::get('/admin/users/{user}/edit', [RegisterUserController::class, 'edit']);
Route::patch('/admin/users/{user}/edit', [RegisterUserController::class, 'update']);
Route::delete('/admin/users/{user}/delete', [RegisterUserController::class, 'destroy']);
Route::get('/admin/tags/create', [CategoryController::class, 'create']);
Route::post('/admin/tags/create', [CategoryController::class, 'store']);
Route::get('/admin/tags/{category}/edit', [CategoryController::class, 'edit']);
Route::patch('/admin/tags/{category}/edit', [CategoryController::class, 'update']);
Route::delete('/admin/tags/{category}/delete', [CategoryController::class, 'destroy']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/projects/{project}', [AdminController::class, 'show']);
});


Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});

