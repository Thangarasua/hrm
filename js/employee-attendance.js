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
        $('#check-in-status').text('Check Out after 9 hours');
        $('#punch-action').text('Check Out');
        $('#punch-action').attr('href', $('#punch-action').data('href')).removeClass('disabled');
        $('#production-hours').text('Production: ' + productionHours + ' hrs');
    }

    // Update the UI after checkout
    function updateUIForCheckedOut(productionHours) {
        $('#check-in-status').text('Checked Out');
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

    // On "Check In" or "Check Out" button click
    $('#punch-action').on('click', function() {
        if (!isCheckedIn) {
            $.ajax({
                url: 'queries/employee-attendance.php',
                method: 'POST',
                data: { employeeId: employeeId, recordDate: currentDate, checkInTime: systemTime, flag: 'CheckIn' },
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
                url: 'queries/employee-attendance.php',
                method: 'POST',
                data: { employeeId: employeeId, recordDate: currentDate, checkInTime: checkInTime, checkOutTime: systemTime, flag: 'CheckOut' },
                success: function(response) {
                    if (response.status == "success") {
                        toastr.success("Check Out Successfully");
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                        Swal.close();
                        updateUIForCheckedOut(response.productionHours);
                    }
                }
            });
        }
    });
});