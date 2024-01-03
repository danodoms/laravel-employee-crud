<!DOCTYPE html>
<html>
<head>
    <title>Employee CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <select id="filter" name="filter" class="form-select" onchange="this.form.submit()">
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
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <!-- <td>{{ $user->status }}</td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <script>
        document.getElementById('filter').addEventListener('change', function() {
            var filterValue = this.value;
            var rows = document.querySelectorAll('#employee-table tbody tr');

            rows.forEach(function(row) {
                var status = row.dataset.status;
                var isActive = status === filterValue;
                row.style.display = isActive ? 'table-row' : 'none';
            });
        });
    </script> -->
</body>
</html>