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

     // Update the UI for check-out option
     function updateUIForCheckOut(productionHours = 0) {
        $('#check-in-status').text('Check Out after 9 hours');
        $('#punch-action').text('Check Out');
        $('#production-hours').text('Production: ' + productionHours + ' hrs');
    }

    // Update the UI after checkout
    function updateUIForCheckedOut(productionHours) {
        $('#check-in-status').text('Checked Out');
        $('#punch-action').text('No further action today');
        $('#punch-action').attr('disabled', true);
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
                checkInTime = response.check_in;
                checkOutTime = response.check_out;
                updateUIForCheckOut(response.production_hours);
            }
        }
    });

    // On "Check In" or "Check Out" button click
    $('#punch-action').on('click', function() {
        if (!isCheckedIn) {
            $.ajax({
                url: 'queries/employee-attendance.php',
                method: 'POST',
                data: { employee_id: employeeId, record_date: currentDate, check_in_time: systemTime, flag: 'CheckIn' },
                success: function(response) {
                    if (response.status == "success") {
                        isCheckedIn = true;
                        toastr.success("Check In Successfully");
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                        Swal.close();
                        updateUIForCheckOut(); 
                    } else {
                        toastr.error(response.message, "Error");
                    }
                }
            })
        } else {
            $.ajax({
                url: 'queries/employee-attendance.php', // PHP script to handle check-out
                method: 'POST',
                data: { employee_id: employeeId, record_date: currentDate, check_in: systemTime, flag: 'CheckOut' },
                success: function(response) {
                    let data = JSON.parse(response);
                    updateUIForCheckedOut(data.production_hours);
                }
            });
        }
    });
});