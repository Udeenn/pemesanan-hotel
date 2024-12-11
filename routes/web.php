<?php

use App\Http\Controllers\MRoomController;
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
    return view('welcome');
});

Route::get('/admin', [MRoomController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/room/create', [MRoomController::class, 'create'])->name('admin.create');
    Route::post('/admin/room', [MRoomController::class, 'store'])->name('admin.store');
    Route::get('/admin/room/{id}/edit', [MRoomController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/room/{id}', [MRoomController::class, 'update'])->name('admin.update');
    Route::delete('/admin/room/{id}', [MRoomController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__.'/auth.php';
