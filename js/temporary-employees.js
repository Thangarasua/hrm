$(document).ready(function () {
  $("#addEmployee").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append("flag", "insert");
    $.ajax({
      type: "POST",
      url: "queries/temporary-employees.php",
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

  let fromDate = "";
  let toDate = "";
  let dateRange = "";
  let active = $("#employeeStatus").val();
  let flag = "getAll";
  fetchEmployee(fromDate, toDate, dateRange, active, flag);

  function fetchEmployee(fromDate, toDate, dateRange, active, flag) {
    $.ajax({
      url: "queries/temporary-employees.php",
      type: "GET",
      dataType: "json",
      data: {
        fromDate: fromDate,
        toDate: toDate,
        dateRange: dateRange,
        active: active,
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
                            <td>${row.official_name}</td> 
                            <td class='pointer' title='${
                              row.email
                            }'>${row.email.substr(0, 20)}</td>
                            <td>${row.phone}</td>
                            <td class='pointer' title='${
                              row.designation_title
                            }'>${row.designation_title.substr(0, 20)}</td>
                            <td>${row.doj}</td>
                            <td>
                              <div class="action-icon d-inline-flex">
                                <a href="employee-details" data-id="${
                                  row.employee_id
                                }" class="view" id="employeeDetails">
                                  <i class="fa-solid fa-folder-open"></i>
                                </a>
                                <a href="javascript:void(0)" data-id="${
                                  row.employee_id
                                }" class="edit">
                                  <i class="fa-solid fa-pen-to-square"></i>
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

  $("#employeeStatus").change(function () {
    var val = $(this).val();
    if (val) {
      if (val === "1") {
        fetchEmployee(
          (fromDate = ""),
          (toDate = ""),
          (dateRange = ""),
          (active = "1"),
          (flag = "getAll")
        );
      } else if (val === "2") {
        fetchEmployee(
          (fromDate = ""),
          (toDate = ""),
          (dateRange = ""),
          (active = "2"),
          (flag = "getAll")
        );
      } else if (val === "3") {
        fetchEmployee(
          (fromDate = ""),
          (toDate = ""),
          (dateRange = ""),
          (active = "3"),
          (flag = "getAll")
        );
      } else {
      }
    } else {
    }
  });

  $("#role").change(function () {
    var roleId = $(this).val();
    if (roleId) {
      if (roleId === "1") {
        $("#manager-container").show();
        $("#supervisors-container").show();
      } else if (roleId === "2") {
        $("#manager-container").show();
        $("#supervisors-container").hide();
      } else {
        $("#manager-container").hide();
        $("#supervisors-container").hide();
      }
    } else {
      $("#role").html('<option value="">Select</option>');
    }
  });

  $("#role, #department").change(function () {
    let roleId = $("#role").val().trim();
    if (roleId.length == 0) {
      $("#role").focus();
      toastr["warning"]("First select Hierarchy");
      return 0;
    }
    var departmentId = $("#department").val();
    if (departmentId) {
      $.ajax({
        url: "queries/temporary-employees.php",
        type: "GET",
        data: {
          departmentId: departmentId,
          roleId: roleId,
          flag: "getDesignation",
        },
        success: function (response) {
          $("#designation").html(response);
        },
      });
    } else {
      $("#designation").html('<option value="">Select</option>');
    }
  });

  $("#same-personalName").on("click", function () {
    var employeePersonalName = $("#employeePersonalName").val();
    if (employeePersonalName != "") {
      if (officialNameCheckbox.checked) {
        $("#employeeOfficialName").val(employeePersonalName);
      } else {
        $("#employeeOfficialName").val("");
      }
    } else {
      toastr.error('Kindly enter the personal name', "Error");
      $("#employeeOfficialName").val("");
      $("#officialNameCheckbox").prop("checked", false);
    } 
  });
 
    $("#nextButton").click(function () {
        $("#office-tab").tab("show"); // Open the "Official Information" tab
    }); 
    $("#previousButton").click(function () {
        $("#basic-tab").tab("show"); // Open the "Official Information" tab
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

  $(document).on("click", "#employeeDetails", function (e) {
    e.preventDefault();
    var employeeId = $(this).data("id");
    var encryptedId = encryptEmployeeId(employeeId);
    window.location.href = `employee-details.php?empId=${encryptedId}`;
  });

  $(document).on("click", "#employeeStatusUpdate", function (e) {
    e.preventDefault();
    var employeeId = $(this).data("id"); 
    var encryptedId = encryptEmployeeId(employeeId);
    window.location.href = `employee-details.php?empId=${encryptedId}`;
  });

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    $("#editModal").modal("show");
    var id = $(this).data("id");
    $('#employeeId').val(id); 
  });

  $(document).on("submit", "#updateStatus", function (e) {
    e.preventDefault();
   
    let formData = new FormData(this);
    formData.append("flag", "statusUpdate");
    $.ajax({
      type: "POST",
      url: "queries/temporary-employees.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#updateStatus")[0].reset();
          $("#editModal").modal("hide");
          $("#success_modal").modal("show");
          $("#success_modal_content").html(
            "Employee deactivate successfully"
          );
          fetchEmployee(fromDate, toDate, dateRange, active, flag);
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  $(document).on("dp.change", "#doj", function (e) {
    const doj = $(this).val();
    updateEmployeeId(doj);
  });

  function updateEmployeeId(doj) {
    if (doj) {
      const [day, month, year] = doj.split("-");
      $.ajax({
        url: "queries/temporary-employees.php",
        type: "POST",
        data: { day: day, month: month, year: year, flag: "getEmpId" },
        success: function (response) {
          $("#employeeID").val(response);
        },
      });
    }
  }

  function getCardDetails() {
    $.ajax({
      url: "queries/temporary-employees.php",
      type: "GET",
      dataType: "json",
      data: {
        flag: "getCardValues",
      },
      success: function (res) {
        if (res.status == "success") {
          console.log(res.data.total);
          $("#totalEmployees").html(res.data.total);
          $("#activeEmployees").html(res.data.active);
          $("#inActiveEmployees").html(res.data.inactive);
          $("#newEmployees").html(res.data.newly_active);
        } else {
        }
      },
    });
  } 
  getCardDetails();
});

$(document).ready(function () {
  $(".date-range").on("change", function () {
    let selectedDateRange = $(this).val().trim(); // Get selected date range
    console.log("Selected Date Range:", selectedDateRange); // Display in console
  });
});
