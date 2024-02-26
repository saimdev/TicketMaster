<?php

use App\Http\Controllers\AddEvent;
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
