$(document).ready(function () {
  var fromDate = "";
  var toDate = "";
  var dateRange = "";
  var companyType = "";
  var flag = "getAll";

  loadData(fromDate, toDate, dateRange, companyType, flag);

  function loadData(fromDate, toDate, dateRange, companyType, flag) {
    $.ajax({
      url: "queries/job-offers.php",
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
                    <td>${row.training_offer_send}</td>
                    <td>
                        <div class="d-inline-flex">
                            <a href="${resumeLink}" class="text-gray me-2 fs-16" target="_blank"><i class="fa-solid fa-file-lines"></i></a>
                            <a href="${resumeLink}" class="text-gray fs-16" download><i class="fa-solid fa-download"></i></a>
                        </div>
                    </td>
                    <td><span class="badge border border-success text-success"><i class="ti ti-point-filled"></i>Offer Accepted</span></td>
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

    
});
