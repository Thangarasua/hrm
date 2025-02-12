$(document).ready(function() {

	function fetchDepartments() {
        $.ajax({
            url: "queries/departments.php",
            type: "GET",
			data: { flag: "fetch" },
            dataType: "json",
            success: function (data) {
                let tbody = "";
                data.forEach(function (row) {
					console.log(row)
                    let statusClass = row.status === "1" ? "badge-success" : "badge-danger";
					let statusValue = row.status === "1" ? "Active" : "Inactive";
                    tbody += `<tr>
                        <td>
                            <div class="form-check form-check-md">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${row.department_name}</a></h6>
                        </td>
                        <td>
                            <span class="badge ${statusClass} d-inline-flex align-items-center badge-xs">
                                <i class="ti ti-point-filled me-1"></i>${statusValue}
                            </span>
                        </td>
                        <td>
                            <div class="action-icon d-inline-flex">
                                <a href="#" class="me-2 edit-department" data-id="${row.department_id}" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
                                <a href="javascript:void(0);" class="delete-department" data-id="${row.department_id}" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>`;
                });

                $("tbody").html(tbody);
            },
        });
    }

	fetchDepartments();

	
	$("#addDepartment").on("submit", function(e) {
		e.preventDefault();
		let formData = new FormData(this);
    	formData.append("flag", "insert");
		$.ajax({
			type: "POST",
			url: "queries/departments.php",
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