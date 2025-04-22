<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Leave Approval</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
						<li class="breadcrumb-item active" aria-current="page">Leave Approval</li>
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
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_leaves" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Leave</a>
				</div>
				<div class="head-icons ms-2">
					<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
						<i class="ti ti-chevrons-up"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Leaves Info -->
		<div class="row">
			<div class="col-xl-3 col-md-6">
				<div class="card bg-green-img">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 me-2">
									<span class="avatar avatar-md rounded-circle bg-white d-flex align-items-center justify-content-center">
										<i class="ti ti-user-check text-success fs-18"></i>
									</span>
								</div>
							</div>
							<div class="text-end">
								<p class="mb-1">Total Present</p>
								<h4>180/200</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card bg-pink-img">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 me-2">
									<span class="avatar avatar-md rounded-circle bg-white d-flex align-items-center justify-content-center">
										<i class="ti ti-user-edit text-pink fs-18"></i>
									</span>
								</div>
							</div>
							<div class="text-end">
								<p class="mb-1">Planned Leaves</p>
								<h4>10</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card bg-yellow-img">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 me-2">
									<span class="avatar avatar-md rounded-circle bg-white d-flex align-items-center justify-content-center">
										<i class="ti ti-user-exclamation text-warning fs-18"></i>
									</span>
								</div>
							</div>
							<div class="text-end">
								<p class="mb-1">Unplanned Leaves</p>
								<h4>10</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card bg-blue-img">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 me-2">
									<span class="avatar avatar-md rounded-circle bg-white d-flex align-items-center justify-content-center">
										<i class="ti ti-user-question text-info fs-18"></i>
									</span>
								</div>
							</div>
							<div class="text-end">
								<p class="mb-1">Pending Requests</p>
								<h4>15</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Leaves Info -->

		<!-- Leaves list -->
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
				<h5>Leave Request List</h5>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
					<div class="me-3">
						<div class="input-icon-end position-relative">
							<input type="text" class="form-control date-range bookingrange pointer" id="dateRange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
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
						<select class="form-control" name="leavePolicy" id="leavePolicy">
						<option value="">Leave Type</option>
						<option value="">All</option>
						<?php echo getLeaveTypes(); ?>
						</select>
					</div> 
					<div class="me-3">
						<div class="form-group">
							<input type="text" id="myInputTextField" class="form-control" placeholder="Search anything..." title="Search any thing in the table you want">
						</div>
					</div>
				</div>
			</div>
			<div class="card-body p-0">
				<div class="custom-datatable-filter table-responsive">
					<table class="table datatable" id="tableRecords">
						<thead class="thead-light">
							<tr>
								<th>S.No</th>
								<th>Employee</th>
								<th>Nature of Leave</th>
								<th>From Date</th>
								<th>To Date</th>
								<th>No.of Days</th>
								<th>Applied At</th>
								<th>Leave Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div> 
		</div>
		<!-- /Leaves list -->

	</div>
	<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
		<p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
		<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
	</div>
</div>
<!-- /Page Wrapper -->

<!-- Edit Leaves -->
<div class="modal fade" id="edit_leaves">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Leave Approval</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="update">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Action <span class="text-danger">*</span></label>
								<select class="select" id="approveStatus" name="approveStatus">
									<option value="">Select</option>
									<option value="1">Approve</option>
									<option value="2">Reject</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 reason" style="display: none;">
							<div class="mb-3">
								<label class="form-label">Rejection Reason<span class="text-danger">*</span></label>
								<textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="rowId" name="rowId">
					<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="updateButton">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Leaves -->

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
					<a href="#" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->
<?php require_once("./includes/footer.php"); ?>

<!-- this page java scripts codes -->
<script src="./js/leaves.js"></script>