$(document).ready(function () {
    getDesignation ($("#designationId").val());
    let employeeID = $("#employeeID").val();
    $("#grossSalary").on("input", calculateSalary);

    $("#editEmployee").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "update");
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
                $("#editEmployee")[0].reset();
                $("#edit_employee").modal("hide");
                $("#editEmployeeSaveBtn")
                  .html("Save <i class='fa-solid fa-cloud-arrow-up'></i>")
                  .prop("disabled", false);
                $("#success_modal").modal("show");
                $("#success_modal_content").html("Employee Updated successfully");
                setTimeout(function() {
                    location.reload();
                }, 3000);
                Swal.close();
            } else {
                toastr.error(response.message, "Error");
            }
            },
        });
    });
    
    $("#addBankInfo").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "bankInfo");
        formData.append("employeeID", employeeID);
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

    $("#addExperienceInfo").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "experienceInfo");
        formData.append("employeeID", employeeID);
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
                    $("#edit_experience").modal("hide");
                    toastr.success("Experience Information Updated Successfully");
                    setTimeout(function() {
                        location.reload();
                      }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            }
        })
    });

    $("#AddEducationInfo").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "educationInfo");
        formData.append("employeeID", employeeID);
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
                    $("#edit_education").modal("hide");
                    toastr.success("Education Information Updated Successfully");
                    setTimeout(function() {
                        location.reload();
                      }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            }
        })
    });

    function calculateSalary() {
        let grossSalary = parseFloat($("#grossSalary").val()) || 0;
        
        let basicSalary = (grossSalary * 0.50).toFixed(2);
        let hra = (basicSalary * 0.50).toFixed(2);
        let conveyance = 1600;
        let medicalAllowance = 1250;
        let perDiem = 500;
        let specialAllowance = (grossSalary - basicSalary - hra - conveyance - medicalAllowance - perDiem).toFixed(2);
        
        // Deductions
        let pfEmployee = (basicSalary <= 15000) ? (basicSalary * 0.12).toFixed(2) : (15000 * 0.12).toFixed(2);
        let pfEmployer = (basicSalary <= 15000) ? (basicSalary * 0.13).toFixed(2) : (15000 * 0.13).toFixed(2);
        let esiEmployee = (grossSalary < 21000) ? (grossSalary * 0.0075).toFixed(2) : "0.00";
        let esiEmployer = (grossSalary < 21000) ? (grossSalary * 0.0325).toFixed(2) : "0.00";
        let professionalTax = 208.33;
        
        let totalDeductions = (parseFloat(pfEmployee) + parseFloat(esiEmployee) + professionalTax).toFixed(2);
        let netSalary = (grossSalary - totalDeductions).toFixed(2);
        let ctc = (parseFloat(grossSalary) + parseFloat(pfEmployer) + parseFloat(esiEmployer)).toFixed(2);
        let yearCtc = ctc * 12;

        // Fill the fields
        $("#basicSalary").val(basicSalary);
        $("#hra").val(hra);
        $("#conveyance").val(conveyance);
        $("#medicalAllowance").val(medicalAllowance);
        $("#perDiem").val(perDiem);
        $("#specialAllowance").val(specialAllowance);
        $("#pfEmployee").val(pfEmployee);
        $("#pfEmployer").val(pfEmployer);
        $("#esiEmployee").val(esiEmployee);
        $("#esiEmployer").val(esiEmployer);
        $("#professionalTax").val(professionalTax);
        $("#totalDeductions").val(totalDeductions);
        $("#netSalary").val(netSalary);
        $("#ctc").val(ctc);
        $("#MonthCtc").val(ctc);
        $("#yearCtc").val(yearCtc);
    };

    $("#role, #department").change(function () {
        getDesignation ();
    });

    function getDesignation (currentID = null) {
        let roleId = $("#role").val().trim();
        if (roleId.length == 0) {
            $("#role").focus();
            toastr["warning"]("First select Hierarchy");
            return 0;
        }
        var departmentId = $("#department").val();
        if (departmentId) {
            $.ajax({
            url: "queries/employee.php",
            type: "GET",
            data: {
                departmentId: departmentId,
                roleId: roleId,
                flag: "getDesignation",
            },
            success: function (response) {
                $("#designation").html(response);
                if (currentID) {
                    $("#designation").val(currentID);
                }
            },
            });
        } else {
            $("#designation").html('<option value="">Select</option>');
        }
    };

    $('#startDate, #endDate').on('dp.change', function (e) {
        var startDate = $("#startDate").val().trim();
        var endDate = $("#endDate").val().trim();

        if (startDate && endDate) {
            var startMoment = moment(startDate, 'DD/MM/YYYY');
            var endMoment = moment(endDate, 'DD/MM/YYYY');

            if (startMoment.isBefore(endMoment)) {
                var years = endMoment.diff(startMoment, 'years');
                startMoment.add(years, 'years');
                var months = endMoment.diff(startMoment, 'months');
                var totalExperience = years + (months / 12);
                $('#workExperience').val(totalExperience.toFixed(1));
            } else {
                alert('Start Date should be before End Date');
            }
        }
    });
});