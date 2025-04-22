$(document).ready(function () {

    var fromDate = "";
    var toDate = "";
    var dateRange = "";
    var leavePolicy = "";
    var flag = "getAll";
    loadData(fromDate, toDate, dateRange, leavePolicy, flag);

    function loadData(fromDate, toDate, dateRange, leavePolicy, flag) {
        $.ajax({
            url: "queries/leaves.php",
            type: "POST",
            dataType: "json",
            data: {
                fromDate: fromDate,
                toDate: toDate,
                dateRange: dateRange,
                leavePolicy: leavePolicy,
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
									<div class="d-flex align-items-center file-name-icon">
										<a href="uploads/employee_documents/profile_photo/${row.profile_photo}" class="avatar avatar-md border avatar-rounded" target="_blank">
											<img src="uploads/employee_documents/profile_photo/${row.profile_photo}" class="img-fluid" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fw-medium"><a href="javascript:void(0);">${row.employee}</a></h6>
											<span class="fs-12 fw-normal ">${row.designation_title}</span>
										</div>
									</div>
								</td>
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
                                            <h6 class="fw-medium"><a href="javascript:void(0);">${row.toDate}</a></h6>
                                            <span class="fs-12 fw-normal ">${row.toDateDuration}</span>
                                        </div>
                                    </div>
                                </td>
								<td>${row.days}</td>
								<td>${row.applied_at}</td>
								<td>${row.leaveStatus}</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="javascript:void(0)" class="me-2 edit" data-id="${row.id}"><i class="ti ti-edit"></i></a> 
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
    //date range sort by date
    function formatDate(date) {
        if (typeof date === 'string') {
            date = new Date(date);
        }
        let mm = String(date.getMonth() + 1).padStart(2, '0');
        let dd = String(date.getDate()).padStart(2, '0');
        let yyyy = date.getFullYear();
        return yyyy + '-' + mm + '-' + dd;
    }
    $('#dateRange').on('change', function () {
        let dateRange = $("#dateRange").val();
        let [fromDate, toDate] = dateRange.split(" - ");
        let formattedFromDate = formatDate(fromDate);
        let formattedToDate = formatDate(toDate);

        var leavePolicy = $('#leavePolicy').val();

        loadData(fromDate = formattedFromDate, toDate = formattedToDate, dateRange = "doubleWay", leavePolicy = leavePolicy, flag = "getAll");
    });

    $(document).on("change", "#leavePolicy", function (e) {
        e.preventDefault();
        let dateRange = $("#dateRange").val();
        console.log(dateRange);
        let [fromDate, toDate] = dateRange.split(" - ");
        let formattedFromDate = formatDate(fromDate);
        let formattedToDate = formatDate(toDate);

        var leavePolicy = $('#leavePolicy').val();
        loadData(fromDate = "", toDate = "", dateRange = "", leavePolicy = leavePolicy, flag = "getAll");

    })
    $(document).on("change", "#approveStatus", function (e) {
        e.preventDefault();
        var id = $('#approveStatus').val();
        if (id == 1) {
            $('.reason').hide();
        } else {
            $('.reason').show();
        }
    })

    $(document).on("click", ".edit", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("#edit_leaves").modal("show");
        $('#rowId').val(id);
    });

    $("#update").on("submit", function (e) {
        e.preventDefault();
        form = formValidate();
        if (form == 0) {
            return false;
        }

        let formData = new FormData(this);
        formData.append("flag", "update");
        $.ajax({
            type: "POST",
            url: "queries/leaves.php",
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
                    $("#update")[0].reset();
                    $("#updateButton")
                        .html("Update")
                        .prop("disabled", false);
                    $("#edit_leaves").modal("hide");
                    loadData("", "", "", "", "getAll");
                } else {
                    toastr.error(response.message, "Error");
                    $("#updateButton")
                        .html("Update")
                        .prop("disabled", false);
                }
            },
        });
    });

    function formValidate() {
        $(".error").remove(); // Remove previous error messages

        let approveStatus = $("#approveStatus").val().trim();
        if (approveStatus.length == 0) {
            $("#approveStatus").focus();
            $("#approveStatus").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }
        if (approveStatus == 2) {
            let reason = $("#reason").val().trim();
            if (reason.length == 0) {
                $("#reason").focus();
                $("#reason").closest(".mb-3").find(".form-label").after(
                    "<small class='error text-danger'> mandatory field.</small>"
                );
                return 0;
            }
        }
    }
});
