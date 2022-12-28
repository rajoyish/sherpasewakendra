<?php

use App\Http\Controllers\Admin\DharmashalaBookingController as AdminDharmashalaBookingController;
use App\Http\Controllers\Admin\InvoiceController;
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

Route::get('/', [HomeController::class, 'index']);

// HOME
Route::get('/executive-committee', [HomeController::class, 'executiveCommittee'])->name('executive-committee');
Route::get('/staffs', [HomeController::class, 'staffs'])->name('staffs');
Route::get('/advisors', [HomeController::class, 'advisors'])->name('advisors');

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
            ->only(['index', 'create', 'store', 'edit', 'update']);
    });

Route::middleware(['auth', 'role:2'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('/users', AdminUserController::class)
            ->only(['index', 'show', 'edit', 'update', 'destroy']);

        Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');

        Route::resource('/dharmashala/bookings', AdminDharmashalaBookingController::class)
            ->only(['index', 'show', 'edit', 'update', 'destroy']);

        Route::resource('/dharmashala/bookings/invoices', InvoiceController::class);
    });

require __DIR__.'/auth.php';
