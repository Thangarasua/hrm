<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Recruitments</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
						<li class=" active" aria-current="page">Recruitment List</li>
					</ol>
				</nav>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
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
							<option value="10" selected>10</option>
							<option value="15">15</option>
							<option value="20">20</option>
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
								<th>Job Level</th>
								<th>Notice period</th>
								<th>Posted Date</th>
								<th>Handled HR</th>
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
			<form id="create">
				<div class="modal-body pb-0">
					<div class="tab-content" id="">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" name="jobTitle" id="jobTitleSearch" placeholder="e.g: Sales Executies" class="form-control" oninput="capitalizeWords(this)" autocomplete="off" />
										<ul class="list-group addFields" id="jobTitleResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Salary Range <span class="text-danger"> *</span></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<select class="select" name="" id="jobPosition">
													<?php echo getJobLevels(); ?>
												</select>
											</div>
											<div class="input-group-prepend">
												<select class="select" name="" id="salaryType">
													<option value="Annum">Annum</option>
													<option value="Month">Month</option>
												</select>
											</div>
											<input type="text" class="form-control" name="salaryRange" id="salaryRange" placeholder="Select the Position Level" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Description <span class="text-danger"> *</span></label>
										<textarea rows="3" class="form-control" name="jobDescription" id="jobDescription" placeholder="Enter the job's specifics here..."></textarea>
									</div>
								</div>

								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Work Mode <span class="text-danger"> *</span></label>
										<select class="select" name="workMode" id="workMode">
											<option value="">Select</option>
											<option value="On Premises">On Premises</option>
											<option value="Work From Home">Work From Home</option>
											<option value="Hybrid">Hybrid</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Job Type <span class="text-danger"> *</span></label>
										<select class="select" name="jobType" id="jobType">
											<option value="">Select</option>
											<option value="Full Time">Full Time</option>
											<option value="Part Time">Part Time</option>
										</select>
									</div>
								</div>

								<div class="col-md-4">
									<div class="mb-3 position-relative">
										<label class="form-label">Job Level <span class="text-danger"> *</span></label>
										<input type="text" name="jobLevel" id="jobLevelSearch" placeholder="e.g: Entry Level" class="form-control" oninput="capitalizeWords(this)" autocomplete="off" />
										<ul class="list-group addFields" id="jobLevelResult"></ul>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3 position-relative">
										<label class="form-label">Experience <span class="text-danger"> *</span></label>
										<input type="text" name="experience" id="experienceSearch" placeholder="e.g: Fresher" class="form-control" oninput="capitalizeWords(this)" autocomplete="off" />
										<ul class="list-group addFields" id="experienceResult"></ul>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3 position-relative">
										<label class="form-label">Qualification <span class="text-danger"> *</span></label>
										<input type="text" name="qualification" id="qualificationSearch" placeholder="e.g: UG" class="form-control" oninput="capitalizeWords(this)" autocomplete="off" />
										<ul class="list-group addFields" id="qualificationResult"></ul>
									</div>
								</div>
								<div class="col-md-4">
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
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Required Skills <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="requiredSkills" id="requiredSkills" placeholder="Enter the skill's specifics here." autocomplete="off">
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Notice period <span class="text-danger"> *</span></label>
										<select class="select" name="priority" id="priority">
											<option value="">Select</option>
											<option value="Immediate">Immediate</option>
											<option value="15 Days">15 Days</option>
											<option value="30 Days">30 Days</option>
											<option value="45 Days">45 Days</option>
											<option value="60 Days">60 Days</option>
											<option value="90 Days">90 Days</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">No Of Opening <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" onkeypress="return isNumber(event)" name="openings" id="openings" placeholder="Number of openings" autocomplete="off">
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Location <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" oninput="capitalizeWords(this)" name="location" id="location" placeholder="Company branch location" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" id="updateButton">Upload <i class='fa-solid fa-cloud-arrow-up'></i></button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Post Job -->

<!-- Recruitment form send -->
<div class="modal fade" id="sendModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Recruitment Form send</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="send">
				<div class="modal-body pb-0">
					<div class="tab-content" id="">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job ID <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="ticketRequestId" id="send_jobIt" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="jobTitle" id="send_jobTitle" readonly>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="mb-3">
									<h4>Candidate Details</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Name</label>
										<input type="text" class="form-control" name="candidateName" id="candidateName" onkeypress="return isAlphabets(event)" oninput="capitalizeWords(this)" placeholder="Candidate Name" autocomplete="off">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Mail</label>
										<input type="text" class="form-control" name="candidateMail" id="candidateMail" onblur="return isEmail(this)" placeholder="user@example.com" autocomplete="off">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Contact</label>
										<input type="text" class="form-control" name="candidateContact" id="candidateContact" onkeypress="return isNumber(event)" onpaste="numberPasteValidate(event, this)" placeholder="9876543210" autocomplete="off">
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" name="raisedBy" id="send_raised_by">
							<input type="hidden" class="form-control" name="jobSno" id="jobSno">
							<div class="modal-footer">
								<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" id="sendButton" class="btn btn-primary">Send Mail <i class="fa-solid fa-paper-plane"></i></button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Recruitment form send -->

<!-- Update Job Success -->
<div class="modal fade" id="update_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3">
						<i class="fa-solid fa-check"></i>
					</span>
					<h5 class="mb-2">Recruitment update Successfully</h5>
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
<!-- /Update Job Success -->
<!-- Update Job Success -->
<div class="modal fade" id="info_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3">
						<i class="fa-solid fa-info"></i>
					</span>
					<h4 class="mb-2"> <span class="text-danger">Cannot do anything ツ</span></h4>
					<h6>Already <span id="candidateCount"></span> candidates registered.</h6>
					<br>
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
<!-- /Update Job Success -->

<!-- View Post -->
<div class="modal fade" id="viewModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Recruitment Details</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="update">
				<div class="modal-body pb-0">
					<div class="tab-content" id="">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" id="view_jobTitle">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Description <span class="text-danger"> *</span></label>
										<textarea rows="3" class="form-control" id="view_jobDescription"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Job Type <span class="text-danger"> *</span></label>
										<input type="text" name="jobType" id="view_jobType" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Job Level <span class="text-danger"> *</span></label>
										<input type="text" name="jobLevel" id="view_jobLevel" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Experience <span class="text-danger"> *</span></label>
										<input type="text" name="jobLevel" id="view_experience" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Qualification <span class="text-danger"> *</span></label>
										<input type="text" name="qualification" id="view_qual" class="form-control" />
										<ul class="list-group addFields" id="qualificationResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Gender <span class="text-danger"> *</span></label>
										<select class="select" id="view_gender">
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
										<input type="text" class="form-control" id="view_requiredSkills">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Notice period <span class="text-danger"> *</span></label>
										<select class="select" name="priority" id="view_priority">
											<option value="">Select</option>
											<option value="Immediate">Immediate</option>
											<option value="15 Days">15 Days</option>
											<option value="01 Month">01 Month</option>
											<option value="45 Days">45 Days</option>
											<option value="02 Month">02 Month</option>
											<option value="No Limite">No Limite</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Location</label>
										<input type="text" class="form-control" name="location" id="view_location">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /View Post -->
<!-- Edit Post -->
<div class="modal fade" id="editModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Resource Recruitment</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="update">
				<div class="modal-body pb-0">
					<div class="tab-content" id="">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="jobTitle" id="edit_jobTitle" readonly>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Job Description <span class="text-danger"> *</span></label>
										<textarea rows="3" class="form-control input-highlight" name="jobDescription" id="edit_jobDescription"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Job Type <span class="text-danger"> *</span></label>
										<input type="text" name="jobType" id="edit_jobType" placeholder="Work Job Type " class="form-control" readonly />
										<ul class="list-group addFields" id="jobTypeResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Job Level <span class="text-danger"> *</span></label>
										<input type="text" name="jobLevel" id="edit_jobLevel" placeholder="Work Job Level " class="form-control" readonly />
										<ul class="list-group addFields" id="jobLevelResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Experience <span class="text-danger"> *</span></label>
										<input type="text" name="experience" id="edit_experience" placeholder="Work Experience level" class="form-control" readonly />
										<ul class="list-group addFields" id="experienceResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Qualification <span class="text-danger"> *</span></label>
										<input type="text" name="qualification" id="edit_qual" placeholder="Education qualification" class="form-control" readonly />
										<ul class="list-group addFields" id="qualificationResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Gender <span class="text-danger"> *</span></label>
										<select class="select input-highlight" name="gender" id="edit_gender">
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
										<input type="text" class="form-control input-highlight" name="requiredSkills" id="edit_requiredSkills" oninput="capitalizeWords(this)">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Notice period <span class="text-danger"> *</span></label>
										<select class="select input-highlight" name="priority" id="edit_priority">
											<option value="">Select</option>
											<option value="Immediate">Immediate</option>
											<option value="15 Days">15 Days</option>
											<option value="01 Month">01 Month</option>
											<option value="45 Days">45 Days</option>
											<option value="02 Month">02 Month</option>
											<option value="No Limite">No Limite</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Location</label>
										<input type="text" class="form-control input-highlight" name="location" id="edit_location" oninput="capitalizeWords(this)">
									</div>
								</div>
							</div>
							<input type="hidden" name="rowId" id="rowId">
							<div class="modal-footer">
								<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary">Update</button>
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
			<form id="delete">
				<div class="modal-body text-center">
					<span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
						<i class="ti ti-trash-x fs-36"></i>
					</span>
					<h4 class="mb-1">Confirm Delete</h4>
					<p class="mb-3">You want to delete all this items, this cant be undone once you delete.</p>
					<div class="d-flex justify-content-center">
						<input type="hidden" name="deleteId" id="deleteId">
						<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" class="btn btn-danger">Yes, Delete</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<?php require_once("./includes/footer.php"); ?>

<!-- this page java scripts codes -->
<script src="./js/recruitment.js"></script>

<script src="./ajax/job-title.js"></script>
<script src="./ajax/job-type.js"></script>
<script src="./ajax/job-level.js"></script>
<script src="./ajax/experience.js"></script>
<script src="./ajax/qualification.js"></script>