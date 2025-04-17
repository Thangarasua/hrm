$(document).ready(function () {
    let employeeId = $("#employeeID").val();
    let isCheckedIn;
    let currentDate = new Date().toISOString().split('T')[0];
    let checkInTime = null;
    let checkOutTime = null;

    let currentTime = new Date();
    let hours = currentTime.getHours().toString().padStart(2, '0'); 
    let minutes = currentTime.getMinutes().toString().padStart(2, '0'); 
    let seconds = currentTime.getSeconds().toString().padStart(2, '0'); 
    let systemTime = `${hours}:${minutes}:${seconds}`;
    var href = $('#punch-action').attr('href');

     // Update the UI for check-out option
     function updateUIForCheckOut(productionHours = 0) {
        $('#check-in-status').text('Log Out after 9 hours');
        $('#punch-action').text('Log Out');
        $('#punch-action').attr('href', $('#punch-action').data('href')).removeClass('disabled');
        $('#production-hours').text('Production: ' + productionHours + ' hrs');
    }

    // Update the UI after checkout
    function updateUIForCheckedOut(productionHours) {
        $('#check-in-status').text('Logged Out');
        $('#punch-action').text('No further action today');
        $('#punch-action').data('href', href).removeAttr('href').addClass('disabled');
        $('#production-hours').text('Production: ' + productionHours + ' hrs');
    }

    // Check if the employee already has a check-in record today
    $.ajax({
        url: 'queries/employee-attendance.php',
        method: 'POST',
        data: { employee_id: employeeId, record_date: currentDate, flag: 'Check' },
        success: function(response) {
            if (response.exists) {
                isCheckedIn = true;
                checkInTime = response.checkIn;
                checkOutTime = response.checkOut;
                productionHours = response.productionHours;
                DateTimeConvert(currentDate, checkInTime);
                (checkOutTime && checkOutTime !== "00:00:00") ? updateUIForCheckedOut(productionHours) : updateUIForCheckOut(productionHours);
            } else {
                $('#punch-action').attr('href', $('#punch-action').data('href')).removeClass('disabled');
            }

        }
    });

    function DateTimeConvert (dateRaw, checkInRaw) {
        let dateTime = new Date(`${dateRaw}T${checkInRaw}`);

        let hours = dateTime.getHours();
        let minutes = dateTime.getMinutes();
        let ampm = hours >= 12 ? 'PM' : 'AM';

        hours = hours % 12;
        hours = hours ? hours : 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;

        let formattedTime = `${hours}:${minutes} ${ampm}`;
        let day = dateTime.getDate();
        let monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        let month = monthNames[dateTime.getMonth()];
        let year = dateTime.getFullYear();

        let formattedDate = `${day} ${month} ${year}`;
        let formattedString = `${formattedTime}, ${formattedDate}`;
        $('#logiInTime').text(formattedString);

    }

    // On "Log In" or "Log Out" button click
    $('#punch-action').on('click', function() {
        if (!isCheckedIn) {
            $.ajax({
                url: 'queries/employee-attendance.php',
                method: 'POST',
                data: { employeeId: employeeId, recordDate: currentDate, checkInTime: systemTime, flag: 'CheckIn' },
                success: function(response) {
                    if (response.status == "success") {
                        isCheckedIn = true;
                        toastr.success("Log In Successfully");
                        setTimeout(function () {
                            updateUIForCheckOut(); 
                        }, 3000);
                        Swal.close();
                    } else {
                        toastr.error(response.message, "Error");
                    }
                }
            })
        } else {
            $.ajax({
                url: 'queries/employee-attendance.php',
                method: 'POST',
                data: { employeeId: employeeId, recordDate: currentDate, checkInTime: checkInTime, checkOutTime: systemTime, flag: 'CheckOut' },
                success: function(response) {
                    if (response.status == "success") {
                        toastr.success("Log Out Successfully");
                        setTimeout(function () {
                            updateUIForCheckedOut(response.productionHours);
                        }, 3000);
                        Swal.close();
                    }
                }
            });
        }
    });

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
            url: "queries/employee-attendance.php",
            type: "POST",
            data: { employeeId: employeeId, flag: "fetch" },
            dataType: "json",
            success: function (data) {
              var tableBody = $("#tableRecords tbody");
      
              if ($.fn.DataTable.isDataTable("#tableRecords")) {
                $("#tableRecords").DataTable().destroy();
              }
      
              tableBody.empty();
              if (data.length > 0) {
                $.each(data, function (index, row) {
                    let statusClass = row.status === "Present" ? "badge-success-transparent" : row.status === "Off" ? "badge-info-transparent" : "badge-danger-transparent";
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
                                      <h6 class="fw-medium"><a href="#">${ row.record_date }</a></h6>
                                  </td>
                                  <td>
                                      <h6 class="fw-medium"><a href="#">${ row.check_in }</a></h6>
                                  </td>
                                  <td>
                                    <span class="badge  ${statusClass} d-inline-flex align-items-center">
                                        <i class="ti ti-point-filled me-1"></i>${ row.status }
                                    </span>
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

    fetchAttendance();
});