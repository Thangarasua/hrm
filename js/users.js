$(document).ready(function () {
  function fetchUsers() {
    $.ajax({
      url: "queries/users.php",
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
              row.status === "Active" ? "badge-success" : "badge-danger";
            let statusValue = row.status === "Active" ? "Active" : "Inactive";
            var newRow = `<tr>
                            <td>${index + 1}</td>
                            <td><h6 class="fw-medium">${row.user_id}</h6></td>
                            <td><h6 class="fw-medium">${row.user_name}</h6></td>
                            <td><h6 class="fw-medium">${row.password}</h6></td>
                            <td><h6 class="fw-medium">${row.role_id}</h6></td>
                            <td><h6 class="fw-medium">${row.department_id}</h6></td>
                            <td><h6 class="fw-medium">${row.supervisor_id}</h6></td>
                            <td><h6 class="fw-medium">${row.manager_id}</h6></td>
                            <td><h6 class="fw-medium">${row.hr_id}</h6></td>
                            <td><span class="badge ${statusClass} d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>${statusValue}</span></td>
                            <td><div class="action-icon d-inline-flex"><a href="#" class="me-2 edit_user" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#add_edit_user"><i class="ti ti-edit"></i></a>
                            <a href="#" class="delete-users" data-id="${row.id}" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check-circle"></i></a>
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
        // When the custom button is clicked, trigger the DataTable's Excel export
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

        //customise the dataTable search table column value
        oTable = $("#tableRecords").DataTable();
        $("#myInputTextField").keyup(function () {
          oTable.search($(this).val()).draw();
        });
        //customise the dataTable no of records show
        $("#customLengthMenu").on("change", function () {
          var length = $(this).val();
          table.page.len(length).draw();
        });
      },
    });
  }
  fetchUsers();

  $("#addEditUser").on("submit", function (e) {
    e.preventDefault();
    var buttonText = $(".addEditUserSaveBtn").text();
    let formData = new FormData(this);
    if (buttonText === "Save Changes") {
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
      success: function (response) {
        if (response.status == "success") {
          $("#success_modal").modal("show");
          $(".userNameMessage").text(response.userName);
          $(".userIdMessage").text(response.userID);
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  $(document).on("click", ".edit_user", function () {
    var userId = $(this).data("id");
    $.ajax({
      url: "queries/users.php",
      type: "GET",
      data: { id: userId, flag: "fetch" },
      success: function (data) {
        $('#addEditUser [name="UserID"]')
          .val(data.user_id)
          .prop("readonly", true);
        $('#addEditUser [name="UserName"]').val(data.user_name);
        $('#addEditUser [name="department"]')
          .val(data.department_id)
          .trigger("change");
        $('#addEditUser [name="role"]').val(data.role_id).trigger("change");
        $('#addEditUser [name="supervisors"]')
          .val(data.supervisor_id)
          .trigger("change");
        $('#addEditUser [name="manager"]')
          .val(data.manager_id)
          .trigger("change");
        $('#addEditUser [name="hr"]').val(data.hr_id).trigger("change");
        $('#addEditUser [name="password"]').val(data.password);
        $('#addEditUser [name="confirmPassword"]').val(data.password);

        // Optionally, change the modal title or add a "Save Changes" button label
        $(".modal-title").text("Edit User");
        $(".addEditUserSaveBtn").text("Save Changes");
        $(".sucessMessage").text("User Updated Successfully");
      },
      error: function () {
        alert("Error fetching user data");
      },
    });
  });

  $(document).on("click", ".delete-users", function () {
    var userId = $(this).data("id");
    $.ajax({
      url: "queries/users.php",
      type: "POST",
      data: { id: userId, flag: "delete" },
      success: function (data) {
        if (data.status == "success") {
          $("#delete_modal").modal("show");
          $(".statusMessage").text("Successfully " + data.newStatus);
        } else {
          toastr.error(data.message, "Error");
        }
      },
      error: function () {
        alert("Error fetching user data");
      },
    });
  });

  $(document).on("click", ".add_user", function () {
    $("#addEditUser")[0].reset();
    $('#addEditUser [name="UserID"]').prop("readonly", false);
    $('#addEditUser [name="department"]').val("").trigger("change");
    $('#addEditUser [name="role"]').val("").trigger("change");
    $('#addEditUser [name="supervisors"]').val("").trigger("change");
    $('#addEditUser [name="manager"]').val("").trigger("change");
    $('#addEditUser [name="hr"]').val("").trigger("change");

    $(".modal-title").text("Add User");
    $(".addEditUserSaveBtn").text("Save");
    $(".sucessMessage").text("User Added Successfully");
  });
});
