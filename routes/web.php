<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\BookingController as UserBookingController;
use App\Http\Controllers\user\ComplaintController as UserComplaintController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\RoomController as UserRoomController;
use App\Http\Controllers\user\UserController as UserUserController;
use App\Http\Controllers\UserController;

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
Route::redirect('/login', '/')->name('login');

Route::get('/', function () {
    return view('auth.login');
});


//proses log masuk dll
Route::resource('/', LoginController::class);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

//hanya untuk akses admin
Route::group(['middleware' => ['auth', 'UserOrAdmin:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/room', RoomController::class);
    Route::resource('/booking', BookingController::class);
    Route::resource('/complaint', ComplaintController::class);
    Route::resource('/users', UserController::class);

});

//hanya untuk akses user
Route::group(['middleware' => ['auth', 'UserOrAdmin:user'], 'prefix' => 'user'], function () {
    Route::get('/', [UserDashboardController::class, 'index']);
    Route::resource('/rooms', UserRoomController::class);
    Route::resource('/bookings', UserBookingController::class);
    Route::resource('/complaints', UserComplaintController::class);
    Route::resource('/user', UserUserController::class);
});
