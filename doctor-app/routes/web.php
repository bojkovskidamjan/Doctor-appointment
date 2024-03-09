<?php

use App\Http\Controllers\AppointmentController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::group(['prefix' => 'doctors'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');
        Route::get('/show/{id}', [DoctorController::class, 'show'])->name('doctors.show');
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
        Route::post('/update/{id}', [DoctorController::class, 'update'])->name('doctors.update');

        Route::post('/store', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('/create', [DoctorController::class, 'create']);
        Route::delete('/delete/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
    });

});
Route::group(['prefix' => 'appointment'], function () {
    Route::get('/create', [AppointmentController::class,'create']);
});
