<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Leaves Request</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
						<li class=" active" aria-current="page">Leaves Request</li>
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

		<!-- Leaves list -->
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
				<div class="d-flex">
					<h5 class="me-2">Leave List</h5>
					<span class="badge bg-primary-transparent me-2">Total Leaves : 48</span>
					<span class="badge bg-secondary-transparent">Total Remaining Leaves : 23</span>
				</div>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
					<div class="me-3">
						<div class="form-group">
							<input type="text" id="myInputTextField" class="form-control" placeholder="Search anything..." title="Search any thing in the table you want">
						</div>
					</div>
					<div class="me-3">
						<div class="input-icon-end position-relative">
							<input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
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
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
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
								<th>Leave Type</th>
								<th>From</th>
								<th>Approved By</th>
								<th>To</th>
								<th>No of Days</th>
								<th>Applied</th>
								<th>Status</th>
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

<!-- Add Leaves -->
<div class="modal fade" id="add_leaves">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Leave</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="create">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Nature Of Leave<span class="text-danger"> *</span></label>
								<select class="select" id="leaveType" name="leaveType">
									<option value="">Select</option>
									<?php echo getLeaveTypes(); ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Days Type<span class="text-danger"> *</span></label>
								<select class="select" id="dayType" name="dayType">
									<option value="">Select</option>
									<option value="1">Single Day</option>
									<option value="2">Multiple Days</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 date" style="display: none;">
							<div class="mb-3">
								<label class="form-label">Leave Date<span class="text-danger"> *</span></label>
								<div class="d-flex gap-2">
									<input type="text" class="form-control datetimepicker" id="singleDate" name="singleDate" placeholder="dd/mm/yyyy">
									<select class="form-select" id="singleDateDuration" name="singleDateDuration" style="padding: 0 10px;">
										<option value="Full Day">Full Day</option>
										<option value="First Half">First Half</option>
										<option value="Second Half">Second Half</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 fromDate" style="display: none;">
							<div class="mb-3">
								<label class="form-label">Leave From Date<span class="text-danger"> *</span></label>
								<div class="d-flex gap-2">
									<input type="text" class="form-control datetimepicker" id="fromDate" name="fromDate" placeholder="dd/mm/yyyy">
									<select class="form-select" id="fromDateDuration" name="fromDateDuration" style="padding: 0 10px;">
										<option value="Full Day">Full Day</option>
										<option value="Second Half">Second Half</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 toDate" style="display: none;">
							<div class="mb-3">
								<label class="form-label">Leave To Date<span class="text-danger"> *</span></label>
								<div class="d-flex gap-2">
									<input type="text" class="form-control datetimepicker" id="toDate" name="toDate" placeholder="dd/mm/yyyy">
									<select class="form-select" id="toDateDuration" name="toDateDuration" style="padding: 0 10px;">
										<option value="Full Day">Full Day</option>
										<option value="First Half">First Half</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Reason<span class="text-danger"> *</span></label>
								<textarea class="form-control" rows="3" id="leaveReason" name="leaveReason"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="updateButton">Add Leave</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Leaves -->

<!-- Edit Leaves -->
<div class="modal fade" id="edit_leaves">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Leave</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="#">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Leave Type</label>
								<select class="select">
									<option selected>Medical Leave</option>
									<option>Casual Leave</option>
									<option>Annual Leave</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">From </label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" value="14 Jan 24" placeholder="dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">To </label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" value="15/01/24" placeholder="dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" value="15/01/24" disabled>
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<select class="select">
									<option>Select</option>
									<option>Full DAy</option>
									<option selected>First Half</option>
									<option>Second Half</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">No of Days</label>
								<input type="text" class="form-control" value="01" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Remaining Days</label>
								<input type="text" class="form-control" value="07" disabled>
							</div>
						</div>

						<div class="col-md-12">
							<div class="d-flex align-items-center mb-3">
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="leave1" value="option4" id="leave6">
									<label class="form-check-label" for="leave6">
										Full Day
									</label>
								</div>
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="leave1" value="option5" id="leave5">
									<label class="form-check-label" for="leave5">
										First Half
									</label>
								</div>
								<div class="form-check me-2">
									<input class="form-check-input" type="radio" name="leave1" value="option6" id="leave4">
									<label class="form-check-label" for="leave4">
										Second Half
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Reason</label>
								<textarea class="form-control" rows="3"> Going to Hospital </textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save Changes</button>
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
<script src="./js/leaves-employee.js"></script>