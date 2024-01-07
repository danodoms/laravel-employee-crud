<!-- Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form here -->
                
                <form method="POST" action="/editEmployee/{{ $employee->id }}">
                    @csrf

                    <div class="form-group">
                        <label for="employeeFirstName">First Name</label>
                        <input type="text" class="form-control" name="employeeFirstName" placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                        <label for="employeeMiddleName">Middle Name</label>
                        <input type="text" class="form-control" name="employeeMiddleName" placeholder="Enter Middle Name">
                    </div>

                    <div class="form-group">
                        <label for="employeeLastName">Last Name</label>
                        <input type="text" class="form-control" name="employeeLastName" placeholder="Enter Last Name">
                    </div>

                    <div class="form-group">
                        <label for="employeeEmail">Email</label>
                        <input type="email" class="form-control" name="employeeEmail" placeholder="Enter email">
                    </div>


                    <!-- Add more inputs as needed -->
                    <div class="modal-footer">
                        <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
