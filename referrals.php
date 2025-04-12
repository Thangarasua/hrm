<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Referral List</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
						<li class=" active" aria-current="page">Referral List</li>
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
				<h5>Referral List</h5>
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
								<th>Ref ID</th>
								<th>Referrer</th>
								<th>Ref Job</th>
								<th>Candidate</th>
								<th>Ref Bonus</th>
								<th>Ref Date</th>
								<th>HR</th>
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

	<!-- View Post -->
	<div class="modal fade" id="viewModal">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Referral Details</h4>
					<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x"></i>
					</button>
				</div>
				<form>
					<div class="modal-body pb-0">
						<div class="tab-content" id="">
							<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
								<div class="row">
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Candidate Name</label>
											<input type="text" class="form-control" id="refCandidateName" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="text" class="form-control" id="candidateEmail" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Contact</label>
											<input type="text" class="form-control" id="candidateCantact" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Referral Bonus</label>
											<input type="text" class="form-control" id="referralBonus" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Created At</label>
											<input type="text" class="form-control" id="createdAt" autocomplete="off" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Updated At</label>
											<input type="text" class="form-control" id="UpdatedAt" autocomplete="off" readonly>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /View Post -->

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
										<input type="text" class="form-control" name="ticketRequestId" id="ticketRequestId" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Job Title <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="jobTitle" id="jobTitle" readonly>
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
										<input type="text" class="form-control" name="candidateName" id="candidateName" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Mail</label>
										<input type="text" class="form-control" name="candidateMail" id="candidateMail" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Candidate Contact</label>
										<input type="text" class="form-control" name="candidateContact" id="candidateContact" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Referred By</label>
										<input type="text" class="form-control" name="referralID" id="referralID" readonly>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" name="raisedBy" id="raisedBy">
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

</div>
<!-- /Page Wrapper -->

<?php require_once("./includes/footer.php"); ?>
<!-- this page java scripts codes -->
<script src="./js/referrals.js"></script>