$(document).ready(function () {
    let employeeID = $("#loginedEmployeeId").val();
    $("#changePassword").on("submit", function (e) {
        e.preventDefault();
        var currentPassword = $("#currentPassword").val();
        var newPassword = $("#newPassword").val();
        var confirmNewPassword = $("#confirmNewPassword").val();
        $(".passwordCheck.error").text(""); 
        $(".currentPasswordCheck.error").text(""); 

        if (!currentPassword) {
            $(".currentPasswordCheck.error").text("Current password is required.");
        } else if (!newPassword || !confirmNewPassword) {
            $(".passwordCheck.error").text("Both password fields are required.");
        } else if (newPassword !== confirmNewPassword) {
            $(".passwordCheck.error").text("Passwords do not match. Please try again.");
        } else {
            let formData = new FormData(this);
            formData.append("flag", "updatePassword");
            formData.append("employeeID", employeeID);
            $.ajax({
                type: "POST",
                url: "queries/commonFunctions.php",
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                if (response.status == "success") {
                    $("#changePassword")[0].reset();
                    $("#change_password").modal("hide");
                    $("#success_modal").modal("show");
                    $("#success_modal_content").html("Password Updated successfully");
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                    Swal.close();
                } else {
                    $(".currentPasswordCheck.error").text("Current password do not match with DB.");
                    toastr.error(response.message, "Error");
                }
                },
            });
        }
    });   

});