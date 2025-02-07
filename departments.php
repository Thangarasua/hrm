<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">Departments</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item">
							<a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
						</li>
						<li class="breadcrumb-item">
							Employee
						</li>
						<li class="breadcrumb-item active" aria-current="page">Departments</li>
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
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_department" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Department</a>
				</div>
				<div class="head-icons ms-2">
					<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
						<i class="ti ti-chevrons-up"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Performance Indicator list -->
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
				<h5>Department List</h5>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
					<div class="dropdown me-3">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							Status
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
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
								<th>Department </th>
								<th>No of Employees</th>
								<th>Status</th>
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
									
									<h6 class="fw-medium"><a href="#">Finance</a></h6>
								
								
								</td>
								<td>
									20
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									
									<h6 class="fw-medium"><a href="#">Application Development</a></h6>
									
								
								</td>
								<td>
									30
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									
									<h6 class="fw-medium"><a href="#">IT Management</a></h6>
								
								
								</td>
								<td>
									15
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									
									<h6 class="fw-medium"><a href="#">Web Development</a></h6>
									
								
								</td>
								<td>
									20
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
								
									<h6 class="fw-medium"><a href="#">Sales</a></h6>
									
								
								</td>
								<td>
									20
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									
									<h6 class="fw-medium"><a href="#">UI / UX</a></h6>
									
								
								</td>
								<td>
									30
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									
									<h6 class="fw-medium"><a href="#">Account Management</a></h6>
								
								
								</td>
								<td>
									15
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
								
									<h6 class="fw-medium"><a href="#">Marketing</a></h6>
									
								
								</td>
								<td>
									10
								</td>
								<td>
									<span class="badge badge-danger d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Inactive
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									
									<h6 class="fw-medium"><a href="#">Administration</a></h6>
									
								
								</td>
								<td>
									05
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
									<h6 class="fw-medium"><a href="#">Business Development</a></h6>

								</td>
								<td>
									07
								</td>
								<td>
									<span class="badge badge-success d-inline-flex align-items-center badge-xs">
										<i class="ti ti-point-filled me-1"></i>Active
									</span>
								</td>
								<td>
									<div class="action-icon d-inline-flex">
										<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="ti ti-edit"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Performance Indicator list -->

	</div>

	<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
				<p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
				<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
			</div>

</div>
<!-- /Page Wrapper -->

<!-- Add Department -->
<div class="modal fade" id="add_department">
	<div class="modal-dialog modal-dialog-centered modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Department</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/departments.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Department Name</label>
								<input type="text" class="form-control">
							</div>	
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="select">
									<option>Select</option>
									<option>Active</option>
									<option>Inactive</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Department</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Department -->

<!-- Edit Department -->
<div class="modal fade" id="edit_department">
	<div class="modal-dialog modal-dialog-centered modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Department</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/departments.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Department Name</label>
								<input type="text" class="form-control" value="Finance">
							</div>	
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="select">
									<option>Select</option>
									<option selected>Active</option>
									<option>Inactive</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save Department</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Department -->

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
					<a href="https://smarthr.dreamstechnologies.com/html/template/departments.html" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<?php require_once("./includes/footer.php"); ?>