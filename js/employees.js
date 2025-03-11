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
          $("#add_employee").modal("hide");
          toastr.success("Employee added successfully");
          $('#addEmployee')[0].reset();
          setTimeout(function() {
            location.reload();
          }, 2000);
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  fetchEmployee();

  function fetchEmployee(fromDate = '', toDate = '', dateRange = '', companyType = '', flag = 'getAll') {
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

  $('#department').change(function() {
      var departmentId = $(this).val();
      if (departmentId) {
        if (departmentId === '5') {
          $('#manager-container').show();
          $('#supervisors-container').show();
        } else if (departmentId === '4') {
          $('#manager-container').show();
          $('#supervisors-container').hide();
        } else {
          $('#manager-container').hide();
          $('#supervisors-container').hide();
        }
        $.ajax({
          url: 'queries/employee.php', 
          type: 'GET',
          data: { departmentId: departmentId, flag: 'getRole' },
          success: function(response) {
              $('#role').html(response);
          }
        });
      } else {
          $('#role').html('<option value="">Select</option>');
      }
  });

  function encryptEmployeeId(employeeId) {
    return btoa(employeeId);
  }

  $(document).on('click', '#employeeDetails', function(e) {
    e.preventDefault();
    var employeeId = $(this).data('id');
    var encryptedId = encryptEmployeeId(employeeId);
    window.location.href = `employee-details.php?empId=${encryptedId}`;
  });

});