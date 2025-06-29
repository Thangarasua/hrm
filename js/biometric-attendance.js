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
            url: "queries/biometric-attendance.php",
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
                    // var bgColor = (index % 2 === 0) ? '#f9f9f9' : '#ffffff';
                    var newRow = `<tr>
                        <td>${index + 1}</td>
                        <td><h6 class="fw-medium"><a href="#">${ row.user_id }</a></h6></td>
                        <td><h6 class="fw-medium"><a href="#">${ row.punch_date }</a></h6></td>
                        <td><h6 class="fw-medium"><a href="#">${ row.check_in }</a></h6></td>
                        <td><h6 class="fw-medium"><a href="#">${ row.check_out }</a></h6></td>
                        <td><h6 class="fw-medium"><a href="#">${ row.total_hours }</a></h6></td>
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
            url: "queries/biometric-attendance.php",
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
                                    <a class="btn btn-success btn-sm me-1 approve-btn" data-id="${row.id}" title="Approve">
                                        <i class="ti ti-circle-check"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm reject-btn" data-id="${row.id}" title="Reject">
                                        <i class="ti ti-circle-x"></i>
                                    </a>
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
    let toDate = new Date(today);
    toDate.setDate(today.getDate() - 1);
   
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
    fetchAttendance(formattedFromDate, formattedToDate);

    $('#attendanceRange').on('change', function() {
        let attendanceRange = $("#attendanceRange").val();
        let [fromDate, toDate] = attendanceRange.split(" - ");
        let formattedFromDate = formatDate(fromDate);
        let formattedToDate = formatDate(toDate);
        fetchAttendance(formattedFromDate, formattedToDate);
    });

    $(document).on('click', '.approve-btn, .reject-btn', function () {
        const id = $(this).data('id');
        const action = $(this).hasClass('approve-btn') ? 'approve' : 'reject';
        $.ajax({
            url: 'queries/biometric-attendance.php',
            type: 'POST',
            data: { id: id, action: action, flag: 'attendanceAction' },
            success: function(response) {
                if (response.status == "success") {
                    toastr.success("Request Updates Successfully");
                    setTimeout(function () {
                        fetchAttendanceRequest(formattedFromDate, formattedToDate);
                    }, 3000);
                    Swal.close();
                }
            }
        });
    });    
});