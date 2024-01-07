@extends('layouts.main')
@section('content')


<div class="container">

    <div class="row border-red">
        <div class="col-md-6">
            <h1 class="text-2xl font-bold">Employee</h1>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">  
            <h2 class="btn btn-primary btn-lg text-center" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add Employee</h2>
        </div>
    </div>

    <div class="row border-red">
        {{-- <div class="col">
            <form method="GET" action="/employees/filter">
                <label for="status-filter" class="form-label">Status</label>
                <select id="status-filter" name="filter" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <label for="privilege-filter" class="form-label">Privilege</label>
                <select id="privilege-filter">
                    <option value="">All</option>
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>
                    <option value="Records Officer">Records Officer</option>
                    
                </select>
            </form>
        </div> --}}
    </div>
    
    <div class="row border-red">
        <div class="container">
            <table id="employee-table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{-- <a href="/employees/edit/{{ $user->user_id }}" class="fa fa-edit m-2" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"></a> --}}
                            <a href="#" class="edit-user fa fa-edit m-2" data-id="{{ $user->user_id }}"></a>
                            <a href="/employees/deactivate/{{ $user->user_id }}" class="fa fa-trash"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script >
    let table = new DataTable('#employee-table');


    $('.edit-user').click(function() {

        // Get user ID from data attribute
        let userId = $(this).data('id');

        // Make AJAX request to get user data
        $.get('/employees/edit/' + userId, function(user) {
            const form = document.getElementById("editEmployeeForm");
            form.action = "/employees/update/" + userId;

            // Pass user data to modal
            $('#editEmployeeModal').data('user', user);
            $('#editFirstName').val(user.user_fname);
            $('#editMiddleName').val(user.user_mname);
            $('#editLastName').val(user.user_lname);
            $('#editEmail').val(user.email);

            $('#editEmployeeModal').modal('show');
            

            //log the user details
            console.log(user);

        });


        // var editUser; 

        // $.get('/employees/edit/' + userId, function(user) {
        //     // Store user object in variable
        //     editUser = user;  

        //     // Open modal
        //     $('#editEmployeeModal').modal('show');

        //     // Access user data
        //     console.log(editUser);
    });
</script>
@endsection
