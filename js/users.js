$(document).ready(function() {
    function fetchUsers() {
        $.ajax({
            url: "queries/users.php",
            type: "GET",
			data: { flag: "fetch" },
            dataType: "json",
            success: function (data) {
                let tbody = "";
                data.forEach(function (row) {
					console.log(row)
                    let statusClass = row.status === "Active" ? "badge-success" : "badge-danger";
					let statusValue = row.status === "Active" ? "Active" : "Inactive";
                    tbody += `<tr>
                        <td>
                            <div class="form-check form-check-md">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.user_id}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.user_name}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.password}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.role_id}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.department_id}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.supervisor_id}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.manager_id}</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.hr_id}</a></h6>
                        </td>
                        <td>
                            <span class="badge ${statusClass} d-inline-flex align-items-center badge-xs">
                                <i class="ti ti-point-filled me-1"></i>${statusValue}
                            </span>
                        </td>
                        <td>
                            <div class="action-icon d-inline-flex">
                                <a href="#" class="me-2 edit_user" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#add_edit_user"><i class="ti ti-edit"></i></a>
                                <a href="javascript:void(0);" class="delete-department" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>`;
                });

                $("tbody").html(tbody);
            },
        });
    }
    fetchUsers();

    $("#addEditUser").on("submit", function(e) {
        e.preventDefault();
        var buttonText = $('.addEditUserSaveBtn').text();
		let formData = new FormData(this);
        if(buttonText === 'Save Changes'){
            formData.append("flag", "update");
        } else {
    	    formData.append("flag", "insert");
        }
		$.ajax({
			type: "POST",
			url: "queries/users.php",
			data: formData,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				if (response.status == "success") { 
					$('#success_modal').modal('show');
                    $('.userNameMessage').text(response.userName);
                    $('.userIdMessage').text(response.userID);
				}else{
					toastr.error(response.message, "Error");
				}
			},
		});
    });

    $(document).on('click', '.edit_user', function() {
        var userId = $(this).data('id');
        $.ajax({
            url: 'queries/users.php',
            type: 'GET',
            data: { id: userId, flag: "fetch" },
            success: function (data) {
                $('#addEditUser [name="UserID"]').val(data.user_id).prop('readonly', true);
                    $('#addEditUser [name="UserName"]').val(data.user_name);
                    $('#addEditUser [name="department"]').val(data.department_id).trigger('change');
                    $('#addEditUser [name="role"]').val(data.role_id).trigger('change');
                    $('#addEditUser [name="supervisors"]').val(data.supervisor_id).trigger('change');
                    $('#addEditUser [name="manager"]').val(data.manager_id).trigger('change');
                    $('#addEditUser [name="hr"]').val(data.hr_id).trigger('change');
                    $('#addEditUser [name="password"]').val(data.password);
                    $('#addEditUser [name="confirmPassword"]').val(data.password);

                    // Optionally, change the modal title or add a "Save Changes" button label
                    $('.modal-title').text('Edit User');
                    $('.addEditUserSaveBtn').text('Save Changes');
                    $('.sucessMessage').text('User Updated Successfully');
            },
            error: function() {
                alert('Error fetching user data');
            }
        });
    });

    $(document).on('click', '.add_user', function() {
        $('#addEditUser')[0].reset();
        $('#addEditUser [name="UserID"]').prop('readonly', false);
        $('#addEditUser [name="department"]').val('').trigger('change');
        $('#addEditUser [name="role"]').val('').trigger('change');
        $('#addEditUser [name="supervisors"]').val('').trigger('change');
        $('#addEditUser [name="manager"]').val('').trigger('change');
        $('#addEditUser [name="hr"]').val('').trigger('change');

        $('.modal-title').text('Add User');
        $('.addEditUserSaveBtn').text('Save');
        $('.sucessMessage').text('User Added Successfully');
    });
});