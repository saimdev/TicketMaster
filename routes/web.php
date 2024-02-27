<?php

use App\Http\Controllers\Accounts;
use App\Http\Controllers\AddEvent;
use App\Http\Controllers\PaymentGateway;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventInfo;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EventInfo::class, 'getEvents']);
Route::get('/saveEvents', [AddEvent::class, 'saveEvents']);
Route::get('/newEvents', [EventInfo::class, 'getNewEvents']);

Route::get('/addAccount', [Accounts::class, 'showAccount']);
Route::post('/accountAdd', [Accounts::class, 'addAccount']);
Route::get('/accounts', [Accounts::class, 'showAllAccount']);

Route::post('/submit-credentials', [PaymentGateway::class, 'payment']);


