<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

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
											<option value="Permenant">Permenant</option>
											<option value="Temporary">Temporary</option>
											<option value="Seasonal">Seasonal</option>
											<option value="Full-time">Full-time</option>
											<option value="Part-Time">Part-Time</option>
											<option value="Student">Student</option>
											<option value="Apprenticeship">Apprenticeship</option>
											<option value="Employee">Employee</option>
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
									<div class="mb-3 position-relative">
										<label class="form-label">Experience <span class="text-danger"> *</span></label>
										<input type="text" name="search" id="search" placeholder="Work Experience level" class="form-control" />
										<ul class="list-group addFields" id="result"></ul>
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
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Notice period<span class="text-danger"> *</span></label>
										<select class="select" name="priority" id="priority">
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
										<input type="text" class="form-control" name="location" id="location">
									</div>
								</div>
							</div>
							<div class="modal-footer">
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
										<input type="text" class="form-control" name="ticketRequestId" id="send_jobIt">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="jobTitle" id="send_jobTitle">
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
										<input type="text" class="form-control" name="candidateName" id="candidateName" onkeypress="return isAlphabets(event)" placeholder="Candidate Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Mail</label>
										<input type="text" class="form-control" name="candidateMail" id="candidateMail" onblur="return isEmail(this)" placeholder="user@example.com">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Contact</label>
										<input type="text" class="form-control" name="candidateContact" id="candidateContact" onkeypress="return isNumber(event)" placeholder="9876543210">
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

<!-- Edit Post -->
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
									<div class="mb-3">
										<label class="form-label">Job Type <span class="text-danger"> *</span></label>
										<select class="select" id="view_jobType">
											<option value="">Select</option>
											<option value="Permenant">Permenant</option>
											<option value="Temporary">Temporary</option>
											<option value="Seasonal">Seasonal</option>
											<option value="Full-time">Full-time</option>
											<option value="Part-Time">Part-Time</option>
											<option value="Student">Student</option>
											<option value="Apprenticeship">Apprenticeship</option>
											<option value="Employee">Employee</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Level <span class="text-danger"> *</span></label>
										<select class="select" id="view_jobLevel">
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
										<select class="select" id="view_experience">
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
										<select class="select" id="view_qual">
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
<!-- /Edit Post -->
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
											<option value="Permenant">Permenant</option>
											<option value="Temporary">Temporary</option>
											<option value="Seasonal">Seasonal</option>
											<option value="Full-time">Full-time</option>
											<option value="Part-Time">Part-Time</option>
											<option value="Student">Student</option>
											<option value="Apprenticeship">Apprenticeship</option>
											<option value="Employee">Employee</option>
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
										<select class="select" name="qualification" id="edit_qual">
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
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Notice period <span class="text-danger"> *</span></label>
										<select class="select" name="priority" id="edit_priority">
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
										<input type="text" class="form-control" name="location" id="edit_location">
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
					<p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
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

<script>
	$(document).ready(function() {

		$.ajaxSetup({
			cache: false
		});

		$(document).ready(function() {

			let resultList = $('#result');

			// Function to show suggestions
			function showSuggestions(searchField = '') {
				resultList.empty(); 

				let found = false;
				// let expression = new RegExp(searchField, "i");

				$.ajax({
					url: "queries/experience.php",
					type: "GET",
					data: {
						flag: "fetch",
						data: searchField
					},
					dataType: "json",
					success: function(data) { 
						$.each(data, function(key, value) {
							// if (expression.test(value.experience_type) || searchField === '') {
								resultList.append(`<li class="list-group-item link-class"><a>${value.experience_type}</a></li>`);
								found = true;
							// }
						});
						resultList.append(`<span class="list-group-item link-class text-info">Enter any text to add more.</span>`);
						if (!found && searchField.length > 0) {
							resultList.append(`<li class="list-group-item text-primary create-new"><a>Create new: <strong>${searchField}</strong></a></li>`);
						}
					},
				});
			}

			$('#search').on('focus', function() {
				showSuggestions();
			});

			$('#search').on('keyup', function() {
				let searchField = $(this).val().trim();
				showSuggestions(searchField);
			});

			// Hide suggestions when clicking outside
			$(document).on('click', function(event) {
				if (!$(event.target).closest('#search, #result').length) {
					resultList.empty();
				}
			});
		});


		// Click event for selecting a value from the search results
		$('#result').on('click', 'li', function() {
			$('#search').val($(this).text().trim());
			$('#result').empty();
		}); 

		$('#result').on('click', '.create-new', function() {
			let newValue = $(this).find('strong').text().trim();
			$('#search').val(newValue);
			$('#result').empty();

			$.ajax({
				type: "POST",
				url: "queries/experience.php",
				data: {
					flag: "insert",
					experienceType: newValue
				},
				dataType: "json",
				success: function(response) {
					if (response.status === "success") {
						toastr.success("Experience added successfully"); 
					} else {
						toastr.error(response.message || "Failed to add Experience", "Error");
					}
				},
				error: function(xhr, status, error) {
					console.error("AJAX Error:", error);
					toastr.error("Something went wrong. Please try again.", "Error");
				}
			});
		});

	});
</script>