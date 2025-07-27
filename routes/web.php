<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Redirection selon le rôle
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect('/admin')
        : redirect('/user');
})->middleware('auth');


Route::get('/admin', function () {
    return "Bienvenue Admin ";
})->middleware('auth');

Route::get('/user', function () {
    return "Bienvenue Utilisateur ";
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/user/{id}/tasks', [AdminController::class, 'showUserTasks'])->name('admin.user.tasks');
    Route::post('/admin/assign-task/{user}', [AdminController::class, 'assignTask'])->name('admin.assign.task');

});


Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::post('/user/mark-done/{id}', [UserController::class, 'markDone'])->middleware('auth');