<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('doctor', 'Admin\DoctorController')->except('store', 'update', 'destroy');

Route::resource('patient', 'Admin\PatientController')->except('store', 'update', 'destroy');

Route::resource('appointment', 'Admin\AppointmentController')->except('store', 'update', 'destroy');

Route::resource('service', 'Admin\ServiceController')->except('store', 'update', 'destroy');

Route::resource('operation', 'Admin\OperationController')->except('store', 'update', 'destroy');

Route::resource('medicine', 'Admin\MedicineController')->except('store', 'update', 'destroy');

Route::resource('prescription', 'Admin\PrescriptionController')->except('store', 'update', 'destroy');

Route::resource('entry', 'Admin\EntryController')->except('store', 'update', 'destroy');

Route::resource('material', 'Admin\MaterialController')->except('store', 'update', 'destroy');

Route::resource('expense', 'Admin\ExpenseController')->except('store', 'update', 'destroy');

Route::resource('employee', 'Admin\EmployeeController')->except('store', 'update', 'destroy');
