<?php

use App\Http\Controllers\HourController;
use App\Http\Controllers\ProfileController;
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
Route::get('/dashboard/{hour}', [HourController::class, 'teste'])->middleware('auth');

Route::get('/dashboard/users', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard-users');

Route::get('/dashboard/sectors', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard-sectors');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';