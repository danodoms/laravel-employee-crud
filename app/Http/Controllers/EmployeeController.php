<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        
        $activeUsers = $this->getActiveUsers();
        return view('employees.employees', compact('users', 'activeUsers'));
    }

    public function getActiveUsers()
    {
        $userModel = new User();
        return $userModel->getUsers();
    }

    public function filter(Request $request){
        //create code that filters the data from the database based on the status
        $filterValue = $request->get('filter', '1');
        $users = User::where('user_status', $filterValue)->get();
        return view('employees.employees', compact('users'));
    }

    public function datatables()
{
    $users = User::select(['id', 'name', 'email']);
    return Datatables::of($users)->make(true);
}

    // Add other methods for CRUD operations (create, store, edit, update, delete) here
}