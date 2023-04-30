<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
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

Route::get('/', function () {
    if (auth()->check()) {
        return view('home');
    } else {
        return view('auth.login');
    }

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('clients', ClientController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('reservations', ReservationController::class);
    Route::get('/done/{id}', [ReservationController::class, 'mark'])->name("mark");
    Route::get('/pdf', [ReservationController::class, 'generatePdf'])->name("pdf");
    Route::get('/factures', [ReservationController::class, 'factures'])->name("factures");

});
