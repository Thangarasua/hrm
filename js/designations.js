$(document).ready(function () {
  function fetchDesignation() {
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
        // Check if data is not empty
        if (data.length > 0) {
          $.each(data, function (index, row) {
            let statusClass =
              row.status === "1" ? "badge-success" : "badge-danger";
            let statusValue = row.status === "1" ? "Active" : "Inactive";
            var newRow = `<tr>
                            <td>${index + 1}</td>
                            <td>
                                <h6 class="fw-medium"><a href="#">${
                                  row.designation_title
                                }</a></h6>
                            </td>
                            <td>
                                <h6 class="fw-medium"><a href="#">${
                                  row.department_name
                                }</a></h6>
                            </td>
                            <td>
                                <h6 class="fw-medium"><a href="#">${
                                  row.role_name
                                }</a></h6>
                            </td>
                            <td>
                                <span class="badge ${statusClass} d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>${statusValue}
                                </span>
                            </td>
                            <td>
                                  <div class="action-icon d-inline-flex">
                                    <a href="#" data-id="${
                                      row.designation_id
                                    }" class="edit">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" data-id="${
                                      row.designation_id
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

  fetchDesignation();

  $("#addDesignation").on("submit", function (e) {
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
      success: function (response) {
        if (response.status == "success") {
          $("#addDesignation")[0].reset();
          $("#add_designation").modal("hide");
          $("#success_modal").modal("show");
          $("#success_modal_content").html(
            "Designation added Successfully"
          ); 
          fetchDesignation(); 
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
      url: "queries/designations.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        console.log(res);
        if (res.status == "success") {
          $("#rowId").val(res.data.designation_id);
          $("#edit_designation").val(res.data.designation_title);
          $("#status").val(res.data.status).trigger("change");
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append("flag", "update");
    $.ajax({
      type: "POST",
      url: "queries/designations.php",
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
          $("#success_modal_content").html(
            "Designation Updated Successfully"
          );  
          fetchDesignation();
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  $(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var formfilling = $(this).data("formfilling");
    if (formfilling > 0) {
      $("#candidateCount").html(formfilling);
      $("#info_modal").modal("show");
 
    } else {
      $("#delete_modal").modal("show");
      $("#deleteId").val(id); 
    }
  });

  $(document).on("submit", "#delete", function (e) {
    e.preventDefault();
    var id = $("#deleteId").val();
    $.ajax({
      type: "POST",
      url: "queries/designations.php",
      data: {
        id: id,
        flag: "delete",
      },
      cache: false,
      success: function (response) {
        if (response.status == "success") {
          $("#delete")[0].reset();
          $("#delete_modal").modal("hide");
          fetchDesignation();
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });
});
