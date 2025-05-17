<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Policies</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item">
							<a href="index"><i class="ti ti-smart-home"></i></a>
						</li>
						<li class="breadcrumb-item">
							HR
						</li>
						<li class="breadcrumb-item active" aria-current="page">Policies</li>
					</ol>
				</nav>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
				<div class="me-2 mb-2">
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							<i class="ti ti-file-export me-1"></i>Export
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
							</li>
						</ul>
					</div>
				</div>
				<div class="mb-2">
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_policy" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Policy</a>
				</div>
				<div class="head-icons ms-2">
					<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
						<i class="ti ti-chevrons-up"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Policy list -->
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
				<h5>Policies List</h5>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
					<div class="me-3">
						<div class="input-icon-end position-relative">
							<input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
							<span class="input-icon-addon">
								<i class="ti ti-chevron-down"></i>
							</span>
						</div>
					</div>
					<div class="dropdown me-3">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							Department
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Designing</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">DevOps</a>
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
					<table class="table datatable">
						<thead class="thead-light">
							<tr>
								<th class="no-sort">
									<div class="form-check form-check-md">
										<input class="form-check-input" type="checkbox" id="select-all">
									</div>
								</th>
								<th>Name</th>
								<th>Department</th>
								<th>Description</th>
								<th>Created Date</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-check form-check-md">
										<input class="form-check-input" type="checkbox">
									</div>
								</td>
								<td>
									<h6 class="fs-14 fw-medium text-gray-9">Employee</h6>
								</td>
								<td>All Department</td>
								<td>
									Guidelines regarding employee absences from work
								</td>
								<td>
									14 Jan 2024
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_policy"><i class="ti ti-edit"></i></a>
										<a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-check form-check-md">
										<input class="form-check-input" type="checkbox">
									</div>
								</td>
								<td>
									<h6 class="fs-14 fw-medium text-gray-9">Permission Policy</h6>
								</td>
								<td>Marketing</td>
								<td>
									Guidelines for accessing and using company resources
								</td>
								<td>
									21 Jan 2024
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_policy"><i class="ti ti-edit"></i></a>
										<a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-check form-check-md">
										<input class="form-check-input" type="checkbox">
									</div>
								</td>
								<td>
									<h6 class="fs-14 fw-medium text-gray-9">Privacy Policy</h6>
								</td>
								<td>All Department</td>
								<td>
									Ensure compliance with data protection
								</td>
								<td>
									18 Feb 2024
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_policy"><i class="ti ti-edit"></i></a>
										<a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Policylist list -->

	</div>

	<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
		<p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
		<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
	</div>

</div>
<!-- /Page Wrapper -->

<!-- Add Policy -->
<div class="modal fade" id="add_policy">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Policy</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="policy">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Policy Name</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Appraisal Date</label>
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Department</label>
								<select class="select">
									<option>Select</option>
									<option>All Department</option>
									<option>Finance</option>
									<option>Marketing</option>
									<option>Development</option>
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Upload Policy</label>
								<div class="policy-upload d-flex flex-column align-items-center">
									<div class="policy-upload-bg mb-2 rounded-circle d-flex align-items-center justify-content-center bg-primary-transparent">
										<span><img src="./assets/img/folder-open.svg" alt="Img" class="img-fluid"></span>
									</div>
									<h6 class="fs-12 fw-normal mb-2">Drag and drop your files</h6>
									<div class="drag-upload-btn bg-primary mb-0">
										<i class="ti ti-upload me-1"></i>Upload
										<input type="file" class="form-control  image-sign" multiple="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Policy</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Policy -->

<!-- Edit  Policy -->
<div class="modal fade" id="edit_policy">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Policy</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="policy">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Policy Name</label>
								<input type="text" class="form-control" value="Leave Policy">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Appraisal Date</label>
								<textarea class="form-control">Guidelines regarding employee absences from work</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Department</label>
								<select class="select">
									<option selected>All Department</option>
									<option>Finance</option>
									<option>Marketing</option>
									<option>Development</option>
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Upload Policy</label>
								<div class="policy-upload d-flex flex-column align-items-center">
									<div class="policy-upload-bg mb-2 rounded-circle d-flex align-items-center justify-content-center bg-primary-transparent">
										<span><img src="./assets/img/folder-open.svg" alt="Img" class="img-fluid"></span>
									</div>
									<h6 class="fs-12 fw-normal mb-2">Drag and drop your files</h6>
									<div class="drag-upload-btn bg-primary mb-0">
										<i class="ti ti-upload me-1"></i>Upload
										<input type="file" class="form-control  image-sign" multiple="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Policy</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit  Policy -->

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
					<a href="./policy.html" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<?php require_once("./includes/footer.php"); ?>