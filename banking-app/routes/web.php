<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\TransferController;


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


Route::get('/', [AuthController::class, 'create'])->name('auth.signup');
Route::post('/register/store', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('auth.login');
Route::post('/login/store', [AuthController::class, 'checkLogin'])->name('login.store');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/deposit', [DepositController::class, 'deposit'])->name('deposit');
    Route::post('/deposit/store', [DepositController::class, 'depositSave'])->name('deposit.save');
    Route::get('/withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw');
    Route::post('/withdraw/store', [WithdrawController::class, 'withdrawSave'])->name('withdraw.save');
    Route::get('/transfer', [TransferController::class, 'transfer'])->name('transfer');
    Route::post('/transfer/store', [TransferController::class, 'transferMoney'])->name('transfer.save');
    Route::get('/statement', [TransferController::class, 'showStatement'])->name('statement');


});   




