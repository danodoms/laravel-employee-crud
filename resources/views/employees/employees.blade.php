<!DOCTYPE html>
<html>
<head>
    <title>Employee CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
    
    <style>
        .border-red {
            /* border: 1px solid red; */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row border-red">
            <div class="col-md-6">
                <h1 class="text-2xl font-bold">Employee</h1>
            </div>
            <div class="col-md-6 text-right">  
                <a class="btn btn-primary" href="#">Add Employee</a>
                <a class="btn btn-secondary" href="#">Delete Employee</a> <!-- New button -->
            </div>
        </div>
        <div class="row border-red">
            <div class="col-md-12">
                <div class="mb-3">
                    <form method="GET" action="{{ route('employees.filter') }}">
                        <label for="filter" class="form-label">Filter by:</label>
                        <select id="status-filter" name="filter" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </form>
                </div>
                    <table id="employee-table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                <!-- <table id="employee-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    

    <script>
        $(document).ready(function() {
        var userStatus = $('#status-filter').val();

        $('#employee-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/employees/datatables?user_status=' + userStatus,
            columns: [
                { data: 'user_id', name: 'user_id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' }
            ]
        });

        $('#status-filter').change(function() {
            userStatus = $(this).val();
            console.log('Status Filter changed to: ' + userStatus);
            $('#employee-table').DataTable().ajax.url('/employees/datatables?user_status=' + userStatus).load();
        });
    });
    </script>

</body>
</html>