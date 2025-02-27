$(document).ready(function () {
  var fromDate = "";
  var toDate = "";
  var dateRange = "";
  var companyType = "";
  var flag = $("#flag").val();
  var jobID = $("#jobID").val();

  loadData(fromDate, toDate, dateRange, companyType, flag, jobID);

  function loadData(fromDate, toDate, dateRange, companyType, flag, jobID) {
    $.ajax({
      url: "queries/candidates.php",
      type: "POST",
      dataType: "json",
      data: {
        fromDate: fromDate,
        toDate: toDate,
        dateRange: dateRange,
        companyType: companyType,
        flag: flag,
        jobID: jobID,
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
            var profileImage = row.profile
              ? `./uploads/candidate_profile/${row.profile}`
              : "default-avatar.png";
            var resumeLink = row.resume
              ? `./uploads/candidate_resume/${row.resume}`
              : "#";

            if (row.interview_status == 1) {
              inertview_status =
                '<span class="badge border border-purple text-purple"><i class="ti ti-point-filled"></i>Applied</span>';
            } else if (row.interview_status == 2) {
              inertview_status =
                '<span class="badge border border-pink text-pink"><i class="ti ti-point-filled"></i>Shortlisted</span>';
            } else if (row.interview_status == 3) {
              inertview_status =
                '<span class="badge border border-info text-info"><i class="ti ti-point-filled"></i>Scheduled </span>';
            } else if (row.interview_status == 4) {
              inertview_status =
                '<span class="badge border border-info text-info"><i class="ti ti-point-filled"></i>Interviewed </span>';
            } else if (row.interview_status == 5) {
              inertview_status =
                '<span class="badge border border-warning text-warning"><i class="ti ti-point-filled"></i>Offered </span>';
            } else if (row.interview_status == 6) {
              inertview_status =
                '<span class="badge border border-warning text-warning"><i class="ti ti-point-filled"></i>On Hold </span>';
            } else if (row.interview_status == 7) {
              inertview_status =
                '<span class="badge border border-danger text-danger"><i class="ti ti-point-filled"></i>Rejected </span>';
            } else if (row.interview_status == 8) {
              inertview_status =
                '<span class="badge border border-success text-success"><i class="ti ti-point-filled"></i>Hired</span>';
            }

            var newRow = `
                <tr>
                     <td>${index + 1}</td>
                    <td>${row.candidate_id}</td>
                    <td>
                        <div class="d-flex align-items-center file-name-icon">
                            <a href="${profileImage}" target="_blank" class="avatar avatar-md">
                                <img src="${profileImage}" class="img-fluid rounded-circle" alt="Profile">
                            </a>
                            <div class="ms-2">
                                <h6 class="fw-medium"><a href="#">
                                ${row.candidate_name}
                                </a></h6>
                                <span class="d-block mt-1">${row.email}</span>
                            </div>
                        </div>
                    </td>
                    <td>${row.job_position}</td>
                    <td>${row.contact_number}</td>
                    <td>${row.created_at}</td>
                    <td>
                        <div class="d-inline-flex">
                            <a href="${resumeLink}" class="text-gray me-2 fs-16" target="_blank"><i class="fa-solid fa-file-lines"></i></a>
                            <a href="${resumeLink}" class="text-gray fs-16" download><i class="fa-solid fa-download"></i></a>
                        </div>
                    </td>
                    <td>${inertview_status}</td>
                    <td>
                        <div class="action-icon d-inline-flex"> 
                          <a href="#" data-id="${
                            row.candidate_id
                          }" class="view">
                            <i class="fa-solid fa-folder-open"></i>
                          </a>
                          <a href="#" data-id="${
                            row.candidate_id
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
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
      },
    });
  }

  $(document).on("click", ".view", function (e) {
    e.preventDefault();
    $("#viewModal").modal("show");
    var id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "queries/candidates.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        console.log(res);
        if (res.status == "success") { 
          $("#candidate_register_id").val(res.data.candidate_register_id); 
          $("#contact_number").val(res.data.contact_number);
          $("#created_by").val(res.data.created_by);
          $("#ticket_request_id").val(res.data.ticket_request_id);
          $("#address").val(res.data.address); 
          $("#experience").val(res.data.experience);
          $("#skills").val(res.data.skills);
          $("#available_time1").val(res.data.available_time1);
          $("#available_time2").val(res.data.available_time2);
          $("#available_time3").val(res.data.available_time3);
          $("#created_at").val(res.data.created_at); 
        } else {
          Swal.fire(res.data.message);
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
      url: "queries/candidates.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        if (res.status == "success") {
          $("#rowId").val(res.data.candidate_id);
          $("#candidate_name").val(res.data.candidate_name);
          $("#interview_status")
            .val(res.data.interview_status)
            .trigger("change");
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();

    let interview_status = $("#interview_status").val().trim();
    if (interview_status.length == 0) {
      $("#interview_status").focus();
      $("#interview_status_error").removeClass("d-none");
      return;
    } else {
      $("#interview_status_error").addClass("d-none");
    }

    let formData = new FormData(this);
    formData.append("flag", "update");
    $.ajax({
      type: "POST",
      url: "queries/candidates.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#update_modal").modal("show");
          $("#update")[0].reset();
          $("#editModal").modal("hide");
          // loadData("", "", "", "", "getAll", "");
          loadData(fromDate, toDate, dateRange, companyType, flag, jobID);
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });
});
