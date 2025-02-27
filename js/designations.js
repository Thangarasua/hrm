$(document).ready(function() {

	function fetchDesignations() {
        $.ajax({
            url: "queries/designations.php",
            type: "GET",
			data: { flag: "fetch" },
            dataType: "json",
            success: function (data) {
                var tableBody = $("#tableRecords tbody");
                if ($.fn.DataTable.isDataTable("#tableRecords")) {
                    $("#tableRecords").DataTable().destroy();
                  }
                tableBody.empty();

                if (data.length > 0) {
                    $.each(data, function (index, row) {
                      let statusClass =
                        row.status === "1" ? "badge-success" : "badge-danger";
                      let statusValue = row.status === "1" ? "Active" : "Inactive";
                      var newRow = `<tr>
                                      <td>${index + 1}</td>
                                      <td><h6 class="fw-medium">${row.designation_title}</h6></td>
                                      <td><span class="badge ${statusClass} d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>${statusValue}</span></td>
                                      <td><div class="action-icon d-inline-flex"><a href="#" class="me-2 edit_user" data-id="${row.designation_id}" data-bs-toggle="modal" data-bs-target="#add_edit_user"><i class="ti ti-edit"></i></a>
                                      <a href="#" class="delete-users" data-id="${row.designation_id}" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check-circle"></i></a>
                                      </div>
                                      </td>
                                  </tr>`;
                      tableBody.append(newRow);
                    });
                }
                var lastSegment = $(location).attr("pathname").split("/").pop();

                table = $("#tableRecords").DataTable({
                    pageLength: 10,
                    lengthChange: false,
                    language: {
                        search: "",
                    },
                    lengthChange: false,
                    search: false,
                    dom:
                        "<'row'<'col-md-6'B><'col-md-6 text-end'f>>" +
                        "<'row'<'col-12'tr>>" +
                        "<'datatable-footer'<i><p>>",
            
                    buttons: [
                        {
                        extend: "excelHtml5",
                        text: "Export to Excel",
                        title: lastSegment + " List",
                        className: "btn btn-success",
                        exportOptions: {
                            columns: ":visible",
                        },
                        className: "d-none",
                        },
                        {
                        extend: "pdf",
                        text: "Export to PDF",
                        title: lastSegment + " List",
                        className: "buttons-pdf",
                        exportOptions: {
                            columns: ":visible",
                        },
                        className: "d-none",
                        },
                        {
                        extend: "copy",
                        text: "Export to copy",
                        title: lastSegment + " List",
                        className: "buttons-copy",
                        exportOptions: {
                            columns: ":visible",
                        },
                        className: "d-none",
                        },
                        {
                        extend: "csv",
                        text: "Export to csv",
                        title: lastSegment + " List",
                        className: "buttons-csv",
                        exportOptions: {
                            columns: ":visible",
                        },
                        className: "d-none",
                        },
                        {
                        extend: "print",
                        text: "Export to print",
                        title: lastSegment + " List",
                        className: "buttons-print",
                        exportOptions: {
                            columns: ":visible",
                        },
                        className: "d-none",
                        },
                    ],
                });

                $("#excel_button").on("click", function () {
                table.button(".buttons-excel").trigger();
                });
                $("#pdf_button").on("click", function () {
                table.button(".buttons-pdf").trigger();
                });
                $("#copy_button").on("click", function () {
                table.button(".buttons-copy").trigger();
                });
                $("#csv_button").on("click", function () {
                table.button(".buttons-csv").trigger();
                });
                $("#print_button").on("click", function () {
                table.button(".buttons-print").trigger();
                });

                oTable = $("#tableRecords").DataTable();
                $("#myInputTextField").keyup(function () {
                oTable.search($(this).val()).draw();
                });
                $("#customLengthMenu").on("change", function () {
                var length = $(this).val();
                table.page.len(length).draw();
                });
            },
        });
    }

	fetchDesignations();

	
	$("#addDesignation").on("submit", function(e) {
		e.preventDefault();
		let formData = new FormData(this);
    	formData.append("flag", "insert");
		$.ajax({
			type: "POST",
			url: "queries/designations.php",
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