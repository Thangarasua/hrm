$(document).ready(function () {
  // Submit form data via Ajax
  $("#addLeavePolicy").on("submit", function (e) {
    e.preventDefault();
    form = formValidate();
    if (form == 0) {
      return false;
    }

    let formData = new FormData(this);
    formData.append("flag", "insert");
    $.ajax({
      type: "POST",
      url: "queries/leave-settings.php",
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
          $("#success_modal_content").html(response.message);
          $("#addLeavePolicy")[0].reset();
          $("#updateButton")
            .html("Upload <i class='fa-solid fa-cloud-arrow-up'></i>")
            .prop("disabled", false);
          $("#new_custom_policy").modal("hide");
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
      url: "queries/leave-settings.php",
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
        var tableBody = $("#leavePolicy");

        if ($.fn.DataTable.isDataTable("#tableRecords")) {
          $("#tableRecords").DataTable().destroy();
        }

        tableBody.empty();
        // Check if data is not empty
        if (data.length > 0) {
          $.each(data, function (index, row) {
            if (row.status == 0) {
              var checked = ``;
            } else {
              var checked = `checked`;
            }
            var newDiv = `<div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="form-check form-check-md form-switch me-1">
                                <label class="form-check-label">
                                    <input type="checkbox" role="switch" class="form-check-input" id="leavePolicyStatus" value="${row.id}" ${checked}>
                                </label>
                            </div>
                            <h6 class="d-flex align-items-center">${row.policy_name}</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-gear edit" data-id="${row.id}"></i>
                        </div>
                    </div>
                </div>
            </div>`;
            tableBody.append(newDiv);
          });
        }
        /*-----data table common comments includes-----*/
        dataTableDesigns();
      },
    });
  }

  $(document).on('change', '#leavePolicyStatus', function () {
    var id = $(this).val();
    var activeStatus = $(this).is(':checked') ? 1 : 0;

    $.ajax({
      type: "POST",
      url: "queries/leave-settings.php",
      data: {
        id: id,
        activeStatus: activeStatus,
        flag: "leavePolicyStatus",
      },
      cache: false,
      success: function (response) {
        if (response.status == "success") {
          $("#success_modal").modal("show");
          $("#success_modal_content").html(response.message);
        } else {
          Swal.fire(response.data.message);
        }
      },
    });

  })

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $("#edit_custom_policy").modal("show"); 

    $.ajax({
      type: "POST",
      url: "queries/leave-settings.php",
      data: {
        id: id,
        flag: "getDetails",
      },
      cache: false,
      success: function (response) {
        if (response.status == "success") {
          $("#rowId").val(response.data.id);
          $("#updatePolicyName").val(response.data.policy_name);
          $("#updateDays").val(response.data.days);  
          $("#updateLeaveType").val(response.data.leave_type).trigger('change');
          $("#updateDescription").val(response.data.description); 
        } else {
          Swal.fire(response.data.message);
        }
      },
    });
  });

  $(document).on("submit", "#update", function (e) {
    e.preventDefault();
    form = updateFormValidate();
    if (form == 0) {
      return false;
    }
    let formData = new FormData(this);
    formData.append("flag", "update");
    $.ajax({
      type: "POST",
      url: "queries/leave-settings.php",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == "success") {
          $("#edit_custom_policy").modal("hide");
          $("#success_modal").modal("show");
          $("#success_modal_content").html(response.message);
        } else {
          toastr.error(response.message, "Error");
        }
      },
    });
  });


  function formValidate() {
    $(".error").remove(); // Remove previous error messages

    let policyName = $("#policyName").val().trim();
    if (policyName.length == 0) {
      $("#policyName").focus();
      $("#policyName").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let leaveType = $("#leaveType").val().trim();
    if (leaveType.length == 0) {
      $("#leaveType").focus();
      $("#leaveType").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let description = $("#description").val().trim();
    if (description.length == 0) {
      $("#description").focus();
      $("#description").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    return 1;
  }
  function updateFormValidate() {
    $(".error").remove(); // Remove previous error messages

    let updatePolicyName = $("#updatePolicyName").val().trim();
    if (updatePolicyName.length == 0) {
      $("#updatePolicyName").focus();
      $("#updatePolicyName").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    let updateDescription = $("#updateDescription").val().trim();
    if (updateDescription.length == 0) {
      $("#updateDescription").focus();
      $("#updateDescription").closest(".mb-3").find(".form-label").after(
        "<small class='error text-danger'> mandatory field.</small>"
      );
      return 0;
    }
    return 1;
  }

});
