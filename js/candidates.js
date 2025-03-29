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
              : "./uploads/candidate_profile/default-avatar.jpeg";
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
            } else if (row.interview_status == 9) {
              inertview_status =
                '<span class="badge border border-danger text-danger"><i class="ti ti-point-filled"></i>Not Attend</span>';
            }

            var newRow = `
                <tr>
                     <td>${index + 1}</td>
                    <td>${row.candidate_register_id}</td>
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
                    <td class='pointer' title='${row.job_position}'>${row.job_position.substr(0, 23)}</td>
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
                            <i class="fa-solid fa-eye" title="view details"></i>
                          </a>
                          <a href="#" data-id="${
                            row.candidate_id
                          }" class="edit">
                            <i class="fa-solid fa-pen-to-square" title="edit details"></i>
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
        data = res.data;
        if (res.status == "success") {
          $("#candidate_register_id").val(data.candidate_register_id);
          $("#contact_number").val(data.contact_number);
          $("#created_by").val(data.official_name);
          $("#ticket_request_id").val(data.ticket_request_id);
          $("#address").val(data.address);
          $("#experience").val(data.experience);
          $("#skills").val(data.skills);
          $("#available_time1").val(data.available_time1);
          $("#available_time2").val(data.available_time2 || "Not define");
          $("#available_time3").val(data.available_time3 || "Not define");
          $("#created_at").val(data.created_at);
          $("#interview_status").val(data.interview_status);
          $("#interview_date_view").val(
            data.interview_date || "---Still not update---"
          );
          $("#interview_re_date_view").val(
            data.interview_re_date || "---Not Define---"
          );
        } else {
          Swal.fire(data.message);
        }
      },
    });
  });

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    $("#interviewModal").modal("show");
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
          $("input[name='interview_status']").prop("checked", false); // Uncheck all first
          $(
            `input[name='interview_status'][value='${res.data.interview_status}']`
          ).prop("checked", true);
          $("#existingStatus").val(res.data.interview_status);
          $("#schedule_time1").val(res.data.available_time1);
          $("#schedule_time2").val(
            res.data.available_time2 || "---Not Define---"
          );
          $("#schedule_time3").val(
            res.data.available_time3 || "---Not Define---"
          );
          $("#interview_date_edit").val(res.data.interview_date);
          $("#interview_re_date_edit").val(
            res.data.interview_re_date || "---Not Define---"
          );
          $("#interviewDate").html(res.data.interview_re_date??res.data.interview_date);
          let val = res.data.interview_status;
          dynamicInputs(val, val);
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $("input[name='interview_status']").change(function () {
    let existingStatus = $("#existingStatus").val();
    let selectedValue = $("input[name='interview_status']:checked").val(); // Get the selected value
    dynamicInputs(selectedValue, existingStatus);
  });

  function dynamicInputs(val1, val2) {
    selectedValue = val1;
    existingStatus = val2;

    $("#updateBtn").hide();
    $(".scheduled-date").hide();
    $(".shortlisted").hide();

    if (selectedValue == 1) { 
      $(".scheduled-date").show();
      $("#updateButton").hide();
    } 
    
    if (selectedValue == 2) {
      $(".shortlisted").show();
      if (existingStatus > 1) {
        $(".sheduleDate").hide();
        $(".sheduledDate").show();
        $("#updateBtn").hide();
      } else {
        $(".sheduleDate").show();
        $(".sheduledDate").hide();
        $("#updateBtn").show();
      }
    }  
    if (selectedValue == 7) {
      $("#updateBtn").show();
    } 
  }

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();
    let interview_status = $('input[name="interview_status"]:checked').val();
    // return;
    if (interview_status == 2) {
      let form = shortlistForm();
      if (form === 0) {
        return false;
      }
    } else {
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
      beforeSend: function () {
        $("#updateBtn").text("Loading...").prop("disabled", true);
        Swal.fire({
          title: "Its processing Please wait...",
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (response) {
        if (response.status === "success") {
          interview_status = response.data.interview_status;
          if (interview_status == 2) {
            // 2->shortlisted candidate send mail
            sendRecruitmentMail(response.data);
          }else if(interview_status == 7){
            sendRecruitmentMail(response.data);
          } else {
            $("#update")[0].reset();
            $("#interviewModal").modal("hide");
            $("#updateBtn").text("Update").prop("disabled", false);
            Swal.fire("Interview status successfully!", "", "success");
            loadData("", "", "", "", "getAll");
          }
        } else {
          handleError(response.message);
        }
      },
      error: function (xhr, status, error) {
        handleError("An error occurred: " + error);
      },
    });
  });

  /** Function to Send Recruitment Mail */
  function sendRecruitmentMail(data) {
    console.log(data);
    $.ajax({
      type: "POST",
      url: "mails/recruitment-mail.php",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $("#updateBtn").text("Loading...").prop("disabled", true);
        Swal.fire({
          title: "Interview status update mail sending 📩...",
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (response) {
        if (response.status === "success") {
          $("#update")[0].reset();
          $("#interviewModal").modal("hide");
          $("#updateBtn").text("Update").prop("disabled", false);
          $("#success_modal").modal("show");
            $("#success_modal_content").html(
              "Shortlist mail send successfully! 📨"
            );
            Swal.close(); 
          loadData("", "", "", "", "getAll");
        } else {
          toastr.error(response.message, "Mail Error");
        }
      },
      error: function (xhr, status, error) {
        toastr.error("Failed to send mail: " + error, "Mail Error");
      },
    });
  }

  /** Function to Handle Errors */
  function handleError(message) {
    Swal.close();
    $("#sendButton").text("Send Mail").prop("disabled", false);
    toastr.error(message, "Error");
  }

  /** Interview status update form validate */
  function shortlistForm() {
    let interview_date = $("#interview_date").val().trim();
    if (interview_date.length == 0) {
      $("#interview_date").focus();
      $("#interview_date").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let interview_time = $("#interview_time").val().trim();
    if (interview_time.length == 0) {
      $("#interview_time").focus();
      $("#interview_time").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
  }
  /** Interview status update form validate */
});
