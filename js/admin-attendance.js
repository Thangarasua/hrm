$(document).ready(function () {
    const path = window.location.pathname;
    function timeToFloat(timeStr) {
        const [hours, minutes, seconds] = timeStr.split(':').map(Number);
        return hours + (minutes / 60) + (seconds / 3600);
    }
    
    function formatHHMM(timeStr) {
        const [hours, minutes] = timeStr.split(':');
        return `${hours}:${minutes}`;
    }

    function fetchAttendance(fromDate, toDate) {
        $.ajax({
            url: "queries/admin-attendance.php",
            type: "POST",
            data: { fromDate:fromDate, toDate:toDate, flag: "fetch" },
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
                              </tr>`;
                  tableBody.append(newRow);
                });
              }
              /*-----data table common comments includes-----*/
              dataTableDesigns();
            },
        });
    }

    function fetchAttendanceRequest(fromDate, toDate) {
        $.ajax({
            url: "queries/admin-attendance.php",
            type: "POST",
            data: { fromDate:fromDate, toDate:toDate, flag: "fetchRequest" },
            dataType: "json",
            success: function (data) {
              var tableBody = $("#tableRecords tbody");
      
              if ($.fn.DataTable.isDataTable("#tableRecords")) {
                $("#tableRecords").DataTable().destroy();
              }
      
              tableBody.empty();
              if (data.length > 0) {
                $.each(data, function (index, row) {
                    let statusClass = row.status === "Pending" ? "badge-danger-transparent" : "badge-success-transparent";
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
                                      <h6 class="fw-medium"><a href="#">${ row.check_in }</a></h6>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.check_out }</a></h6>
                                  </td>
                                  <td>
                                    <span class="badge ${hoursStatusClass} d-inline-flex align-items-center">
                                        <i class="ti ti-clock-hour-11 me-1"></i>${ displayTime } Hrs
                                    </span>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.reason }</a></h6>
                                  </td>
                                  <td>
                                    <span class="badge  ${statusClass} d-inline-flex align-items-center">
                                        <i class="ti ti-point-filled me-1"></i>${ row.status }
                                    </span>
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

    let today = new Date();
    let fromDate = new Date(today.getFullYear(), today.getMonth(), 1);
    let toDate = today;
    function formatDate(date) {
        if (typeof date === 'string') {
            date = new Date(date);
        }
        let mm = String(date.getMonth() + 1).padStart(2, '0');
        let dd = String(date.getDate()).padStart(2, '0');
        let yyyy = date.getFullYear();
        return yyyy + '-' + mm + '-' + dd;
    }
    let formattedFromDate = formatDate(fromDate);
    let formattedToDate = formatDate(toDate);
    if (path.includes("admin-attendance-request")) {
        fetchAttendanceRequest(formattedFromDate, formattedToDate);
    } else if (path.includes("admin-attendance")) {
        fetchAttendance(formattedFromDate, formattedToDate);
    }

    $('#attendanceRange').on('change', function() {
        let attendanceRange = $("#attendanceRange").val();
        let [fromDate, toDate] = attendanceRange.split(" - ");
        let formattedFromDate = formatDate(fromDate);
        let formattedToDate = formatDate(toDate);
        if (path.includes("admin-attendance-request")) {
            fetchAttendanceRequest(formattedFromDate, formattedToDate);
        } else if (path.includes("admin-attendance")) {
            fetchAttendance(formattedFromDate, formattedToDate);
        }
    });
});