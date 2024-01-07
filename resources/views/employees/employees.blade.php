@extends('layouts.main')
@section('content')

@include('employees.addEmployeeModal')
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
        <div class="col-md-12">
            <div class="mb-3">
                <form method="GET" action="{{ route('employees.filter') }}">
                    <label for="status-filter" class="form-label">Status</label>
                    <select id="status-filter" name="filter" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>

                    <label for="privilege-filter" class="form-label">Privilege</label>
                    <select id="privilege-filter">
                        <option value="">All</option>
                        <option value="Admin">Admin</option>
                        <option value="Records Officer">Records Officer</option>
                        <option value="Employee">Employee</option>
                    </select>
                </form>
            </div>
                <table id="employee-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>

<script>
    $(document).ready(function() {
    var userStatus = $('#status-filter').val();
    var userPrivilege = $('#privilege-filter').val();

    function loadTable() {
        $('#employee-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/employees/datatables?user_status=' + userStatus + '&privilege=' + userPrivilege,
            columns: [
                { data: 'user_id', name: 'user_id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return '<button class="btn btn-primary btn-sm" onclick="editEmployee(' + data.user_id + ')"><i class="fas fa-edit"> Edit </i></button>' +
                            '<button class="btn btn-danger btn-sm" onclick="deactivateEmployee(' + data.user_id + ')"><i class="fas fa-trash"> Deactivate</i></button>';
                    }
                }
            ]
        });
    }

    loadTable();

    // Event listener for filter changes
    $('#status-filter, #privilege-filter').change(function() {
        userStatus = $('#status-filter').val();
        userPrivilege = $('#privilege-filter').val();
        console.log('Filters changed to: status=' + userStatus + ', privilege=' + userPrivilege);
        $('#employee-table').DataTable().destroy();
        loadTable();
    });

    function editEmployee(userId) {
        $.get('/employees/' + userId + '/edit', function(data) {
            // Populate the fields in your edit modal with the data
            $('#editEmployeeModal #employeeName').val(data.name);
            $('#editEmployeeModal #employeeEmail').val(data.email);
            // Show the modal
            $('#editEmployeeModal').modal('show');
        });
    }

    function deactivateEmployee(userId) {
        $.post('/employees/' + userId + '/deactivate', function(data) {
            // If the request was successful, reload the table
            if (data.success) {
                $('#employee-table').DataTable().ajax.reload();
            }
        });
    }
});
</script>
@endsection
