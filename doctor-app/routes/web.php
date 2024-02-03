<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/doctor', [DoctorController::class,'create']);

//Route::resource('doctor', 'DoctorController');

Route::group(['prefix' => 'doctors'], function () {
    Route::get('/', [DoctorController::class, 'index']); //site users                OK
    Route::get('/show/{id?}', [DoctorController::class, 'show']);
    Route::get('/edit/{id?}', [DoctorController::class, 'show']);
    Route::post('/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/create', [DoctorController::class, 'create']);
    Route::post('/delete/{id}', [DoctorController::class, 'destroy']);
});

