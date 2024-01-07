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

Route::resource('/employees', 'App\Http\Controllers\EmployeeController');

Route::get('/employees', [EmployeeController::class, 'index']);

Route::get('/employees/filter', [EmployeeController::class, 'filter']);

Route::get('/employees/datatables', 'App\Http\Controllers\EmployeeController@datatables');

Route::get('/employees/add', function () {
    return view('employees/addEmployeeModal');
});


Route::get('/employees/edit/{user_id}', [EmployeeController::class, 'edit']);
Route::put('/employees/update/{user_id}', [EmployeeController::class, 'update']);

Route::post('/employees/deactivate/{user}', 'EmployeeController@deactivate')->name('employees.deactivate');



Route::post('/addEmployee', [EmployeeController::class, 'addEmployee']);

// Route::post('/editEmployee', [EmployeeController::class, 'addEmployee']);

