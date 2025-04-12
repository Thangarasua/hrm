$(document).ready(function () {

    var departmentId = $("#loginedDepartmentId").val();

    $(document).on("submit", "#referralAdd", function (e) {
        e.preventDefault();

        let form = formValidate();
        if (form === 0) {
            return false;
        }

        let formData = new FormData(this);
        formData.append("flag", "send");

        $.ajax({
            type: "POST",
            url: "queries/job-openings.php",
            data: formData,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#sendButton")
                    .html("Loading <i class='fa-solid fa-spinner'></i>")
                    .prop("disabled", true);
            },
            success: function (response) {
                if (response.status === "success") { 
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK"
                      }).then((result) => {
                        if (result.isConfirmed) {
                          location.reload(); // Reloads the page
                        }
                      });
                } else {
                    handleError(response.message);
                }
            },
            error: function (xhr, status, error) {
                handleError("An error occurred: " + error);
            },
        });
    });

    /** Function to Handle Errors */
    function handleError(message) {
        Swal.close();
        $("#sendButton")
            .html("Send Mail <i class='fa-solid fa-paper-plane'></i>")
            .prop("disabled", false);
        toastr.error(message, "Error");
    }

    function formValidate() {
        $(".error").remove(); // Remove previous error messages

        let candidateName = $("#candidateName").val().trim();
        if (candidateName.length == 0) {
            $("#candidateName").focus();
            $("#candidateName").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }
        let candidateMail = $("#candidateMail").val().trim();
        if (candidateMail.length == 0) {
            $("#candidateMail").focus();
            $("#candidateMail").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }

        var filter = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!filter.test(candidateMail)) {
            toastr["warning"]("Please enter a valid email!");
            $("#candidateMail").focus();
            $("#candidateMail").after(
                "<small class='error text-danger'>Please enter a valid email!.</small>"
            );
            return 0;
        }

        let candidateContact = $("#candidateContact").val().trim();
        if (candidateContact.length == 0) {
            $("#candidateContact").focus();
            $("#candidateContact").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> mandatory field.</small>"
            );
            return 0;
        }

        let referred = $("#referred").val().trim();
        if (referred.length == 0) {
            $("#referred").focus();
            $("#referred").closest(".mb-3").find(".form-label").after(
                "<small class='error text-danger'> Something went wrong, please again login.</small>"
            );
            return 0;
        }
    }
});
