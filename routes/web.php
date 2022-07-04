<?php

use App\Http\Controllers\BetRecordController;
use App\Http\Controllers\CustomUserController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\RequestFinanceController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('custom-users', [CustomUserController::class, 'index'])->name('custom_users.index');
Route::get('status/{id}', [CustomUserController::class, 'status'])->name('custom_users.status');

Route::get('custom-users/withdraw/{custom_user}', [CustomUserController::class, 'withdraw'])->name('custom_users.withdraw');
Route::put('custom-users/withdraw/{custom_user}', [CustomUserController::class, 'withdrawupdate'])->name('custom_users.withdrawupdate');


Route::get('custom-users/charge/{custom_user}', [CustomUserController::class, 'charge'])->name('custom_users.charge');
Route::put('custom-users/charge/{custom_user}', [CustomUserController::class, 'chargeupdate'])->name('custom_users.chargeupdate');



Route::get('finances',[FinanceController::class,'index'])->name('finances.index');

Route::get('betrecords',[BetRecordController::class,'index'])->name('betrecords.index');

Route::get('request_finance/pending',[RequestFinanceController::class,'pending'])->name('request_finances.pending');
Route::get('request_finance/finish',[RequestFinanceController::class,'finish'])->name('request_finances.finish');
Route::get('request_finance/bot_charge/{id}',[RequestFinanceController::class,'charge'])->name('request_finances.charge');
Route::get('request_finance/bot_draw/{id}',[RequestFinanceController::class,'draw'])->name('request_finances.draw');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
