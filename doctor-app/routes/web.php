<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [FrontendController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/new-appointment/{doctorId}/{date}', [FrontendController::class, 'show'])->name('create.appointment');

Route::post('/book/appointment', [FrontendController::class, 'store'])->name('booking.appointment')->middleware('auth');

Route::get('/my-booking', [FrontendController::class, 'myBookings'])->name('my.booking')->middleware('auth');


Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::group(['prefix' => 'doctors'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');
        Route::get('/show/{id}', [DoctorController::class, 'show'])->name('doctors.show');
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
        Route::post('/update/{id}', [DoctorController::class, 'update'])->name('doctors.update');

        Route::post('/store', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('/create', [DoctorController::class, 'create'])->name('doctors.create');
        Route::delete('/delete/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
    });

});
Route::group(['middleware' => ['auth', 'doctor']], function (){

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/create', [AppointmentController::class,'create'])->name('appointment.create');
        Route::post('/store', [AppointmentController::class,'store'])->name('appointment.store');
        Route::post('/check', 'App\Http\Controllers\AppointmentController@check')->name('appointment.check');
        Route::post('/update', 'App\Http\Controllers\AppointmentController@updateTime')->name('update');
    });

 });
