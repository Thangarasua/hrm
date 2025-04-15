$(document).ready(function () {

  var departmentId = $("#loginedDepartmentId").val();

  var fromDate = "";
  var toDate = "";
  var dateRange = "";
  var companyType = "";
  var flag = "getAll";
  loadData(fromDate, toDate, dateRange, companyType, flag);

  function loadData(fromDate, toDate, dateRange, companyType, flag) {
    $.ajax({
      url: "queries/referrals.php",
      type: "POST",
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
            if (row.interview_status == 0) {
              inertview_status = '<span class="badge border border-purple text-purple"><i class="ti ti-point-filled"></i>Form Sending</span>';
            } else if (row.interview_status == 1) {
              inertview_status = '<span class="badge border border-purple text-purple"><i class="ti ti-point-filled"></i>Applied</span>';
            } else if (row.interview_status == 2) {
              inertview_status = '<span class="badge border border-pink text-pink"><i class="ti ti-point-filled"></i>Shortlisted</span>';
            } else if (row.interview_status == 3) {
              inertview_status = '<span class="badge border border-info text-info"><i class="ti ti-point-filled"></i>Scheduled </span>';
            } else if (row.interview_status == 4) {
              inertview_status = '<span class="badge border border-info text-info"><i class="ti ti-point-filled"></i>Interviewed </span>';
            } else if (row.interview_status == 5) {
              inertview_status = '<span class="badge border border-warning text-warning"><i class="ti ti-point-filled"></i>Offered </span>';
            } else if (row.interview_status == 6) {
              inertview_status = '<span class="badge border border-warning text-warning"><i class="ti ti-point-filled"></i>On Hold </span>';
            } else if (row.interview_status == 7) {
              inertview_status = '<span class="badge border border-danger text-danger"><i class="ti ti-point-filled"></i>Rejected </span>';
            } else if (row.interview_status == 8) {
              inertview_status = '<span class="badge border border-success text-success"><i class="ti ti-point-filled"></i>Hired</span>';
            } else if (row.interview_status == 9) {
              inertview_status = '<span class="badge border border-danger text-danger"><i class="ti ti-point-filled"></i>Not Attend</span>';  
            } else {
              inertview_status = '<span class="badge border border-danger text-danger"><i class="ti ti-point-filled"></i>Not Workout</span>';
            }

            if (departmentId == 5) {
              var trash = `<a href="#" data-id="${row.id}" class="delete" title="Confirm Before Delete"><i class="fa-solid fa-trash-can"></i></a>`;
              var send = `<a href="#" data-id="${row.id}" class="send" title="Send application form by HR only"> <i class="fa-solid fa-paper-plane"></i></a>`;
            } else {
              var trash = ``;
              var send = ``;
            }

            var newRow = `
                <tr>
                     <td>${index + 1}</td>
                    <td>${row.referral_id}</td>  
                    <td><div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md "> 
                          <img src="assets/img/profiles/${row.profile_photo}" alt="Img" class="img-fluid rounded-circle">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">${row.official_name}</a></h6>
                          <span class="d-block mt-1">${row.referrer_id}</span>
												</div>
											</div>
                      </td>
                    <td>${row.job_position}</td>
                    <td>${row.candidate_name}</td> 
                    <td>Not set</td> 
                    <td>${row.created_at}</td>  
                    <td>${row.handled_hr}</td>
                    <td>${inertview_status}</td>
                    <td>
                      <div class="action-icon d-inline-flex">
                        <a href="#" data-id="${row.id}" class="view">
                          <i class="fa-solid fa-eye" title="View all details"></i>
                        </a>  
                        ${trash}
                        ${send}
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
      url: "queries/referrals.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        data = res.data;
        if (res.status == "success") {
          $("#refCandidateName").val(data.candidate_name);
          $("#candidateEmail").val(data.candidate_email);
          $("#candidateCantact").val(data.candidate_mobile);
          $("#referralBonus").val(data.referral_bonus || "Not define");
          $("#createdAt").val(data.created_at);
          $("#UpdatedAt").val(data.updated_at || 'Still Not Update');
        } else {
          Swal.fire(data.message);
        }
      },
    });
  });


  $(document).on("click", ".send", function (e) {
    e.preventDefault();
    $("#sendModal").modal("show");
    var id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "queries/referrals.php",
      data: {
        id: id,
        flag: "referralDetails",
      },
      cache: false,
      success: function (res) {
        console.log(res.data);
        if (res.status == "success") {
          $("#jobSno").val(res.data.jobSno);
          $("#ticketRequestId").val(res.data.ticket_request_id);
          $("#jobTitle").val(res.data.job_position);
          $("#candidateName").val(res.data.candidate_name);
          $("#candidateMail").val(res.data.candidate_email);
          $("#candidateContact").val(res.data.candidate_mobile);
          $("#referralID").val(res.data.referral_id);
          $("#raisedBy").val(res.data.raised_by); 
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });


  $(document).on("submit", "#send", function (e) {
    e.preventDefault();

    let formData = new FormData(this);
    formData.append("flag", "send");

    $.ajax({
      type: "POST",
      url: "queries/referrals.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#sendButton")
          .html("Loading <i class='fa-solid fa-spinner'></i>")
          .prop("disabled", true);
        Swal.fire({
          title: "Recruitment form sending 📩...",
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (response) {
        if (response.status === "success") {
          sendRecruitmentMail(response.data);
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
      success: function (response) {
        if (response.status === "success") {
          $("#send")[0].reset();
          $("#sendModal").modal("hide");
          $("#sendButton")
            .html("Send Mail <i class='fa-solid fa-paper-plane'></i>")
            .prop("disabled", false);
          $("#success_modal").modal("show");
          $("#success_modal_content").html(
            "Job application Mail send successfully"
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
    $("#sendButton")
      .html("Send Mail <i class='fa-solid fa-paper-plane'></i>")
      .prop("disabled", false);
    toastr.error(message, "Error");
  } 
});
