$(document).ready(function () {
  var fromDate = "";
  var toDate = "";
  var dateRange = "";
  var companyType = "";
  var flag = "getAll";

  loadData(fromDate, toDate, dateRange, companyType, flag);

  function loadData(fromDate, toDate, dateRange, companyType, flag) {
    $.ajax({
      url: "queries/interview.php",
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
        data = res.data;
        if (res.status == "success") {
          $("#candidate_register_id").val(data.candidate_register_id);
          $("#contact_number").val(data.contact_number);
          $("#created_by").val(data.created_by);
          $("#ticket_request_id").val(data.ticket_request_id);
          $("#address").val(data.address);
          $("#experience").val(data.experience);
          $("#skills").val(data.skills);
          $("#available_time1").val(data.available_time1);
          $("#available_time2").val(data.available_time2 || "---Not define---");
          $("#available_time3").val(data.available_time3 || "---Not define---");
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

  /*--------------------start rating -start---------------------*/
  $("#dressCode i").click(function () {
    var index1 = $(this).index();
    $("#dressCode i").each(function (index2) {
      if (index1 >= index2) {
        $(this).removeClass("fa-regular fa-star");
        $(this).addClass("fa-solid fa-star active");
      } else {
        $(this).removeClass("fa-solid fa-star active");
        $(this).addClass("fa-regular fa-star");
      }
    });
    var selectStarValue = $(this).data("val");
    $("#dressCodeRate").val(selectStarValue);
  });
  $("#softSkill i").click(function () {
    var index1 = $(this).index();
    $("#softSkill i").each(function (index2) {
      if (index1 >= index2) {
        $(this).removeClass("fa-regular fa-star");
        $(this).addClass("fa-solid fa-star active");
      } else {
        $(this).removeClass("fa-solid fa-star active");
        $(this).addClass("fa-regular fa-star");
      }
    });
    var selectStarValue = $(this).data("val");
    $("#softSkillRate").val(selectStarValue);
  });
  $("#technicalSkill i").click(function () {
    var index1 = $(this).index();
    $("#technicalSkill i").each(function (index2) {
      if (index1 >= index2) {
        $(this).removeClass("fa-regular fa-star");
        $(this).addClass("fa-solid fa-star active");
      } else {
        $(this).removeClass("fa-solid fa-star active");
        $(this).addClass("fa-regular fa-star");
      }
    });
    var selectStarValue = $(this).data("val");
    $("#technicalSkillRate").val(selectStarValue);
  });
  $("#performance i").click(function () {
    var index1 = $(this).index();
    $("#performance i").each(function (index2) {
      if (index1 >= index2) {
        $(this).removeClass("fa-regular fa-star");
        $(this).addClass("fa-solid fa-star active");
      } else {
        $(this).removeClass("fa-solid fa-star active");
        $(this).addClass("fa-regular fa-star");
      }
    });
    var selectStarValue = $(this).data("val");
    $("#performanceRate").val(selectStarValue);
  });
  $("#overall i").click(function () {
    var index1 = $(this).index();
    $("#overall i").each(function (index2) {
      if (index1 >= index2) {
        $(this).removeClass("fa-regular fa-star");
        $(this).addClass("fa-solid fa-star active");
      } else {
        $(this).removeClass("fa-solid fa-star active");
        $(this).addClass("fa-regular fa-star");
      }
    });
    var selectStarValue = $(this).data("val");
    $("#overallRate").val(selectStarValue);
  });
  
  /*--------------------start rating -end---------------------*/

  function setStars(jsonData) {
    var data = JSON.parse(jsonData);
    var dressCodeRate = data.dressCodeRate;
    var softSkillRate = data.softSkillRate;
    var technicalSkillRate = data.technicalSkillRate;
    var performanceRate = data.performanceRate;
    var overallRate = data.overallRate;

    $("#dressCode i").each(function (index) {
      if (index < dressCodeRate) {
        $(this)
          .removeClass("fa-regular fa-star")
          .addClass("fa-solid fa-star active");
      } else {
        $(this)
          .removeClass("fa-solid fa-star active")
          .addClass("fa-regular fa-star");
      }
    });
    $("#softSkill i").each(function (index) {
      if (index < softSkillRate) {
        $(this)
          .removeClass("fa-regular fa-star")
          .addClass("fa-solid fa-star active");
      } else {
        $(this)
          .removeClass("fa-solid fa-star active")
          .addClass("fa-regular fa-star");
      }
    });
    $("#technicalSkill i").each(function (index) {
      if (index < technicalSkillRate) {
        $(this)
          .removeClass("fa-regular fa-star")
          .addClass("fa-solid fa-star active");
      } else {
        $(this)
          .removeClass("fa-solid fa-star active")
          .addClass("fa-regular fa-star");
      }
    });
    $("#performance i").each(function (index) {
      if (index < performanceRate) {
        $(this)
          .removeClass("fa-regular fa-star")
          .addClass("fa-solid fa-star active");
      } else {
        $(this)
          .removeClass("fa-solid fa-star active")
          .addClass("fa-regular fa-star");
      }
    });
    $("#overall i").each(function (index) {
      if (index < overallRate) {
        $(this)
          .removeClass("fa-regular fa-star")
          .addClass("fa-solid fa-star active");
      } else {
        $(this)
          .removeClass("fa-solid fa-star active")
          .addClass("fa-regular fa-star");
      }
    });
  }
  function unSetStars() {
    $("#dressCode i").each(function (index) {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#softSkill i").each(function (index) {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#technicalSkill i").each(function (index) {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#performance i").each(function (index) {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#overall i").each(function (index) {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
  }

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    $("#interviewModal").modal("show");
    var id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "queries/interview.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        console.log(res);
        if (res.status == "success") {
          $("#rowId").val(res.data.candidate_id);
          $("#candidate_name").val(res.data.candidate_name);
          $("input[name='interview_status']").prop("checked", false); // Uncheck all first
          $(
            `input[name='interview_status'][value='${res.data.interview_status}']`
          ).prop("checked", true);
          $("#existingStatus").val(res.data.interview_status);
          $("#schedule_time1").val(res.data.available_time1);
          $("#schedule_time2").val(res.data.available_time2);
          $("#schedule_time3").val(res.data.available_time3);
          if (!res.data.ratings || res.data.ratings.trim() === "") {
            console.log("No ratings available.");
            unSetStars();
          } else {
            setStars(res.data.ratings);
          }
          dynamicInputs(res.data.interview_status, res.data.interview_status);
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
    $(".rating-content").hide();
    $(".offered").hide();
    if (selectedValue == 3) {
      $("#updateBtn").hide();
    }
    if (selectedValue == 4) {
      $(".rating-content").show();
      if (existingStatus >= 4) {
        $("#updateBtn").hide();
      } else {
        $("#updateBtn").show();
      }
    }
    if (selectedValue == 5) {
      $(".offered").show();
      $("#updateBtn").show();
    }
    if (selectedValue == 6) {
      $("#updateBtn").show();
    }
    if (selectedValue == 7) {
      $("#updateBtn").show();
    }
    if (selectedValue == 8) {
      $("#updateBtn").show();
    }
  }

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();
    let interview_status = $('input[name="interview_status"]:checked').val();
    // return;
    if (interview_status == 4) {
      let form = ratingsForm();
      if (form === 0) {
        return false;
      }
    }

    let formData = new FormData(this);
    formData.append("flag", "update");

    $.ajax({
      type: "POST",
      url: "queries/interview.php",
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
      success: function (res) {
        if (res.status === "success") {
          if (res.interviewStatus == 4) {
            $("#updateBtn").text("Update").prop("disabled", false);
            $("#interviewModal").modal("hide");
            Swal.fire("Interview status successfully!", "", "success");
            $("#update")[0].reset();
            loadData("", "", "", "", "getAll");
          } else {
            $("#updateBtn").text("Update").prop("disabled", false);
            $("#interviewModal").modal("hide");
            Swal.fire("Interview status successfully!", "", "success");
            $("#update")[0].reset();
            loadData("", "", "", "", "getAll");
          }
        } else {
          handleError(res.message);
        }
      },
      error: function (xhr, status, error) {
        handleError("An error occurred: " + error);
      },
    });
  });

  /** Function to Send Recruitment Mail */
  function feedbackMail(data) {
    console.log(data);
    $.ajax({
      type: "POST",
      url: "mails/recruitment-mail.php",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $("#updateBtn").text("Loading...").prop("disabled", true);
        Swal.fire({
          title: "Interview status update mail sending...",
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
          Swal.fire("Mail send successfully!", "", "success");
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
  function ratingsForm() {
    if ($("#dressCodeRate").val().length == 0) {
      $("#dressCode").focus();
      toastr.error("Kindly rating the candidate dress code");
      return 0;
    }
    if ($("#softSkillRate").val().length == 0) {
      $("#softSkill").focus();
      toastr.error("Kindly rating the soft skill");
      return 0;
    }
    if ($("#technicalSkillRate").val().length == 0) {
      $("#technicalSkill").focus();
      toastr.error("Kindly rating the technical skill");
      return 0;
    }
    if ($("#performanceRate").val().length == 0) {
      $("#performance").focus();
      toastr.error("Kindly rating the performance");
      return 0;
    }
    if ($("#overallRate").val().length == 0) {
      $("#overall").focus();
      toastr.error("Kindly rating the overall");
      return 0;
    }
  }
  /** Interview status update form validate */
});
