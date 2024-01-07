<?php

namespace App\Http\Controllers;

use App\Models\EmployeeView;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $users = EmployeeView::all();
        //log the users
        Log::info($users);
        return view('employees.employees', compact('users'));
    }


    public function filter(Request $request){
        $filterValue = $request->get('filter', '1');
        $users = User::where('user_status', $filterValue)->get();
        return view('employees.employees', compact('users'));
    }

    // public function datatables()
    // {
    //     $users = EmployeeView::select(['user_id', 'name', 'email']); // Changed 'user_id' to 'id'
    //     return DataTables::of($users)->make(true);
    // }
    

    public function datatables(Request $request)
    {
        $status = $request->query('user_status');
        $privilege = $request->query('privilege');

        $query = DB::table('employee_view');

        if ($status !== null) {
            $query->where('user_status', $status);
        }

        if ($privilege !== null) {
            $query->where('privilege', $privilege);
        }

        return Datatables::of($query)->make(true);
    }


    public function edit($user_id)
    {
        $user = User::find($user_id);
        return $user;

        //log the user
        Log::info($user);
    }

    public function deactivate($id)
    {
        $employee = User::find($id);
        $employee->active = false;
        $employee->save();
        // Return a success message
        return response()->json(['success' => 'Employee deactivated successfully']);
    }

    public function addEmployee(Request $request)
    {
        Log::info(json_encode($request->all()));
        $employee = new User();
        $employee->user_fname = $request->get('employeeFirstName');
        $employee->user_mname = $request->get('employeeMiddleName');
        $employee->user_lname = $request->get('employeeLastName');
        $employee->email = $request->get('employeeEmail');
        $employee->privilege = "";
        $employee->password = "";
        $employee->save();

        // Return a success message
        return redirect('/employees');
        //return success not in json
        // return "Employee added successfully";

    }
    
}