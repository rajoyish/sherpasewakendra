<?php

use App\Http\Controllers\Admin\DharmashalaBookingController as AdminDharmashalaBookingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\RoomController;
use App\Http\Controllers\User\DharmashalaBookingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [RoomController::class, 'index']);

//Route::resource('users', UserController::class)
//    ->only(['index', 'store', 'edit', 'update', 'destroy'])
//    ->middleware(['is_admin']);

// HOME
Route::get('/executive-committee', [HomeController::class, 'executiveCommittee'])->name('executive-committee');
Route::get('/staffs', [HomeController::class, 'staffs'])->name('staffs');
Route::get('/advisors', [HomeController::class, 'advisors'])->name('advisors');

//ROOMS
//Route::get('/dharmashala', [RoomController::class, 'index'])->name('dharmashala');

Route::middleware(['auth', 'role:1'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::resource('/users', UserController::class)
            ->only(['show', 'edit', 'update']);
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');
    });

Route::get('/dharmashala/rooms', [RoomController::class, 'index'])->name('rooms');

Route::middleware(['auth', 'role:1'])
    ->prefix('dharmashala')
    ->name('dharmashala.')
    ->group(function () {
        Route::resource('/rooms', RoomController::class)->only(['show']);
    });

Route::middleware(['auth', 'role:1'])
    ->prefix('dharmashala')
    ->name('dharmashala.')
    ->group(function () {
        Route::resource('/bookings', DharmashalaBookingController::class)
            ->only(['create', 'store']);
    });

Route::middleware(['auth', 'role:2'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('/users', AdminUserController::class)
            ->only(['index', 'show', 'edit', 'update', 'destroy']);

        Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');

        Route::resource('/dharmashala/bookings', AdminDharmashalaBookingController::class)
            ->only(['index', 'edit', 'update', 'destroy']);
    });

require __DIR__.'/auth.php';
