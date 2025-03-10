$(document).ready(function () {
    $("#addBankInfo").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "bankInfo");
        $.ajax({
            type: "POST",
            url: "queries/employee-details.php",
            data: formData,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status == "success") {
                    $("#edit_bank").modal("hide");
                    toastr.success("Bank Information Updated Successfully");
                    setTimeout(function() {
                        location.reload();
                      }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            }
        })
    });
});