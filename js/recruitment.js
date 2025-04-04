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
      beforeSend: function () {
        $("#updateButton")
          .html("Loading <i class='fa-solid fa-spinner'></i>")
          .prop("disabled", true);
      },
      success: function (response) {
        if (response.status == "success") {
          $("#success_modal").modal("show");
          $("#success_modal_content").html("Request add Successfully");
          $("#create")[0].reset();
          $("#updateButton")
            .html("Upload <i class='fa-solid fa-cloud-arrow-up'></i>")
            .prop("disabled", false);
          $("#add_post").modal("hide");
          loadData("", "", "", "", "getAll");
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });

  var departmentId = $("#loginedDepartmentId").val();

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
            if (departmentId == 5) {
              var send = `<a href="#" data-id="${row.id}" class="send" title="Send application form by HR only"> <i class="fa-solid fa-paper-plane"></i></a>`;
            } else {
              var send = ``;
            }

            var newRow = `<tr>
                            <td>${index + 1}</td>
                            <td>${row.ticket_request_id}</td>
                            <td class="pointer" title="${row.official_name} || ${row.designation_title}">${row.raised_by}</td>
                            <td>
                              <div class="d-flex align-items-center file-name-icon">
                                <div class="ms-2">
                                  <h6 class="fw-medium">${row.job_position}</h6>
                                  <a href="candidates?id=${row.encoded_id}"><span class="d-block mt-1">${row.apllications} Applicants</span></a>
                                </div>
                              </div>
                            </td>
                            <td>${row.job_level}</td>
                            <td title="click to view all no.of application send" data-id="${row.ticket_request_id}" class="listOfSendings"><span class="badge badge-success d-inline-flex align-items-center pointer">${row.application_sends} candidate <i class="fa-solid fa-users"></i></span></td>
                            <td>${row.created_at}</td> 
                            <td>
                              <div class="action-icon d-inline-flex">
                                <a href="#" data-id="${row.id}" class="view">
                                  <i class="fa-solid fa-eye" title="View all details"></i>
                                </a>
                                <a href="#" data-id="${row.id}" data-formfilling="${row.apllications}" class="edit" title="Edit the existing details">
                                  <i class="fa-solid fa-pen-to-square" title="edit details"></i>
                                </a>
                                <a href="#" data-id="${row.id}" data-formfilling="${row.apllications}" class="delete" title="Confirm Before Delete">
                                  <i class="fa-solid fa-trash-can"></i>
                                </a>
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
    });
  }

  $(document).on("change", "#jobPosition, #salaryType", function (e) {
    e.preventDefault();
    var id = $('#jobPosition').val();
    var type = $('#salaryType').val();
    $.ajax({
      type: "POST",
      url: "queries/salary-structure.php",
      data: {
        id: id,
        type: type,
        flag: "salaryRange",
      },
      cache: false,
      success: function (res) {
        if (res.status == "success") {
          $("#salaryRange").val(res.data);
        } else {
          $("#jobPosition").val('');
          $("#salaryRange").val('');
          Swal.fire({
            icon: "info",
            title: res.message,
            showCancelButton: true,
            confirmButtonText: "Set Salary Range👈",
          }).then((result) => {
            if (result.isConfirmed) {
              window.open("salary-structure", "_blank");
            }
          });
        }
      },
    });
  })

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var formfilling = $(this).data("formfilling");
    if (formfilling > 0) {
      $("#candidateCount").html(formfilling);
      $("#info_modal").modal("show");
      return false;
    }
    $("#editModal").modal("show");

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
          $("#edit_salaryRange").val(res.data.salary_range);
          $("#edit_jobDescription").val(res.data.job_descriptions);
          $("#edit_workMode").val(res.data.work_mode).trigger("change");
          $("#edit_jobType").val(res.data.job_type).trigger("change");
          $("#edit_jobLevel").val(res.data.job_level).trigger("change");
          $("#edit_experience").val(res.data.job_experience).trigger("change");
          $("#edit_qual").val(res.data.qualification).trigger("change");
          $("#edit_gender").val(res.data.gender).trigger("change");
          $("#edit_requiredSkills").val(res.data.required_skills);
          $("#edit_priority").val(res.data.priority).trigger("change");
          $("#edit_openings").val(res.data.openings);
          $("#edit_location").val(res.data.location);
        } else {
          Swal.fire(res.data.message);
        }
      },
    });
  });

  $(document).on("click", ".listOfSendings", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $("#applicationsModal").modal("show");
    $.ajax({
      type: "POST",
      url: "queries/recruitment.php",
      data: {
        id: id,
        flag: "getCandidates",
      },
      cache: false,
      success: function (data) {
        var tableBody = $("#modalTableRecords tbody");

        if ($.fn.DataTable.isDataTable("#modalTableRecords")) {
          $("#modalTableRecords").DataTable().destroy();
        }

        tableBody.empty();
        // Check if data is not empty
        if (data.length > 0) {
          $.each(data, function (index, row) {
            var status = (row.responce_status == 0) ? '<span class="badge badge-danger">Not Submit</i></span>' : '<span class="badge badge-success">Submited</i></span>';
            var newRow = `<tr> 
								<td>${index + 1}</td>
								<td>${row.candidate_register_id}</td>
								<td>${row.candidate_name}</td> 
                <td class='pointer'>${row.email}</td>
								<td title="${row.employee_id}" class="pointer">${row.official_name}${row.batch}(${row.idNumber})</td>
								<td>${row.created_at}</td> 
								<td>${status}</td>
							</tr>`;
            tableBody.append(newRow);
          });
        }
        /*-----data table common comments includes-----*/
        // new DataTable('#modalTableRecords'); 
        modalTable = $("#modalTableRecords").DataTable({
          pageLength: 10,
          lengthChange: false,
          language: {
            search: "",
          }
        })
        //customise the dataTable search modalTable column value
        modalTable = $("#modalTableRecords").DataTable();
        $("#modalSearch").keyup(function () {
          modalTable.search($(this).val()).draw();
        });
        //customise the dataTable no of records show
        $("#modalLengthMenu").on("change", function () {
          var length = $(this).val();
          modalTable.page.len(length).draw();
        });

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
          console.log(res.data);
          $("#rowId").val(res.data.id);
          $("#view_jobTitle").val(res.data.job_position);
          $("#view_salaryRange").val(res.data.salary_range);
          $("#view_jobDescription").val(res.data.job_descriptions);
          $("#view_workMode").val(res.data.work_mode).trigger("change");
          $("#view_jobType").val(res.data.job_type).trigger("change");
          $("#view_jobLevel").val(res.data.job_level).trigger("change");
          $("#view_experience").val(res.data.job_experience).trigger("change");
          $("#view_qual").val(res.data.qualification).trigger("change");
          $("#view_gender").val(res.data.gender).trigger("change");
          $("#view_requiredSkills").val(res.data.required_skills);
          $("#view_priority").val(res.data.priority).trigger("change");
          $("#view_openings").val(res.data.openings);
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

  function formValidate() {
    $(".error").remove(); // Remove previous error messages

    let jobTitleSearch = $("#jobTitleSearch").val().trim();
    if (jobTitleSearch.length == 0) {
      $("#jobTitleSearch").focus();
      $("#jobTitleSearch").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let salaryRange = $("#salaryRange").val().trim();
    if (salaryRange.length == 0) {
      $("#salaryRange").focus();
      $("#salaryRange").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobDescription = $("#jobDescription").val().trim();
    if (jobDescription.length == 0) {
      $("#jobDescription").focus();
      $("#jobDescription").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let workMode = $("#workMode").val().trim();
    if (workMode.length == 0) {
      $("#workMode").focus();
      $("#workMode").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobType = $("#jobType").val().trim();
    if (jobType.length == 0) {
      $("#jobType").focus();
      $("#jobType").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let jobLevelSearch = $("#jobLevelSearch").val().trim();
    if (jobLevelSearch.length == 0) {
      $("#jobLevelSearch").focus();
      $("#jobLevelSearch").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let experienceSearch = $("#experienceSearch").val().trim();
    if (experienceSearch.length == 0) {
      $("#experienceSearch").focus();
      $("#experienceSearch").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let qualificationSearch = $("#qualificationSearch").val().trim();
    if (qualificationSearch.length == 0) {
      $("#qualificationSearch").focus();
      $("#qualificationSearch").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let gender = $("#gender").val().trim();
    if (gender.length == 0) {
      $("#gender").focus();
      $("#gender").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let requiredSkills = $("#requiredSkills").val().trim();
    if (requiredSkills.length == 0) {
      $("#requiredSkills").focus();
      $("#requiredSkills").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let priority = $("#priority").val().trim();
    if (priority.length == 0) {
      $("#priority").focus();
      $("#priority").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let openings = $("#openings").val().trim();
    if (openings.length == 0 || openings === '0') {
      $("#openings").focus();
      $("#openings").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let location = $("#location").val().trim();
    if (location.length == 0) {
      $("#location").focus();
      $("#location").closest(".mb-3").find(".form-label").after(
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
    let openings = $("#edit_openings").val().trim();
    if (openings.length == 0 || openings === '0') {
      $("#edit_openings").focus();
      $("#edit_openings").closest(".mb-3").find(".form-label").after(
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
