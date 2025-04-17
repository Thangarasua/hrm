$(document).ready(function () {
    function timeToFloat(timeStr) {
        const [hours, minutes, seconds] = timeStr.split(':').map(Number);
        return hours + (minutes / 60) + (seconds / 3600);
    }
    
    function formatHHMM(timeStr) {
        const [hours, minutes] = timeStr.split(':');
        return `${hours}:${minutes}`;
    }

    function fetchAttendance() {
        $.ajax({
            url: "queries/admin-attendance.php",
            type: "POST",
            data: { flag: "fetch" },
            dataType: "json",
            success: function (data) {
              var tableBody = $("#tableRecords tbody");
      
              if ($.fn.DataTable.isDataTable("#tableRecords")) {
                $("#tableRecords").DataTable().destroy();
              }
      
              tableBody.empty();
              if (data.length > 0) {
                $.each(data, function (index, row) {
                    let statusClass = row.status === "Present" ? "badge-success-transparent" : "badge-danger-transparent";
                    let hoursStatusClass ='';
                    const timeStr = row.production_hours;
                    const totalHours = timeToFloat(timeStr); // → 4.92
                    const displayTime = formatHHMM(timeStr); // → "04:55"
                    if (totalHours <= 8) {
                        hoursStatusClass = "badge-danger";
                    } else if (totalHours > 9 ) {
                        hoursStatusClass = "badge-info"
                    } else {
                        hoursStatusClass = "badge-success";
                    }
                  var newRow = `<tr>
                                  <td>${index + 1}</td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.employee_id }</a></h6>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.record_date }</a></h6>
                                  </td>
                                  <td>
                                    <span class="badge  ${statusClass} d-inline-flex align-items-center">
                                        <i class="ti ti-point-filled me-1"></i>${ row.status }
                                    </span>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.check_in }</a></h6>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.check_out }</a></h6>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.late_time }</a></h6>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.overtime }</a></h6>
                                  </td>
                                  <td>
                                    <span class="badge ${hoursStatusClass} d-inline-flex align-items-center">
                                        <i class="ti ti-clock-hour-11 me-1"></i>${ displayTime } Hrs
                                    </span>
                                  </td>
                                  <td>
											<div class="action-icon d-inline-flex">
												<a href="#" class="me-2" data-bs-toggle="modal"
													data-bs-target="#edit_attendance"><i class="ti ti-edit"></i></a>
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

    fetchAttendance();
});