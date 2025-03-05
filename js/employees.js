$(document).ready(function () {
    $("#addEmployee").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "insert");
        $.ajax({
          type: "POST",
          url: "queries/employee.php",
          data: formData,
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            if (response.status == "success") {
              $("#add_employee").modal("hide");
              toastr.success("Employee added successfully");
            //   fetchDepartments();
            } else {
              toastr.error(response.message, "Error");
            }
          },
        });
      });
});