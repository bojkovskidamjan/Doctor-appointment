<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
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

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/new-appointment/{doctorId}/{date}', [FrontendController::class, 'show'])->name('create.appointment');


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
    Route::resource('department', 'App\Http\Controllers\DepartmentController');
});

Route::group(['middleware' => ['auth', 'doctor']], function () {
    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::post('/check', 'App\Http\Controllers\AppointmentController@check')->name('appointment.check');
        Route::post('/update', 'App\Http\Controllers\AppointmentController@updateTime')->name('update');
    });

    Route::get('/patient-today', [PrescriptionController::class, 'index'])->name('patients.today');
    Route::post('/prescription', [PrescriptionController::class, 'store'])->name('prescription');
    Route::get('/prescription/{userId}/{date}', [PrescriptionController::class, 'show'])->name('prescription.show');
    Route::get('/prescribed-patients}', [PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');
});

Route::group(['middleware' => ['auth', 'admin_or_doctor']], function () {
    Route::get('/patients', [PatientListController::class, 'index'])->name('patients.index');
    Route::get('/patients/all', [PatientListController::class, 'allTimeAppointments'])->name('patients.all.appointments');
    Route::get('/status/update/{id}', [PatientListController::class, 'toggleStatus'])->name('patients.update.status');
});

Route::group(['middleware' => ['auth', 'patient']], function () {
    Route::post('/book/appointment', [FrontendController::class, 'store'])->name('booking.appointment');
    Route::get('/my-booking', [FrontendController::class, 'myBookings'])->name('my.booking');
    Route::get('/user-profile', [ProfileController::class, 'index'])->name('profile');;
    Route::post('/user-profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile-pic', [ProfileController::class, 'profilePic'])->name('profile.pic');
    Route::get('/my-prescription', [FrontendController::class, 'myPrescription'])->name('my.prescription');
});

