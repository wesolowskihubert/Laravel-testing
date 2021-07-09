<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MakeTransferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransferHistoryController;
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
    return view('auth/login');
});

/*Route::get('/', function () {
    return view('adminLte/dashboard');
});*/

Auth::routes();

//Routing strony domowej
Route::get('/home', [HomeController::class, 'index'])->name('adminLte/dashboard');

//Routing wylogowania
Route::get('logout', [HomeController::class, 'logout']);

//Routing strony kontaktowej
Route::get('contact',[ContactController::class, 'index']);

//Routing wykonaywania przelewów
Route::get('makeTransfer',[MakeTransferController::class, 'index']);
Route::post('postTransfer', [MakeTransferController::class, 'makeTransfer']);

//Routing historii transakcji
Route::get('inTransferHistory', [TransferHistoryController::class, 'inTransfer']);
Route::get('outTransferHistory', [TransferHistoryController::class, 'outTransfer']);

//Routing edycji profilu
Route::get('profile', [ProfileController::class, 'index']);
Route::post('changeAddress', [ProfileController::class, 'changeAddress']);
Route::post('changePhoneNumber', [ProfileController::class, 'changePhoneNumber']);
Route::post('changePassword', [ProfileController::class, 'changePassword']);
Route::post('deleteAccount', [ProfileController::class, 'deleteAccount']);

//Routing brania i spłacania pożyczki
Route::get('takeCredit', [CreditController::class, 'index']);
Route::get('refundCredit', [CreditController::class, 'index2']);
Route::post('creditTake', [CreditController::class, 'takeCredit']);
Route::post('refundCredit', [CreditController::class, 'refundCredit']);

//Routing wyświetlania stron numeru konta oraz karty kredytowej
Route::get('creditCard', function ()
{
    return view('sites/creditCard');
});
Route::get('bankNumber', function ()
{
    return view('sites/bankNumber');
});

Route::get('test', [\App\Http\Controllers\TEST::class, 'index']);
