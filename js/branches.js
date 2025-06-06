 
$(document).ready(function () {
  function fetchBraches() {
    $.ajax({
      url: "queries/branches.php",
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
                              row.branch_name
                            }</a></h6>
                        </td>
                        <td>
                            <h6 class="fw-medium"><a href="#">${
                              row.branch_address
                            }</a></h6>
                        </td>
                        <td>
                              <div class="action-icon d-inline-flex">
                                <a href="#" data-id="${
                                  row.branch_id
                                }" class="edit">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" data-id="${
                                  row.branch_id
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

  fetchBraches();

  $("#addBranch").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append("flag", "insert");
    $.ajax({
      type: "POST",
      url: "queries/branches.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#addBranch")[0].reset();
          $("#add_branch").modal("hide");
          // $("#success_modal").modal("show");
          // $("#success_modal_content").html(
          //   "Branch added Successfully"
          // ); 
          alert("Branch added Successfully");
          fetchBraches();
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
      url: "queries/branches.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        if (res.status == "success") {
          $("#rowId").val(res.data.branch_id);
          $("#edit_branch").val(res.data.branch_name);
           $("#edit_branchAddress").val(res.data.branch_address);
          // $("#status").val(res.data.status).trigger("change");
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
      url: "queries/branches.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") { 
          $("#update")[0].reset();
          $("#editModal").modal("hide");
          // $("#success_modal").modal("show");
          // $("#success_modal_content").html(
          //   "Department Updated Successfully"
          // ); 
           alert("Branch Updated Successfully");
          fetchBraches();
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });


  $(document).on("click", ".delete", function (e) {
    e.preventDefault(); 
    var id = $(this).data("id"); 
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to delete this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "queries/branches.php",
                data: {
                  id: id,
                  flag: "delete",
                },
                cache: false,
                success: function (response) {
                  if (response.status == "success") { 
                    fetchBraches();
                  } else {
                    toastr.error(response.message, "Error");
                  }
                },
              });
        }
      });


  });




});
