$(document).ready(function () {
  function fetchSalary() {
    $.ajax({
      url: "queries/salary-structure.php",
      type: "GET",
      data: { flag: "fetch" },
      dataType: "json",
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
                            <td>
                                <h6 class="fw-medium"><a href="#">${
                                  row.role_name
                                }</a></h6>
                            </td>
                            <td>${row.min_LPA} - ${row.max_LPA}</td>
                            <td>${row.min_KPM} - ${row.max_KPM}</td>
                            <td>
                                  <div class="action-icon d-inline-flex">
                                    <a href="#" data-id="${
                                      row.roleId
                                    }" class="edit">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" data-id="${
                                      row.roleId
                                    }" class="delete">
                                      <i class="fa-solid fa-trash-can"></i>
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

  fetchSalary();

  $("#addRoles").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append("flag", "insert");
    $.ajax({
      type: "POST",
      url: "queries/salary-structure.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#addRoles")[0].reset();
          $("#add_roles").modal("hide");
          $("#success_modal").modal("show");
          $("#success_modal_content").html("Role added Successfully");
          fetchSalary();
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    $("#editModal").modal("show");
    var id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "queries/salary-structure.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        console.log(res);
        if (res.status == "success") {
          $("#rowId").val(res.data.roleId);
          $("#role").val(res.data.role_name);
          $("#minLPA").val(res.data.min_LPA);
          $("#maxLPA").val(res.data.max_LPA);
          $("#minKPM").val(res.data.min_KPM);
          $("#maxKPM").val(res.data.max_KPM); 
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();
    let form = formValidation();
    if (form === 0) {
      return false;
    }
    let formData = new FormData(this);
    formData.append("flag", "update");
    $.ajax({
      type: "POST",
      url: "queries/salary-structure.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#update")[0].reset();
          $("#editModal").modal("hide");
          $("#success_modal").modal("show");
          $("#success_modal_content").html("Salary structure Updated Successfully");
          fetchSalary();
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  function formValidation() {
    $(".error").remove(); // Remove previous error messages

    let minLPA = $("#minLPA").val().trim();
    if (minLPA.length == 0) {
      $("#minLPA").focus();
      $("#minLPA").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let maxLPA = $("#maxLPA").val().trim();
    if (maxLPA.length == 0) {
      $("#maxLPA").focus();
      $("#maxLPA").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    } 
    let minKPM = $("#minKPM").val().trim();
    if (minKPM.length == 0) {
      $("#minKPM").focus();
      $("#minKPM").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let maxKPM = $("#maxKPM").val().trim();
    if (maxKPM.length == 0) {
      $("#maxKPM").focus();
      $("#maxKPM").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
  }

});
