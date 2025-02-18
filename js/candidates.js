$(document).ready(function () {


  var fromDate = "";
  var toDate = "";
  var dateRange = "";
  var companyType = "";
  var flag = "getAll";
  loadData(fromDate, toDate, dateRange, companyType, flag);

  function loadData(fromDate, toDate, dateRange, companyType, flag) {


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
                var profileImage = row.profile ? `./uploads/candidate_profile/${row.profile}` : "default-avatar.png";
                var resumeLink = row.resume ? `./uploads/candidate_resume/${row.resume}` : "#";

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
                                <h6 class="fw-medium"><a href="#">${row.candidate_name}</a></h6>
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
                    <td><span class="badge border border-purple text-purple"><i class="fa-solid fa-circle-dot"></i> ${row.responce_status == "0" ? "Pending" : "Reviewed"}</span></td>
                    <td>
                        <div class="action-icon d-inline-flex">
                            <a href="javascript:void(0);" class="delete-candidate" data-id="${row.candidate_id}" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </td>
                </tr>`;

                tableBody.append(newRow);
            });
        } else {
            tableBody.append('<tr><td colspan="9" class="text-center">No candidates found</td></tr>');
        }

        // Reinitialize DataTable
        $("#tableRecords").DataTable();
    },
    error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
    }
});



  }
});
