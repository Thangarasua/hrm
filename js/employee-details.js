$(document).ready(function () {
    getDesignation($("#designationId").val());
    let employeeID = $("#employeeID").val();
    $("#grossSalary").on("input", calculateSalary);

    const basicTab = new bootstrap.Tab(document.getElementById('basic1-tab'));
    const personalTab = new bootstrap.Tab(document.getElementById('personal-tab'));
    const emergencyContactTab = new bootstrap.Tab(document.getElementById('emergency-contact-tab'));

    // Add event listeners to the buttons
    document.getElementById('nextBasicTab').addEventListener('click', () => {
        personalTab.show();
    });

    document.getElementById('prevBasicTab').addEventListener('click', () => {
        basicTab.show();
    });

    document.getElementById('nextPersonalTab').addEventListener('click', () => {
        emergencyContactTab.show();
    });

    document.getElementById('prevPersonalTab').addEventListener('click', () => {
        personalTab.show();
    });

    $("#nextButton").click(function () {
        $("#office-tab").tab("show"); // Open the "Official Information" tab
    });
    $("#previousButton").click(function () {
        $("#basic-tab").tab("show"); // Open the "Official Information" tab
    });

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
                    setTimeout(function () {
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
                    setTimeout(function () {
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
                    setTimeout(function () {
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
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            }
        })
    });

    $("#addPersonalInfo").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "PersonalInfo");
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
                    $("#edit_personal").modal("hide");
                    toastr.success("Personal Information Updated Successfully");
                    setTimeout(function () {
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
        let ctc = (parseFloat(grossSalary) + parseFloat(pfEmployer) + parseFloat(esiEmployer)).toFixed(0);
        let yearCtc = (ctc * 12).toFixed(0);

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
        getDesignation();
    });

    function getDesignation(currentID = null) {
        let roleId = $("#role").val().trim();
        if (roleId.length == 0) {
            $("#role").focus();
            toastr["warning"]("First select Hierarchy");
            return 0;
        }
        var departmentId = $("#department").val();
        if (departmentId) {
            $.ajax({
                url: "queries/employees.php",
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

    $("#employeeStatus").change(function () {
        let status = $(this).val();
        if (status === "1") {
            $("#relieving-container").hide();
        } else if (status === "0") {
            $("#relieving-container").show();
            $("#relievingDate").attr("required", true);
        } else {
            $("#relieving-container").hide();
        }

    });

    document.querySelectorAll('.edit-education-btn').forEach(button => {
        button.addEventListener('click', ({ currentTarget }) => {
            const category = currentTarget.dataset.category;
            document.getElementById('category').value = category;

            const uploadFieldsContainer = document.getElementById('uploadFieldsContainer');
            uploadFieldsContainer.innerHTML = '';

            addUploadField(category);
        });
    });

    document.getElementById('addMoreUploadFields').addEventListener('click', function () {
        const category = document.getElementById('category').value;
        addUploadField(category);
    });

    function addUploadField(category) {
        const uploadFieldsContainer = document.getElementById('uploadFieldsContainer');

        const newFieldHTML = `
            <div class="mb-3">
                <label for="uploadDocument_${category}">Upload Document for ${category}:</label>
                <input type="file" name="education_documents[]" class="form-control" id="uploadDocument_${category}" accept=".pdf" />
            </div>
        `;

        uploadFieldsContainer.insertAdjacentHTML('beforeend', newFieldHTML);
    }

    $("#addFamilyinformation").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("flag", "familyInfo");
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
                    $("#edit_personal").modal("hide");
                    toastr.success("Family Information Updated Successfully");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            }
        })
    });

    function toggleFields() {
        var maritalStatus = $('#maritalStatus').val();
        if (maritalStatus === 'Yes') {
            $('#employmentSpouseContainer').show();
            $('#childrenContainer').show();
        } else {
            $('#employmentSpouseContainer').hide();
            $('#childrenContainer').hide();
        }
    }

    toggleFields();

    $('#maritalStatus').change(function () {
        toggleFields();
    });


    /*----------------- Start upload preview image with crop -----------------*/

    $('#openFile, #openFile2').on('click', function () {
        $('#fileInput').click();
    });

    var $uploadCrop,
        tempFilename,
        rawImg,
        imageId;

    // Read file and open cropping modal
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#cropImagePop').modal('show');
                $('#fileInput').val('');
                rawImg = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            Swal.fire("Sorry - Image format not accepted.");
        }
    }

    // Croppie initialization
    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200,
        },
        enforceBoundary: false,
        enableExif: true
    });

    // Bind raw image to croppie when modal is shown
    $('#cropImagePop').on('shown.bs.modal', function () {
        $uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function () {
            console.log('Croppie bind complete');
        });
    });

    // When image is selected
    $('.item-img').on('change', function () {
        imageId = $(this).data('id');
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId);
        readFile(this);
    });

    // Crop image and auto-submit form
    $('#cropImageBtn').on('click', function () {
        $uploadCrop.croppie('result', {
            type: 'base64',
            format: 'jpeg',
            size: {
                width: 800,
                height: 800
            },
            quality: 1
        }).then(function (resp) {
            $('#cropedImage').attr('src', resp);
            $('#employeeProfile').val(resp); // set base64 image to hidden input
            $('#cropImagePop').modal('hide');
        });
    });

    // Form AJAX submit
    $("#profileForm").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("flag", "profilePhoto");
        formData.append("employeeID", employeeID); // make sure this variable is defined

        $.ajax({
            url: "queries/employee-details.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log("Upload successful:", response);
                toastr.success("Profile photo uploaded successfully!");
            },
            error: function (xhr, status, error) {
                console.error("Upload failed:", error);
                toastr.error("Upload failed. Please try again.");
            }
        });
    });

    $('#viewProfile').on('click', function () { 
        var profileSrc = $('#cropedImage').attr('src');  
        $('#profilePopupImage').attr('src', profileSrc);
    
        // Show the modal
        $('#profilePopup').modal('show');
    });

    // Documet preview
    $('.previewDocument').on('click', function(e) {
        e.preventDefault();
        const fileUrl = $(this).data('file-url');
        const fileExtension = fileUrl.split('.').pop().toLowerCase();
        $('#previewContent').empty();

        if (fileExtension === 'pdf') {
            $('#previewContent').html('<embed src="' + fileUrl + '" width="100%" height="500px" type="application/pdf" />');
        }
        else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
            $('#previewContent').html('<img src="' + fileUrl + '" alt="Document Preview" width="100%" height="500px" />');
        }
        else {
            $('#previewContent').html('<p>Unsupported file format</p>');
        }
        var modal = new bootstrap.Modal(document.getElementById('documentPreviewModal'));
        modal.show();
    });
});