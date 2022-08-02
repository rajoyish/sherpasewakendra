<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home.executive-committee');
});

Route::get('/executive-committee', [HomeController::class, 'executiveCommittee'])->name('executive-committee');
Route::get('/staffs', [HomeController::class, 'staffs'])->name('staffs');
Route::get('/advisors', [HomeController::class, 'advisors'])->name('advisors');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
