<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Jobs</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i></a></li> /
						<li class="">Administration</li> /
						<li class=" active" aria-current="page">Recruitment List</li>
					</ol>
				</nav>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

				<div class="me-2 mb-2">
					<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
						<a href="job-list.php" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
						<a href="job-grid.html" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
					</div>
				</div>
				<div class="me-2 mb-2">

					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
						<i class="ti ti-file-export me-1"></i> Export
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li><a href="javascript:void(0);" class="dropdown-item rounded-1" id="excel_button"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a></li>
							<li><a href="javascript:void(0);" class="dropdown-item rounded-1" id="pdf_button"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a></li>
							<li><a href="javascript:void(0);" class="dropdown-item rounded-1" id="copy_button"><i class="ti ti-file-type-xls me-1"></i>Copy as Text </a></li>
							<li><a href="javascript:void(0);" class="dropdown-item rounded-1" id="csv_button"><i class="ti ti-file-type-xls me-1"></i>Export as CSV </a></li>
							<li><a href="javascript:void(0);" class="dropdown-item rounded-1" id="print_button"><i class="ti ti-file-type-xls me-1"></i>Export as Print </a></li>
						</ul>
					</div>
				</div>
				<div class="mb-2">
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_post" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Post job</a>
				</div>
				<div class="head-icons ms-2">
					<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
						<i class="ti ti-chevrons-up"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
				<h5>Job List</h5>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
					<div class="me-3">
						<div class="form-group">
							<input type="text" id="myInputTextField" class="form-control" placeholder="Search anything..." title="Search any thing in the table you want">
						</div>
					</div>
					<div class="me-3">
						<div class="input-icon-end position-relative">
							<input type="text" class="form-control date-range bookingrange" id="dateRange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
							<span class="input-icon-addon">
								<i class="ti ti-chevron-down"></i>
							</span>
						</div>
					</div>
					<div class="dropdown me-3">
						<select id="customLengthMenu" name="tableRecords_length" aria-controls="tableRecords" class="dropdown-toggle btn btn-white">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="20" selected>20</option>
							<option value="50">50</option>
							<option value="72">72</option>
							<option value="100">100</option>
							<option value="-1">All</option>
						</select>
					</div>
					<div class="dropdown me-3">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							Role
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Senior IOS Developer</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Junior PHP Developer</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Network Engineer</a>
							</li>
						</ul>
					</div>
					<div class="dropdown me-3">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							Select Status
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Accepted</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">sent</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Expired</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Declined</a>
							</li>
						</ul>
					</div>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							Sort By : Last 7 Days
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Recently Added</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Desending</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Last Month</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body p-0">
				<div class="custom-datatable-filter table-responsive">
					<table class="table datatable" id="tableRecords">
						<thead class="thead-light">
							<tr>
								<th>S.No</th>
								<th>Job ID</th>
								<th>Raised By</th>
								<th>Job Title</th>
								<th>Description</th>
								<th>Skill</th>
								<th>Posted Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
		<p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
		<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
	</div>

</div>
<!-- /Page Wrapper -->

<!-- Add Post -->
<div class="modal fade" id="add_post">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Resource Recruitment</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="resourseForm">
				<div class="modal-body pb-0">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="jobTitle" id="jobTitle">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Description <span class="text-danger"> *</span></label>
										<textarea rows="3" class="form-control" name="jobDescription" id="jobDescription"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Type <span class="text-danger"> *</span></label>
										<select class="select" name="jobType" id="jobType">
											<option value="">Select</option>
											<option value="Full Time">Full Time</option>
											<option value="Part Time">Part Time</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Level <span class="text-danger"> *</span></label>
										<select class="select" name="jobLevel" id="jobLevel">
											<option value="">Select</option>
											<option value="Team Lead">Team Lead</option>
											<option value="Manager">Manager</option>
											<option value="Senior">Senior</option>
											<option value="junior">junior</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Experience <span class="text-danger"> *</span></label>
										<select class="select" name="experience" id="experience">
											<option value="">Select</option>
											<option value="Entry Level">Entry Level</option>
											<option value="Mid Level">Mid Level</option>
											<option value="Expert">Expert</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Qualification <span class="text-danger"> *</span></label>
										<select class="select" name="qualification" id="qualification">
											<option value="">Select</option>
											<option value="Bachelore Degree">Bachelore Degree</option>
											<option value="Master Degree">Master Degree</option>
											<option value="Others">Others</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Gender <span class="text-danger"> *</span></label>
										<select class="select" name="gender" id="gender">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Any">Any</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Required Skills</label>
										<input type="text" class="form-control" name="requiredSkills" id="requiredSkills">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="purpose" id="purpose" value="addResource">
								<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary">Save & Next</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Post Job -->

<!-- Add Job Success -->
<div class="modal fade" id="success_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3">
						<i class="fa-solid fa-check"></i>
					</span>
					<h5 class="mb-2">Request add Successfully</h5>
					</p>
					<div>
						<div class="row g-2">
							<div class="col-12">
								<a href="#" class="btn btn-dark w-100" data-bs-dismiss="modal">Back to List</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Add Job Success -->

<!-- Edit Post -->
<div class="modal fade" id="edit_recruitment">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Resource Recruitment</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="resourseForm">
				<div class="modal-body pb-0">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="jobTitle" id="edit_jobTitle">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Description <span class="text-danger"> *</span></label>
										<textarea rows="3" class="form-control" name="jobDescription" id="edit_jobDescription"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Type <span class="text-danger"> *</span></label>
										<select class="select" name="jobType" id="edit_jobType">
											<option value="">Select</option>
											<option value="Full Time">Full Time</option>
											<option value="Part Time">Part Time</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Level <span class="text-danger"> *</span></label>
										<select class="select" name="jobLevel" id="edit_jobLevel">
											<option value="">Select</option>
											<option value="Team Lead">Team Lead</option>
											<option value="Manager">Manager</option>
											<option value="Senior">Senior</option>
											<option value="junior">junior</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Experience <span class="text-danger"> *</span></label>
										<select class="select" name="experience" id="edit_experience">
											<option value="">Select</option>
											<option value="Entry Level">Entry Level</option>
											<option value="Mid Level">Mid Level</option>
											<option value="Expert">Expert</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Qualification <span class="text-danger"> *</span></label>
										<select class="select" name="qualification" id="edit_qualification">
											<option value="">Select</option>
											<option value="Bachelore Degree">Bachelore Degree</option>
											<option value="Master Degree">Master Degree</option>
											<option value="Others">Others</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Gender <span class="text-danger"> *</span></label>
										<select class="select" name="gender" id="edit_gender">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Any">Any</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Required Skills</label>
										<input type="text" class="form-control" name="requiredSkills" id="edit_requiredSkills">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="purpose" id="purpose" value="editResource">
								<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary">Save & Next</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Post -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
					<i class="ti ti-trash-x fs-36"></i>
				</span>
				<h4 class="mb-1">Confirm Delete</h4>
				<p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
				<div class="d-flex justify-content-center">
					<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
					<a href="recruitment-list" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<?php require_once("./includes/footer.php"); ?>

<script>
	//creat profile
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
				url: "queries/resource.php",
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
				url: 'queries/resource.php',
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
				url: "queries/resource.php",
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
</script>