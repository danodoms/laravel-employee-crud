<?php

use App\Http\Controllers\EmployeeController;
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
    return view('layouts.main');
});


// Route::get('/employees', function () {
//     return view('employees/employees');
// });


Route::get('/employees', 'App\Http\Controllers\EmployeeController@filter')->name('employees.filter');

Route::get('/employees/datatables', 'App\Http\Controllers\EmployeeController@datatables');

Route::get('/employees/add', function () {
    return view('employees/addEmployeeModal');
});

Route::get('/employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');

Route::post('/employees/{id}/deactivate', 'EmployeeController@deactivate')->name('employees.deactivate');

// Route::post('/employees', 'EmployeeController@addEmployee')->name('addEmployee');

// Route::post('/addEmployee', [EmployeeController::class, 'addEmployee'])->name('addEmployee');
Route::post('/addEmployee', [EmployeeController::class, 'addEmployee']);