<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<?php
if (isset($_GET['id'])) {
	$jobID = base64_decode($_GET['id']);
	$flag = 'jobApplications';
} else {
	$jobID = '';
	$flag = 'getAll';
}
?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Candidates List</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
						<li class=" active" aria-current="page">Candidate List</li>
					</ol>
				</nav>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
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
				<h5>Candidates List</h5>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
					<div class="me-3">
						<div class="form-group">
							<input type="text" id="myInputTextField" class="form-control" placeholder="Search anything..." title="Search any thing in the table you want">
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
						<a href="javascript:void(0);"
							class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
							data-bs-toggle="dropdown">
							Role
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Accountant</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Accountant</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Technician</a>
							</li>
						</ul>
					</div>
					<div class="dropdown me-3">
						<a href="javascript:void(0);"
							class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
							data-bs-toggle="dropdown">
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
						<a href="javascript:void(0);"
							class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
							data-bs-toggle="dropdown">
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
								<th class="no-sort">S.No</th>
								<th>Cand ID</th>
								<th>Candidate</th>
								<th>Applied Role</th>
								<th>Phone</th>
								<th>Applied Date</th> 
								<th>Resume</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
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

<!-- Edit interview details -->
<div class="modal fade" id="interviewModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<span>.</span>
				<h4 class="modal-title">interview Details update</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="update">
				<div class="modal-body pb-0">
					<div class="tab-content" id="">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
							<input type="hidden" id="existingStatus">
							<div class="d-flex justify-content-center">
								<div class="interview-status" role="group">
									<input type="radio" class="btn-check" name="interview_status" id="applied" value="1" autocomplete="off">
									<label class="btn border" for="applied">Applied</label>

									<input type="radio" class="btn-check" name="interview_status" id="shortlisted" value="2" autocomplete="off">
									<label class="btn border" for="shortlisted">Shortlisted</label>

									<input type="radio" class="btn-check" name="interview_status" id="rejected" value="7" autocomplete="off">
									<label class="btn border" for="rejected">Rejected</label>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<div class="modal-body">
					<div class="col-8 m-auto applied-date content-border" style="display: none;">
						<h5 class="text-center">Applied Date: <span id="appliedDate" class="text-primary"></span></h5>
					</div> 
					<div class="shortlisted" style="display: block;">
						<div class="row">
							<div class="mb-3">
								<h4 class="text-center">Candidate Available Date's</h4>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Primary Available Date</label>
									<input type="text" class="form-control" id="schedule_time1" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Secondary Available Date</label>
									<input type="text" class="form-control" id="schedule_time2" disabled>
								</div>
							</div> 
						</div>
						<div class="row sheduleDate" style="display: none;">
							<div class="mb-3">
								<h4 class="text-center">Select interview scheduled Date (By HR only)</h4>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Interview Date</label>
									<input type="date" class="form-control" id="interview_date" name="interview_date" min=<?php echo date('Y-m-d'); ?>>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Interview Time</label>
									<input type="time" class="form-control" id="interview_time" name="interview_time">
								</div>
							</div>
						</div>
						<div class="row sheduledDate" style="display: none;">
							<div class="mb-3">
								<h4 class="text-center">Scheduled Date</h4>
							</div>
							<div class="col-md-8">
								<div class="mb-3">
									<label class="form-label">Scheduled Date</label>
									<input type="text" class="form-control" id="interview_date_edit">
								</div>
							</div> 
						</div>
					</div>
					<div class="rejection-content" style="display: none;">
						<div class="col-md-12">
							<div class="col-md-8 m-auto">
								<div class="mb-3">
									<label class="form-label">Rejection Comments<span class="text-danger"> *</span></label>
									<textarea class="form-control" name="rejection" id="rejection" candidates></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-8 m-auto interviewPage content-border" style="display: none;">
						<h5 class="text-center">Kindly visit the <a href="interview" class="text-primary">interview</a> page.</h5>
					</div> 
				</div>
				<input type="hidden" name="rowId" id="rowId">
				<div class="modal-footer">
					<button type="submit" id="updateBtn" class="btn btn-primary btn-sm">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit interview details -->

<!-- View candidate details -->
<div class="modal fade" id="viewModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Candidate Details</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<div class="modal-body pb-0">
				<div class="tab-content" id="">
					<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
						<div class="row">
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Candidate Register ID</label>
									<input type="text" class="form-control" id="candidate_register_id" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Ticket Request ID</label>
									<input type="text" class="form-control" id="ticket_request_id" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Address</label>
									<input type="text" id="address" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3 position-relative">
									<label class="form-label">Experience</label>
									<input type="text" id="experience" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Available Time</label>
									<input type="text" id="available_time1" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Available Time</label>
									<input type="text" id="available_time2" class="form-control" readonly/>
								</div>
							</div> 
							<div class="col-md-8">
								<div class="mb-3 position-relative">
									<label class="form-label">Skills</label>
									<input type="text" id="skills" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3 position-relative">
									<label class="form-label">Created By</label>
									<input type="text" id="created_by" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3 position-relative">
									<label class="form-label">Recruitment created date</label>
									<input type="text" id="created_at" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3 position-relative">
									<label class="form-label">Interview Scheduled Date</label>
									<input type="text" id="interview_date_view" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3 position-relative">
									<label class="form-label">Interview Re-scheduled Date</label>
									<input type="text" id="interview_re_date_view" class="form-control" readonly/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /View candidate details -->

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
					<a href="" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<input type="hidden" name="flag" id="flag" value="<?php echo $flag; ?>">
<input type="hidden" name="jobID" id="jobID" value="<?php echo $jobID; ?>">

<?php require_once("./includes/footer.php"); ?>
<!-- this page java scripts codes -->
<script src="./js/candidates.js"></script>