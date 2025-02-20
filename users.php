<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<?php include("./queries/commonFunctions.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h2 class="mb-1">User</h2>
				<nav>
					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item">
							<a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
						</li>
						<li class="breadcrumb-item">
							User
						</li>
						<li class="breadcrumb-item active" aria-current="page">User List</li>
					</ol>
				</nav>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
				<div class="me-2 mb-2">
					<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
						<a href="users" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
						<a href="#" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
					</div>
				</div>
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
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_edit_user" class="btn btn-primary d-flex align-items-center add_user"><i class="ti ti-circle-plus me-2"></i>Add User</a>
				</div>
				<div class="head-icons ms-2">
					<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
						<i class="ti ti-chevrons-up"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<div class="row">

			<!-- Total Plans -->
			<div class="col-lg-3 col-md-6 d-flex">
				<div class="card flex-fill">
					<div class="card-body d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center overflow-hidden">
							<div>
								<span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
							</div>
							<div class="ms-2 overflow-hidden">
								<p class="fs-12 fw-medium mb-1 text-truncate">Total User</p>
								<h4>1007</h4>
							</div>
						</div>
						<div>
							<span class="badge badge-soft-purple badge-sm fw-normal">
								<i class="ti ti-arrow-wave-right-down"></i>
								+19.01%
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- /Total Plans -->

			<!-- Total Plans -->
			<div class="col-lg-3 col-md-6 d-flex">
				<div class="card flex-fill">
					<div class="card-body d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center overflow-hidden">
							<div>
								<span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
							</div>
							<div class="ms-2 overflow-hidden">
								<p class="fs-12 fw-medium mb-1 text-truncate">Active</p>
								<h4>1007</h4>
							</div>
						</div>
						<div>
							<span class="badge badge-soft-primary badge-sm fw-normal">
								<i class="ti ti-arrow-wave-right-down"></i>
								+19.01%
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- /Total Plans -->

			<!-- Inactive Plans -->
			<div class="col-lg-3 col-md-6 d-flex">
				<div class="card flex-fill">
					<div class="card-body d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center overflow-hidden">
							<div>
								<span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
							</div>
							<div class="ms-2 overflow-hidden">
								<p class="fs-12 fw-medium mb-1 text-truncate">InActive</p>
								<h4>1007</h4>
							</div>
						</div>
						<div>
							<span class="badge badge-soft-dark badge-sm fw-normal">
								<i class="ti ti-arrow-wave-right-down"></i>
								+19.01%
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- /Inactive Companies -->

			<!-- No of Plans  -->
			<div class="col-lg-3 col-md-6 d-flex">
				<div class="card flex-fill">
					<div class="card-body d-flex align-items-center justify-content-between">
						<div class="d-flex align-items-center overflow-hidden">
							<div>
								<span class="avatar avatar-lg bg-info rounded-circle"><i class="ti ti-user-plus"></i></span>
							</div>
							<div class="ms-2 overflow-hidden">
								<p class="fs-12 fw-medium mb-1 text-truncate">New Joiners</p>
								<h4>67</h4>
							</div>
						</div>
						<div>
							<span class="badge badge-soft-secondary badge-sm fw-normal">
								<i class="ti ti-arrow-wave-right-down"></i>
								+19.01%
							</span>
						</div>
					</div>
				</div>
			</div>
			<!-- /No of Plans -->

		</div>

		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
				<h5>Plan List</h5>
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
							Designation
						</a>
						<ul class="dropdown-menu  dropdown-menu-end p-3">
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
							</li>
						</ul>
					</div>
					<div class="dropdown me-3">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
							Select Status
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
								<a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
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
								<th>Emp/User ID </th>
								<th>Name</th>
								<th>Password</th>
								<th>Role</th>
								<th>Department</th>
								<th>Supervisor</th>
								<th>Manager</th>
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

</div>
<!-- /Page Wrapper -->

<!-- Add Edit User -->
<div class="modal fade" id="add_edit_user">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<h4 class="modal-title me-2">Add New User</h4>
				</div>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="addEditUser">
				<div class="contact-grids-tab">
					<ul class="nav nav-underline" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">Basic Information</button>
						</li>
					</ul>
				</div>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
						<div class="modal-body pb-0 ">
							<div class="row">
                            <div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">User ID <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="UserID">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">User Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" onkeypress="return isAlphabets(event)" name="UserName">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Department</label>
										<select class="select" name="department">
											<option value="">Select</option>
											<?php echo getDepartments(); ?>
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Role</label>
										<select class="select" name="role">
											<option value="">Select</option>
											<?php echo getRoles(); ?>
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Supervisors</label>
										<select class="select" name="supervisors">
											<option value="">Select</option>
											<option value="1000">STL-BDE</option>
                                            <option value="1001">STL-SALES</option>
                                            <option value="1002">STL-ONE</option>
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Manager</label>
										<select class="select" name="manager">
											<option value="">Select</option>
											<option value="1000">QM</option>
                                            <option value="1001">SM</option>
                                            <option value="1002">BM</option>
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">HR</label>
										<select class="select" name="hr">
											<option value="">Select</option>
											<option value="1000">QM HR</option>
                                            <option value="1001">SM HR</option>
                                            <option value="1002">BM HR</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 ">
										<label class="form-label">Password <span class="text-danger"> *</span></label>
										<div class="pass-group">
											<input type="password" class="pass-input form-control" name="password">
											<span class="ti toggle-password ti-eye-off"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 ">
										<label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
										<div class="pass-group">
											<input type="password" class="pass-inputs form-control" name="confirmPassword">
											<span class="ti toggle-passwords ti-eye-off"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="purpose" value="addEditUser">
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary addEditUserSaveBtn">Save </button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Edit User -->

<!-- Add User Success -->
<div class="modal fade" id="success_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3"><i class="ti ti-check fs-24"></i></span>
					<h5 class="mb-2 sucessMessage">User Added Successfully</h5>
					<p class="mb-3 userNameMessage">Stephan Peralt has been added with Client ID : <span class="text-primary userIdMessage">#EMP - 0001</span>
					</p>
					<div>
						<div class="row g-2">
							<div class="col-6">
								<a href="users" class="btn btn-dark w-100">Back to List</a>
							</div>
							<div class="col-6">
								<a href="user-details" class="btn btn-primary w-100">Detail Page</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Add Client Success -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
					<i class="ti ti-trash-x fs-36"></i>
				</span>
				<h4 class="mb-1">Confirm Delete</h4>
				<p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
				<div class="d-flex justify-content-center">
					<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
					<a href="users" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<?php require_once("./includes/footer.php"); ?>
<script src="./js/users.js"></script>