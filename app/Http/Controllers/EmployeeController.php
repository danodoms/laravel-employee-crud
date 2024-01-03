<?php

namespace App\Http\Controllers;

use App\Models\EmployeeView;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // $users = $this->getActiveUsers();
        // return view('employees.employees', compact('users'));
    }

    public function getActiveUsers()
    {
        $userModel = new User();
        return $userModel->getUsers();
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

        $query = DB::table('employee_view');

        if ($status !== null) {
            $query->where('user_status', $status);
        }

        return DataTables::of($query)->make(true);
    }

    // Add other methods for CRUD operations (create, store, edit, update, delete) here
}