<?php

use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LotteryController;
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

Route::get('/', [LotteryController::class, 'guestIndex'])->name('index');

Route::controller(LoginController::class)->prefix('/')->group(function() {
    Route::post('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::middleware('auth')->get('/home', 'home')->name('home');
    Route::middleware('auth')->get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->controller(LotteryController::class)->prefix('/lotteries')->group(function() {
    Route::get('/', 'index')->name('showLotteries');
    Route::post('/create', 'create')->name('createLottery');
    Route::patch('/deactivate', 'deactivate')->name('deactivateLottery');
});

Route::controller(CompetitorController::class)->prefix('/competiitors')->group(function() {
    Route::middleware('auth')->get('/', 'index')->name('showCompetitors');
    Route::post('/create', 'create')->name('createCompetitor');
});
