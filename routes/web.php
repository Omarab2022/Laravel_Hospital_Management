<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');


Route::get('/add_doctor_view', [AdminController::class, 'addview']);


Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);

Route::get('/show_appointment', [AdminController::class, 'show_appointment']);

Route::get('/approved/{id}', [AdminController::class, 'approved']);


Route::get('/canceled/{id}', [AdminController::class, 'canceled']);


Route::get('/show_doctors', [AdminController::class, 'show_doctors']);

Route::get('/delete/{id}', [AdminController::class, 'delete']);

Route::get('/update/{id}', [AdminController::class, 'update']);


Route::post('/update_doctor/{id}', [AdminController::class, 'update_doctor']);

Route::get('/email/{id}', [AdminController::class, 'email']);


Route::post('/send_email/{id}', [AdminController::class, 'send_email']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
