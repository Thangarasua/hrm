<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Offers List</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
						<li class=" active" aria-current="page">Offers List</li>
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
				<h5>Offers List</h5>
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
								<th>Joining On</th>
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
									<input type="text" class="form-control" id="candidate_register_id">
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">Ticket Request ID</label>
									<input type="text" class="form-control" id="ticket_request_id">
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">addres</label>
									<input type="text" id="address" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 position-relative">
									<label class="form-label">experience</label>
									<input type="text" id="experience" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 position-relative">
									<label class="form-label">skills</label>
									<input type="text" id="skills" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">available_time1</label>
									<input type="text" id="available_time1" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">available_time2</label>
									<input type="text" id="available_time2" class="form-control" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label">available_time3</label>
									<input type="text" id="available_time3" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 position-relative">
									<label class="form-label">Created By</label>
									<input type="text" id="created_by" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 position-relative">
									<label class="form-label">job created date</label>
									<input type="text" id="created_at" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 position-relative">
									<label class="form-label">Interview Scheduled Date</label>
									<input type="text" id="interview_date_view" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 position-relative">
									<label class="form-label">Interview Re-scheduled Date</label>
									<input type="text" id="interview_re_date_view" class="form-control" />
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

<?php require_once("./includes/footer.php"); ?>
<!-- this page java scripts codes -->
<script src="./js/job-offers.js"></script>