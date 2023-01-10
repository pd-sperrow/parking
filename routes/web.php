<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(["register"=>false]);

Route::middleware('auth')->group(function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('users', AdminController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('vehicles', VehicleController::class);

    Route::resource('slots', SlotController::class);

    Route::resource('parks', ParkController::class);
    Route::get('parks/history', 'ParkController@history')->name('parks.history');
});
