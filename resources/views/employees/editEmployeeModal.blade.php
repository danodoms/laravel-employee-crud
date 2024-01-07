
<!-- Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form method="PUT" action="/employees/update/{{ $user->user_id }}" id="editEmployeeForm">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="employeeFirstName">First Name</label>
                        <input type="text" class="form-control" name="employeeFirstName" id="editFirstName" placeholder="" placeholder="Enter New First Name"> 
                    </div>

                    <div class="form-group">
                        <label for="employeeMiddleName">Middle Name</label>
                        <input type="text" class="form-control" name="employeeMiddleName" id="editMiddleName" placeholder="Enter Middle Name">
                    </div>

                    <div class="form-group">
                        <label for="employeeLastName">Last Name</label>
                        <input type="text" class="form-control" name="employeeLastName" id="editLastName" placeholder="Enter Last Name">
                    </div>

                    <div class="form-group">
                        <label for="employeeEmail">Email</label>
                        <input type="email" class="form-control" name="employeeEmail" id="editEmail" placeholder="Enter email">
                    </div>


                    <!-- Add more inputs as needed -->
                    <div class="modal-footer">
                        <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var user = $('#editEmployeeModal').data('user'); 

    //log the user
    //print i am from edit modal
    console.log('I am from edit modal');
    console.log(user);


    //Populate form fields
    // $('#editMiddleName').val(user.user_mname);
    // $('#editEmail').val(user.email);

    // Handle form submit
    $('#editEmployeeForm').submit(function() {
        // Get updated data
        var updatedName = $('#editNameInput').val();
        
        // Update user object
        user.name = updatedName; 
        
        // Submit updated user object to server
        submitEditedUser(user); 
    });
</script>