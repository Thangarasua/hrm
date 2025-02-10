$(document).ready(function() {
    // Submit form data via Ajax
    $("#resourseForm").on("submit", function(e) {
        e.preventDefault();
        form = formValidate();
        if (form == 0) {
            return false;
        }
        $.ajax({
            type: "POST",
            url: "queries/recruitment.php",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == "success") {
                    $('#success_modal').modal('show');
                    $('#resourseForm')[0].reset();
                    $('#add_post').modal('hide');
                } else {
                    toastr.error(response.message, "Error");
                }
            },
        });
    });

    function formValidate() {
        $(".error").remove(); // Remove previous error messages

        let jobTitle = $("#jobTitle").val().trim();
        if (jobTitle.length < 1) {
            $("#jobTitle").focus();
            $("#jobTitle").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let jobDescription = $("#jobDescription").val().trim();
        if (jobDescription.length == 0) {
            $("#jobDescription").focus();
            $("#jobDescription").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let jobType = $("#jobType").val().trim();
        if (jobType.length == 0) {
            $("#jobType").focus();
            $("#jobType").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let jobLevel = $("#jobLevel").val().trim();
        if (jobLevel.length == 0) {
            $("#jobLevel").focus();
            $("#jobLevel").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let experience = $("#experience").val().trim();
        if (experience.length == 0) {
            $("#experience").focus();
            $("#experience").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let qualification = $("#qualification").val().trim();
        if (qualification.length == 0) {
            $("#qualification").focus();
            $("#qualification").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let gender = $("#gender").val().trim();
        if (gender.length == 0) {
            $("#gender").focus();
            $("#gender").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }
        let requiredSkills = $("#requiredSkills").val().trim();
        if (requiredSkills.length == 0) {
            $("#requiredSkills").focus();
            $("#requiredSkills").after("<small class='error text-danger'> mandatory field.</small>");
            return 0;
        }

        return 1;
    }

    $("#resourseForm").click(function() {
        $(".error").remove(); // Remove previous error messages for filling form
    });

    var fromDate = '';
    var toDate = '';
    var dateRange = '';
    var companyType = '';
    var purpose = "getAll";
    loadData(fromDate, toDate, dateRange, companyType, purpose);

    function loadData(fromDate, toDate, dateRange, companyType, purpose) {
        $.ajax({
            url: 'queries/recruitment.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'fromDate': fromDate,
                'toDate': toDate,
                'dateRange': dateRange,
                'companyType': companyType,
                'purpose': purpose
            },
            success: function(data) {
                var tableBody = $('#tableRecords tbody');

                if ($.fn.DataTable.isDataTable('#tableRecords')) {
                    $('#tableRecords').DataTable().destroy();
                }

                tableBody.empty();
                // Check if data is not empty
                if (data.length > 0) {
                    $.each(data, function(index, row) {

                        var newRow = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + row.ticket_request_id + '</td>' +
                            '<td>' + row.raised_by + '</td>' +
                            '<td><div class="d-flex align-items-center file-name-icon"><div class="ms-2"><h6 class="fw-medium"><a href="#">' + row.job_position + '</a></h6><span class="d-block mt-1">0 Applicants</span></div></div></td>' +
                            '<td>' + row.job_descriptions.slice(0, 30) + '</td>' +
                            '<td>' + row.required_skills.slice(0, 30) + '</td>' +
                            '<td>' + row.created_at.split(' ')[0] + '</td>' +
                            '<td><div class="action-icon d-inline-flex"><a href="#" data-id="' + row.id + '" class="me-2 edit_recruitment"><i class="fa-solid fa-pen-to-square"></i></a><a href="#" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="fa-solid fa-trash-can"></i></a></div></td>' +
                            '</tr>';
                        tableBody.append(newRow);
                    });
                }
                table = $('#tableRecords').DataTable({
                    //  "bFilter": false,
                    "lengthMenu": false,
                    "pageLength": 20,
                    "language": {
                        "info": "Shows _START_ To _END_ of _TOTAL_ Total",
                        "sLengthMenu": "_MENU_ ",
                        "zeroRecords": "No records available.",
                        "search": "",
                        oPaginate: {
                            sNext: '<i class="fa fa-chevron-right"></i>',
                            sPrevious: '<i class="fa fa-chevron-left"></i>'
                        },
                    },
                    // Add buttons for export functionality
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            text: 'Export to Excel',
                            title: 'Download Excel',
                            className: 'btn btn-success',
                            exportOptions: {
                                columns: ':visible'
                            },
                            className: 'd-none'
                        },
                        {
                            extend: 'pdf',
                            text: 'Export to PDF',
                            title: 'Download PDF',
                            className: 'buttons-pdf',
                            exportOptions: {
                                columns: ':visible'
                            },
                            className: 'd-none'
                        },
                        {
                            extend: 'copy',
                            text: 'Export to copy',
                            title: 'Download copy',
                            className: 'buttons-copy',
                            exportOptions: {
                                columns: ':visible'
                            },
                            className: 'd-none'
                        },
                        {
                            extend: 'csv',
                            text: 'Export to csv',
                            title: 'Download csv',
                            className: 'buttons-csv',
                            exportOptions: {
                                columns: ':visible'
                            },
                            className: 'd-none'
                        },
                        {
                            extend: 'print',
                            text: 'Export to print',
                            title: 'Download print',
                            className: 'buttons-print',
                            exportOptions: {
                                columns: ':visible'
                            },
                            className: 'd-none'
                        }
                    ]
                });

                // When the custom button is clicked, trigger the DataTable's Excel export
                $('#excel_button').on('click', function() {
                    table.button('.buttons-excel').trigger();
                });
                $('#pdf_button').on('click', function() {
                    table.button('.buttons-pdf').trigger();
                });
                $('#copy_button').on('click', function() {
                    table.button('.buttons-copy').trigger();
                });
                $('#csv_button').on('click', function() {
                    table.button('.buttons-csv').trigger();
                });
                $('#print_button').on('click', function() {
                    table.button('.buttons-print').trigger();
                });

                //customise the dataTable search table column value
                oTable = $('#tableRecords').DataTable();
                $('#myInputTextField').keyup(function() {
                    oTable.search($(this).val()).draw();
                })

                //customise the dataTable no of records show
                $('#customLengthMenu').on('change', function() {
                    var length = $(this).val();
                    table.page.len(length).draw();
                });

                /*-----------JQuery(data table) css (style) start----------*/
                $('#tableRecords').css('width', '100%');
                $('.dataTables_filter input').css('width', '350px');
                $('.dataTables_length').css({
                    'position': 'absolute',
                    'right': '33%'
                });
                $('#tableRecords_length select').addClass('form-control');
                $('#tableRecords_filter input').addClass('form-control');

                /*-----------JQuery(data table) css (style) end----------*/

                val = $('#tableRecords_info').html();
                const myArray = val.split("");
                $('#totalCount').html('Total:' + myArray[5]);
            },
        });
    }

    $(document).on('click', '.edit_recruitment', function() {
        $('#edit_recruitment').modal('show');
        id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "queries/recruitment.php",
            data: {
                'id': id,
                'purpose': 'getDetails',
            },
            cache: false,
            success: function(res) {
                if (res.status == 'success') {
                    $('#edit_jobTitle').val(res.data.job_position)
                    $('#edit_jobDescription').val(res.data.job_descriptions)
                    $('#edit_jobType').val(res.data.job_type)
                    $('#edit_jobLevel').val(res.data.job_level)
                    $('#edit_experience').val(res.data.job_experience)
                    $('#edit_qualification').val(res.data.qualification)
                    $('#edit_jobType').append('<option value="'+res.data.job_type+'" selected>'+res.data.job_type+'</option>');
                    $('#edit_jobLevel').append('<option value="'+res.data.job_level+'" selected>'+res.data.job_level+'</option>');
                    $('#edit_experience').append('<option value="'+res.data.job_experience+'" selected>'+res.data.job_experience+'</option>');
                    $('#edit_qualification').append('<option value="'+res.data.qualification+'" selected>'+res.data.qualification+'</option>');
                    $('#edit_gender').append('<option value="'+res.data.gender+'" selected>'+res.data.gender+'</option>');
                    $('#edit_requiredSkills').val(res.data.required_skills)
                } else {
                    Swal.fire(res.data.message);
                }
            }
        })
    })

});