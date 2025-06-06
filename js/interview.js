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
        console.log(data);
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
                    <td class='pointer' title='${row.job_position
              }'>${row.job_position.substr(0, 23)}</td>
                    <td>${row.contact_number}</td>
                    <td>${row.interview_date}</td>
                    <td>
                        <div class="d-inline-flex">
                            <a href="${resumeLink}" class="text-gray me-2 fs-16" target="_blank"><i class="fa-solid fa-file-lines"></i></a>
                            <a href="${resumeLink}" class="text-gray fs-16" download><i class="fa-solid fa-download"></i></a>
                        </div>
                    </td>
                    <td>${inertview_status}</td>
                    <td>
                        <div class="action-icon d-inline-flex"> 
                          <a href="#" data-id="${row.candidate_id
              }" class="view">
                            <i class="fa-solid fa-eye" title="view details"></i>
                          </a>
                          <a href="#" data-id="${row.candidate_id
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
    $("#dressCode i").each(function () {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#softSkill i").each(function () {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#technicalSkill i").each(function () {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#performance i").each(function () {
      $(this)
        .removeClass("fa-solid fa-star active")
        .addClass("fa-regular fa-star");
    });
    $("#overall i").each(function () {
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
          $("#interviewDate").html(res.data.interview_date);
          if (!res.data.ratings || res.data.ratings.trim() === "") {
            unSetStars();
            $(".feedback-content").hide();
          } else {
            setStars(res.data.ratings);
            $(".feedback-content").show();
            $("#rating_by").html(res.data.official_name);
            $("#interview_feedback").html(
              res.data.interview_feedback ??
              "Candidate still not given the feedback"
            );
          }
          if (res.data.training_offer_send) {
            $(".offerContent").show();
            $("#joingDate").html(moment(res.data.training_offer_send).format("MMMM D, YYYY [at] h:mm A"));
            if(res.data.training_offer_status == 0){
              $("#offerResponce").html('Still Not response');
            }else if(res.data.training_offer_status == 1){
              $("#offerResponce").html('Accept the offer');
            }else{
              $("#offerResponce").html('Reject the offer');
            }
          }
          if (res.data.candidate_rejection_comment) {
            $("#rejection").html(res.data.candidate_rejection_comment);
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
    var selectedValue = val1;
    var existingStatus = val2;


    $("#updateButton").hide();
    $(".scheduled-date").hide();
    $(".rating-content").hide();
    $(".not-attend").hide();
    $(".send-offer").hide();
    $(".rejection-content").hide();
    $(".offerDate").hide();

    if (selectedValue == 3) {
      $(".scheduled-date").show();
      $("#updateButton").hide();
    }
    if (selectedValue == 4) {
      $(".rating-content").show();
      if (existingStatus >= 4) {
        $("#updateButton").hide();
      } else {
        $("#updateButton").show();
      }
    }
    if (selectedValue == 9) {
      $(".not-attend").show();
      if (existingStatus == 9) {
        $("#updateButton").hide();
      } else {
        $("#updateButton").show();
      }
    }
    if (selectedValue == 5) {
      if (existingStatus == 5) {
        $(".send-offer").hide();
        $(".offerDate").show();
        $("#updateButton").hide();
      } else {
        $(".send-offer").show();
        $("#updateButton").show();
      }
    }
    if (selectedValue == 6) {
      if (existingStatus == 6) {
        $("#updateButton").hide();
      } else {
        $("#updateButton").show();
      }
    }
    if (selectedValue == 7) {
      if (existingStatus == 7) {
        $(".rejection-content").show();
        $("#updateButton").hide();
      } else {
        $(".rejection-content").show();
        $("#updateButton").show();
      }
    }
    if (selectedValue == 8) {
      if (existingStatus == 8) {
        $("#updateButton").hide();
      } else {
        $("#updateButton").show();
      }
    }

    if (existingStatus == 7) {
      $("#updateButton").hide();
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
    if (interview_status == 5) {
      let form = offerFormValidate();
      if (form === 0) {
        return false;
      }
    }
    if (interview_status == 7) {
      let form = rejection();
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
        $("#updateButton")
          .html("Loading <i class='fa-solid fa-spinner'></i>")
          .prop("disabled", true);
        Swal.fire({
          title: "It's processing Please wait...",
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (res) {
        if (res.status === "success") {
          if (res.data.interview_status == 4) {
            interviewUpdateMail(res.data);
          } else if (res.data.interview_status == 5) {
            interviewUpdateMail(res.data);
          } else if (res.data.interview_status == 7) {
            interviewUpdateMail(res.data);
          } else {
            $("#update")[0].reset();
            $("#updateButton")
              .html("Update <i class='fa-solid fa-cloud-arrow-up'></i>")
              .prop("disabled", false);
            $("#interviewModal").modal("hide");
            $("#success_modal").modal("show");
            $("#success_modal_content").html(
              "Interview status Updated successfully!"
            );
            Swal.close();
            loadData("", "", "", "", "getAll");
          }
        } else {
          $("#updateButton")
            .html("Update <i class='fa-solid fa-cloud-arrow-up'></i>")
            .prop("disabled", false);
          handleError(res.message);
        }
      },
      error: function (xhr, status, error) {
        handleError("An error occurred: " + error);
      },
    });
  });

  /** Function to Send Recruitment Mail */
  function interviewUpdateMail(data) {
    $.ajax({
      type: "POST",
      url: "mails/recruitment-mail.php",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $("#updateButton")
          .html("Loading <i class='fa-solid fa-spinner'></i>")
          .prop("disabled", true);
        Swal.fire({
          title: "Interview Status Update Mail 📨 Sending...",
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
          $("#updateButton")
            .html("Update <i class='fa-solid fa-cloud-arrow-up'></i>")
            .prop("disabled", false);
          $("#interviewModal").modal("hide");
          $("#success_modal").modal("show");
          $("#success_modal_content").html(
            "Interview status Updated successfully!"
          );
          Swal.close();
          loadData("", "", "", "", "getAll");
        } else {
          $("#updateButton")
            .html("Update <i class='fa-solid fa-cloud-arrow-up'></i>")
            .prop("disabled", false);
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
  function offerFormValidate() {
    $(".error").remove();
    if ($("#joining_date").val().length == 0) {
      $("#joining_date")
        .closest(".mb-3")
        .find(".form-label")
        .after("<small class='error text-danger'> mandatory field.</small>");
      return 0;
    }
    if ($("#joining_time").val().length == 0) {
      $("#joining_time")
        .closest(".mb-3")
        .find(".form-label")
        .after("<small class='error text-danger'> mandatory field.</small>");
      return 0;
    }
    if ($("#offer_salary").val().length == 0) {
      $("#offer_salary")
        .closest(".input-group")
        .closest(".col-md-4")
        .find("label.form-label")
        .after("<small class='error text-danger'>Mandatory field.</small>");

      return 0;
    }
  }
  function rejection() {
    $(".error").remove();
    if ($("#rejection").val().length == 0) {
      $("#rejection")
        .closest(".mb-3")
        .find(".form-label")
        .after("<small class='error text-danger'> mandatory field.</small>");
      return 0;
    }
  }
  /** Interview status update form validate */
});
