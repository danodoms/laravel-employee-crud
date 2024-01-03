<?php

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


// Route::get('/employees', function () {
//     return view('employees/employees');
// });

Route::get('/employees', 'App\Http\Controllers\EmployeeController@index');

Route::get('/employees', 'App\Http\Controllers\EmployeeController@filter')->name('employees.filter');

Route::get('/employees/datatables', 'App\Http\Controllers\EmployeeController@datatables');