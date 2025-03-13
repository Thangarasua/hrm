$(document).ready(function () {
  $("#addEmployee").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append("flag", "insert");
    $.ajax({
      type: "POST",
      url: "queries/employee.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          wellcomeMail(response.data);
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  fetchEmployee();

  function fetchEmployee(
    fromDate = "",
    toDate = "",
    dateRange = "",
    companyType = "",
    flag = "getAll"
  ) {
    $.ajax({
      url: "queries/employee.php",
      type: "GET",
      dataType: "json",
      data: {
        fromDate: fromDate,
        toDate: toDate,
        dateRange: dateRange,
        companyType: companyType,
        flag: flag,
      },
      success: function (data) {
        var tableBody = $("#tableRecords tbody");

        if ($.fn.DataTable.isDataTable("#tableRecords")) {
          $("#tableRecords").DataTable().destroy();
        }

        tableBody.empty();
        // Check if data is not empty
        if (data.length > 0) {
          $.each(data, function (index, row) {
            var newRow = `<tr>
                            <td>${index + 1}</td>
                            <td>${row.employee_id}</td>
                            <td>${row.full_name}</td>
                            <td>${row.email}</td>
                            <td>${row.phone}</td>
                            <td>${row.designation}</td>
                            <td>${row.doj}</td>
                            <td>
                              <div class="action-icon d-inline-flex">
                                <a href="employee-details" data-id="${row.employee_id}" class="view" id="employeeDetails">
                                  <i class="fa-solid fa-folder-open"></i>
                                </a>
                              </div>
                            </td>
                          </tr>`;
            tableBody.append(newRow);
          });
        }
        /*-----data table common comments includes-----*/
        dataTableDesigns();
      },
    });
  }

  $("#department").change(function () {
    var departmentId = $(this).val();
    if (departmentId) {
      if (departmentId === "5") {
        $("#manager-container").show();
        $("#supervisors-container").show();
      } else if (departmentId === "4") {
        $("#manager-container").show();
        $("#supervisors-container").hide();
      } else {
        $("#manager-container").hide();
        $("#supervisors-container").hide();
      }
      $.ajax({
        url: "queries/employee.php",
        type: "GET",
        data: { departmentId: departmentId, flag: "getRole" },
        success: function (response) {
          $("#role").html(response);
        },
      });
    } else {
      $("#role").html('<option value="">Select</option>');
    }
  });


  /** Function to Send Welcome Mail */
  function wellcomeMail(data) {
    console.log(data);
    $.ajax({
      type: "POST",
      url: "mails/employees-mail.php",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $("#addEmployeeSaveBtn")
          .html("Loading <i class='fa-solid fa-spinner'></i>")
          .prop("disabled", true);
        Swal.fire({
          title: "Employee welcome mail sending 💌...",
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (response) {
        if (response.status === "success") {
          $("#addEmployee")[0].reset();
          $("#add_employee").modal("hide");
          $("#addEmployeeSaveBtn")
            .html("Save <i class='fa-solid fa-cloud-arrow-up'></i>")
            .prop("disabled", false);
          $("#success_modal").modal("show");
          $("#success_modal_content").html("Employee added successfully");
          Swal.close();
          fetchEmployee();
        } else {
          toastr.error(response.message, "Mail Error");
        }
      },
      error: function (xhr, status, error) {
        toastr.error("Failed to send mail: " + error, "Mail Error");
      },
    });
  }
 

  function encryptEmployeeId(employeeId) {
    return btoa(employeeId);
  }

  $(document).on('click', '#employeeDetails', function(e) {
    e.preventDefault();
    var employeeId = $(this).data('id');
    var encryptedId = encryptEmployeeId(employeeId);
    window.location.href = `employee-details.php?empId=${encryptedId}`;
  });


  $(document).on('dp.change', '#doj', function(e) {
    const doj = $(this).val();
    updateEmployeeId(doj);
  });

  function updateEmployeeId(doj) {
    if (doj) {
        const [day, month, year] = doj.split('-');
        $.ajax({
          url: 'queries/commonFunctions.php', 
          type: 'POST',
          data: { month: month, year: year, flag: 'getEmpId' },
          success: function(response) {
            $('#employeeID').val(response);
          }
        });
    }
  }

});

