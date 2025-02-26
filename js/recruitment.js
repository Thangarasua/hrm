$(document).ready(function () {
  // Submit form data via Ajax
  $("#create").on("submit", function (e) {
    e.preventDefault();
    form = formValidate();
    if (form == 0) {
      return false;
    }

    let formData = new FormData(this);
    formData.append("flag", "insert");
    $.ajax({
      type: "POST",
      url: "queries/recruitment.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#success_modal").modal("show");
          $("#create")[0].reset();
          $("#add_post").modal("hide");
          loadData("", "", "", "", "getAll");
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  var fromDate = "";
  var toDate = "";
  var dateRange = "";
  var companyType = "";
  var flag = "getAll";
  loadData(fromDate, toDate, dateRange, companyType, flag);

  function loadData(fromDate, toDate, dateRange, companyType, flag) {
    $.ajax({
      url: "queries/recruitment.php",
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
            var newRow = `<tr>
                            <td>${index + 1}</td>
                            <td>${row.ticket_request_id}</td>
                            <td>${row.raised_by}</td>
                            <td>
                              <div class="d-flex align-items-center file-name-icon">
                                <div class="ms-2">
                                  <h6 class="fw-medium">${row.job_position}</h6>
                                  <a href="candidates?id=${
                                    row.encoded_id
                                  }"><span class="d-block mt-1">${
              row.candidate_count
            } Applicants</span></a>
                                </div>
                              </div>
                            </td>
                            <td>${row.job_level}</td>
                            <td>${row.priority}</td>
                            <td>${row.created_at.split(" ")[0]}</td>
                            <td>
                              <div class="action-icon d-inline-flex">
                                <a href="#" data-id="${row.id}" class="view">
                                  <i class="fa-solid fa-folder-open"></i>
                                </a>
                                <a href="#" data-id="${row.id}" class="edit">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" data-id="${
                                  row.id
                                }" data-formfilling="${
              row.candidate_count
            }" class="delete">
                                  <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <a href="#" data-id="${row.id}" class="send">
                                  <i class="fa-solid fa-paper-plane"></i>
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
  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    $("#editModal").modal("show");
    var id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "queries/recruitment.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        if (res.status == "success") {
          $("#rowId").val(res.data.id);
          $("#edit_jobTitle").val(res.data.job_position);
          $("#edit_jobDescription").val(res.data.job_descriptions);
          $("#edit_jobType").val(res.data.job_type).trigger("change");
          $("#edit_jobLevel").val(res.data.job_level).trigger("change");
          $("#edit_experience").val(res.data.job_experience).trigger("change");
          $("#edit_qual").val(res.data.qualification).trigger("change");
          $("#edit_gender").val(res.data.gender).trigger("change");
          $("#edit_priority").val(res.data.priority).trigger("change");
          $("#edit_requiredSkills").val(res.data.required_skills);
          $("#edit_location").val(res.data.location);
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $(document).on("click", ".view", function (e) {
    e.preventDefault();
    $("#viewModal").modal("show");
    var id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "queries/recruitment.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        if (res.status == "success") {
          $("#rowId").val(res.data.id);
          $("#view_jobTitle").val(res.data.job_position);
          $("#view_jobDescription").val(res.data.job_descriptions);
          $("#view_jobType").val(res.data.job_type).trigger("change");
          $("#view_jobLevel").val(res.data.job_level).trigger("change");
          $("#view_experience").val(res.data.job_experience).trigger("change");
          $("#view_qual").val(res.data.qualification).trigger("change");
          $("#view_gender").val(res.data.gender).trigger("change");
          $("#view_priority").val(res.data.priority).trigger("change");
          $("#view_requiredSkills").val(res.data.required_skills);
          $("#view_location").val(res.data.location);
        } else {
          Swal.fire(res.data.location);
        }
      },
    });
  });

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();
    form = formValidate2();
    if (form == 0) {
      return false;
    }
    let formData = new FormData(this);
    formData.append("flag", "update");
    $.ajax({
      type: "POST",
      url: "queries/recruitment.php",
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
          loadData("", "", "", "", "getAll");
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
      Swal.fire({
        title: "Can't Delete",
        text: `Can't delete this post, already ${formfilling} candidate register this job`,
        icon: "info"
      });
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
      url: "queries/recruitment.php",
      data: {
        id: id,
        flag: "delete",
      },
      cache: false,
      success: function (response) {
        if (response.status == "success") {
          $("#delete")[0].reset();
          $("#delete_modal").modal("hide");
          loadData("", "", "", "", "getAll");
        } else {
          toastr.error(response.message, "Error");
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
      url: "queries/recruitment.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (res) {
        if (res.status == "success") {
          $("#jobSno").val(res.data.id);
          $("#send_raised_by").val(res.data.raised_by);
          $("#send_jobIt").val(res.data.ticket_request_id);
          $("#send_jobTitle").val(res.data.job_position);
          $("#send_jobDescription").val(res.data.job_descriptions);
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $(document).on("submit", "#send", function (e) {
    e.preventDefault();

    let form = formValidate3();
    if (form === 0) {
      return false;
    }

    let formData = new FormData(this);
    formData.append("flag", "send");

    $.ajax({
      type: "POST",
      url: "queries/recruitment.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#sendButton").text("Loading...").prop("disabled", true);
        Swal.fire({
          title: "Recruitment form sending...",
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (response) {
        if (response.status === "success") {
          sendRecruitmentMail(response.id, response.email, response.flag);
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
  function sendRecruitmentMail(id, email, flag) {
    $.ajax({
      type: "POST",
      url: "mails/recruitment-mail.php",
      data: { id: id, email: email, flag: flag },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#send")[0].reset();
          $("#sendModal").modal("hide");
          Swal.fire("Mail sent successfully!", "", "success");
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

  function formValidate() {
    $(".error").remove(); // Remove previous error messages

    let jobTitle = $("#jobTitle").val().trim();
    if (jobTitle.length == 0) {
      $("#jobTitle").focus();
      $("#jobTitle").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobDescription = $("#jobDescription").val().trim();
    if (jobDescription.length == 0) {
      $("#jobDescription").focus();
      $("#jobDescription").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobType = $("#jobTypeSearch").val().trim();
    if (jobType.length == 0) {
      $("#jobType").focus();
      $("#jobType").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobLevelSearch = $("#jobLevelSearch").val().trim();
    if (jobLevelSearch.length == 0) {
      $("#jobLevelSearch").focus();
      $("#jobLevelSearch").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let experienceSearch = $("#experienceSearch").val().trim();
    if (experienceSearch.length == 0) {
      $("#experienceSearch").focus();
      $("#experienceSearch").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let qualificationSearch = $("#qualificationSearch").val().trim();
    if (qualificationSearch.length == 0) {
      $("#qualificationSearch").focus();
      $("#qualificationSearch").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let gender = $("#gender").val().trim();
    if (gender.length == 0) {
      $("#gender").focus();
      $("#gender").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let requiredSkills = $("#requiredSkills").val().trim();
    if (requiredSkills.length == 0) {
      $("#requiredSkills").focus();
      $("#requiredSkills").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let priority = $("#priority").val().trim();
    if (priority.length == 0) {
      $("#priority").focus();
      $("#priority").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let location = $("#location").val().trim();
    if (location.length == 0) {
      $("#location").focus();
      $("#location").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }

    return 1;
  }

  function formValidate2() {
    $(".error").remove(); // Remove previous error messages

    let jobTitle = $("#edit_jobTitle").val().trim();
    if (jobTitle.length == 0) {
      $("#edit_jobTitle").focus();
      $("#edit_jobTitle").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobDescription = $("#edit_jobDescription").val().trim();
    if (jobDescription.length == 0) {
      $("#edit_jobDescription").focus();
      $("#edit_jobDescription").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobType = $("#edit_jobType").val().trim();
    if (jobType.length == 0) {
      $("#edit_jobType").focus();
      $("#edit_jobType").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobLevel = $("#edit_jobLevel").val().trim();
    if (jobLevel.length == 0) {
      $("#edit_jobLevel").focus();
      $("#edit_jobLevel").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let experience = $("#edit_experience").val().trim();
    if (experience.length == 0) {
      $("#edit_experience").focus();
      $("#edit_experience").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let qualification = $("#edit_qual").val().trim();
    if (qualification.length == 0) {
      $("#edit_qual").focus();
      $("#edit_qual").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let gender = $("#edit_gender").val().trim();
    if (gender.length == 0) {
      $("#edit_gender").focus();
      $("#edit_gender").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let requiredSkills = $("#edit_requiredSkills").val().trim();
    if (requiredSkills.length == 0) {
      $("#edit_requiredSkills").focus();
      $("#edit_requiredSkills").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let priority = $("#edit_priority").val().trim();
    if (priority.length == 0) {
      $("#edit_priority").focus();
      $("#edit_priority").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let location = $("#edit_location").val().trim();
    if (location.length == 0) {
      $("#edit_location").focus();
      $("#edit_location").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }

    return 1;
  }

  function formValidate3() {
    $(".error").remove(); // Remove previous error messages

    let candidateName = $("#candidateName").val().trim();
    if (candidateName.length == 0) {
      $("#candidateName").focus();
      $("#candidateName").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let candidateMail = $("#candidateMail").val().trim();
    if (candidateMail.length == 0) {
      $("#candidateMail").focus();
      $("#candidateMail").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }

    var filter = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!filter.test(candidateMail)) {
      toastr["warning"]("Please enter a valid email!");
      $("#candidateMail").focus();
      $("#candidateMail").after(
        "<small class='error text-danger'>Please enter a valid email!.</small>"
      );
      return 0;
    }

    let candidateContact = $("#candidateContact").val().trim();
    if (candidateContact.length == 0) {
      $("#candidateContact").focus();
      $("#candidateContact").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
  }
});
