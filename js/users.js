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
                                <a href="#" class="me-2 edit-department" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
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

    $("#addUser").on("submit", function(e) {
        e.preventDefault();
		let formData = new FormData(this);
    	formData.append("flag", "insert");
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
				}else{
					toastr.error(response.message, "Error");
				}
			},
		});
    });
});