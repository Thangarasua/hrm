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
            url: "queries/leaves-employee.php",
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
                    $("#create")[0].reset();
                    $("#updateButton")
                        .html("Add Leave")
                        .prop("disabled", false);
                    $("#add_leaves").modal("hide");
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
            url: "queries/leaves-employee.php",
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
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <p class="fs-14 fw-medium d-flex align-items-center mb-0">${row.policy_name}</p>
                                                <a href="#" class="ms-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="${row.leave_reason}">
                                                    <i class="ti ti-info-circle text-info"></i>
                                                </a>
                                            </div>
                                        </td> 
                                        <td>
                                            <div class="d-flex align-items-center file-name-icon">
                                                <div class="ms-2">
                                                    <h6 class="fw-medium"><a href="javascript:void(0);">${row.fromDate}</a></h6>
                                                    <span class="fs-12 fw-normal ">${row.fromDateDuration}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center file-name-icon">
                                                <div class="ms-2">
                                                    <h6 class="fw-medium"><a href="javascript:void(0);">${row.official_name}</a></h6>
                                                    <span class="fs-12 fw-normal ">${row.reviewed_by}</span>
                                                </div>
                                            </div>
                                        </td> 
                                         <td>
                                            <div class="d-flex align-items-center file-name-icon">
                                                <div class="ms-2">
                                                    <h6 class="fw-medium"><a href="javascript:void(0);">${row.toDate}</a></h6>
                                                    <span class="fs-12 fw-normal ">${row.toDateDuration}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>${row.days}</td> 
                                        <td>${row.applied_at}</td>
                                        <td>${row.leaveStatus}</td>
                                        </td>
                                        <td>
                                            <div class="action-icon d-inline-flex">
                                                <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_leaves"><i class="ti ti-edit"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>`;
                        tableBody.append(newRow);
                        // Reinitialize Bootstrap tooltips
                        $('[data-bs-toggle="tooltip"]').tooltip();
                    });
                }
                /*-----data table common comments includes-----*/
                dataTableDesigns();
            },
        });
    }

    $(document).on('change', '#dayType', function () {
        var type = $(this).val();

        if (type == 1) {
            $('.date').show();
            $('.fromDate').hide();
            $('.toDate').hide();
        } else {
            $('.date').hide();
            $('.fromDate').show();
            $('.toDate').show();
        }
    });



    function formValidate() {
        $(".error").remove(); // Remove previous error messages

        let leaveType = $("#leaveType").val().trim();
        if (leaveType.length == 0) {
            $("#leaveType").focus();
            $("#leaveType").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }

        let dayType = $("#dayType").val().trim();
        if (dayType.length == 0) {
            $("#dayType").focus();
            $("#dayType").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }

        if (dayType == 1) {

            let singleDate = $("#singleDate").val().trim();
            if (singleDate.length == 0) {
                $("#singleDate").focus();
                $("#singleDate").closest(".mb-3").find(".form-label").after(
                    "<small class='error text-danger'> mandatory field.</small>"
                );
                return 0;
            }

        } else {
            let fromDate = $("#fromDate").val().trim();
            if (fromDate.length == 0) {
                $("#fromDate").focus();
                $("#fromDate").closest(".mb-3").find(".form-label").after(
                    "<small class='error text-danger'> mandatory field.</small>"
                );
                return 0;
            }
            let toDate = $("#toDate").val().trim();
            if (toDate.length == 0) {
                $("#toDate").focus();
                $("#toDate").closest(".mb-3").find(".form-label").after(
                    "<small class='error text-danger'> mandatory field.</small>"
                );
                return 0;
            }
        }

        let leaveReason = $("#leaveReason").val().trim();
        if (leaveReason.length == 0) {
            $("#leaveReason").focus();
            $("#leaveReason").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }
        return 1;
    }
});
