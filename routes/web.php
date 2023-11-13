<?php

use App\Http\Controllers\TravelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReserveController;
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
    return view('welcome');
})->name('welcome');


Route::get('/login', [App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class,'store']);
Route::post('/logout',[App\Http\Controllers\LogoutController::class,'index'])->name('logout');
Route::get('/reserveTickets',[App\Http\Controllers\TicketsController::class,'index'])->name('reserveTickets');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UsuarioController::class, 'dashboardIndex'])->name('dashboard');
    Route::get('/add/travel',[TravelController::class,'indexAddTravels'])->name('travels.index');
    Route::post('/addtravel',[TravelController::class,'travelCheck'])->name('travel.check');
    Route::get('/result/travels',[TravelController::class,'indexTravels'])->name('travelsAdd.index');
    Route::get('/search/Reserve',[App\Http\Controllers\ReserveController::class,'index'])->name('searchReserve.index');
    Route::get('/searchReserve',[ReserveController::class,'check'])->name('searchCheck');

});
