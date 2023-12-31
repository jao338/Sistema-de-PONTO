<?php

use App\Http\Controllers\HourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', [HourController::class, 'index'])->middleware('auth')->name("dashboard");
Route::post('/dashboard/register', [HourController::class, 'register'])->middleware('auth')->name("dashboard-register");
Route::get('/dashboard/search', [HourController::class, 'search'])->middleware(['auth', 'verified'])->name('dashboard-hours-search');

Route::post('/users/profile/export', [HourController::class, 'export'])->middleware(['auth', 'verified'])->name('dashboard-users-export');
Route::get('/dashboard/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard-users');
Route::get('/dashboard/users/create', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard-users-create');
Route::post('/dashboard/users/create', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard-users-create');
Route::post('/dashboard/users/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard-users-edit');
Route::put('/dashboard/users/{id}', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard-users-update');
Route::get('/dashboard/users/search', [UserController::class, 'search'])->middleware(['auth', 'verified'])->name('dashboard-users-search');
Route::get('/dashboard/users/{id}', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard-users-show');
Route::get('/dashboard/users/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard-users-edit');
Route::delete('/dashboard/users/destroy/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard-users-destroy');

Route::get('/dashboard/sectors', [SectorController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard-sectors');
Route::get('/dashboard/sectors/search', [SectorController::class, 'search'])->middleware(['auth', 'verified'])->name('dashboard-sectors-search');
Route::get('/dashboard/sectors/create', [SectorController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard-sectors-create');
Route::post('/dashboard/sectors/create', [SectorController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard-sectors-create');
Route::get('/dashboard/sectors/{id}', [SectorController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard-sectors-show');
Route::get('/dashboard/sectors/edit/{id}', [SectorController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard-sectors-edit');
Route::put('/dashboard/sectors/{id}', [SectorController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard-sectors-update');
Route::delete('/dashboard/sectors/destroy/{id}', [SectorController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard-sectors-destroy');

Route::middleware('auth')->group(function () {
    Route::get('/users/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
