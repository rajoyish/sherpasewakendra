<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;

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

Route::get('/executive-committee', [HomeController::class, 'executiveCommittee'])->name('executive-committee');
Route::get('/staffs', [HomeController::class, 'staffs'])->name('staffs');
Route::get('/advisors', [HomeController::class, 'advisors'])->name('advisors');

//ROOMS
Route::get('/dharmashala', [RoomController::class, 'index'])->name('dharmashala');
// Route::get('/dharmashala', [RoomController::class, 'index'])->name('dharmashala')->middleware('is_admin');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('users', UserController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['is_admin']);

require __DIR__ . '/auth.php';
