<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Candidates List</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Administration
								</li>
								<li class="breadcrumb-item active" aria-current="page">Candidates List</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
						<div class="me-2 mb-2">
							<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
                                <a href="https://smarthr.dreamstechnologies.com/html/template/candidates-kanban.html" class="btn btn-icon btn-sm me-1"><i class="ti ti-layout-kanban"></i></a>
								<a href="https://smarthr.dreamstechnologies.com/html/template/candidates.html" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>                                
								<a href="https://smarthr.dreamstechnologies.com/html/template/candidates-grid.html" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
							</div>
						</div>
						<div class="me-2 mb-2">
							<div class="dropdown">
								<a href="javascript:void(0);"
									class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
									data-bs-toggle="dropdown">
									<i class="ti ti-file-export me-1"></i>Export
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i
												class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i
												class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
									</li>
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
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control date-range bookingrange"
										placeholder="dd/mm/yyyy - dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-chevron-down"></i>
									</span>
								</div>
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
							<table class="table datatable">
								<thead class="thead-light">
									<tr>
										<th class="no-sort">
											<div class="form-check form-check-md">
												<input class="form-check-input" type="checkbox" id="select-all">
											</div>
										</th>
										<th>Cand ID</th>
										<th>Candidate</th>
										<th>Applied Role</th>
										<th>Phone</th>
										<th>Applied Date</th>
										<th>Resume</th>
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
										<td>Cand-001</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-01.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Harold Gaynor</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d9b1b8abb6b5bd99bca1b8b4a9b5bcf7bab6b4">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Accountant</td>
										<td>(146) 8964 278</td>
										<td>12 Sep 2024 </td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-purple text-purple"><i
													class="ti ti-point-filled"></i>Sent</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-002</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-34.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Sandra Ornellas</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3b485a555f495a7b5e435a564b575e15585456">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>App Developer</td>
										<td>(148) 9648 218</td>
										<td>24 Oct 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-pink text-pink"><i
													class="ti ti-point-filled"></i>Scheduled</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-003</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-09.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">John Harris</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="96fcf9fef8d6f3eef7fbe6faf3b8f5f9fb">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Technician</td>
										<td>(196) 2348 947</td>
										<td>18 Feb 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-info text-info"><i
													class="ti ti-point-filled"></i>Interviewed</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-004</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-26.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Carole Langan</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="37545645585b5277524f565a475b521954585a">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Web Developer</td>
										<td>(138) 6487 295</td>
										<td>17 Oct 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-warning text-warning"><i
													class="ti ti-point-filled"></i>Offered</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-005</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-39.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Charles Marks</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a1c2c9c0d3cdc4d2e1c4d9c0ccd1cdc48fc2cecc">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Sales Executive Officer</td>
										<td>(154) 6485 218</td>
										<td>20 Jul 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-success text-success"><i
													class="ti ti-point-filled"></i>Hired</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-006</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-24.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Kerry Drake</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="442f2136363d04213c25293428216a272b29">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Designer</td>
										<td>(185) 5947 097</td>
										<td>20 Jul 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-danger text-danger"><i
													class="ti ti-point-filled"></i>Rejected</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-007</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-33.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">David Carmona</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a7c3c6d1cec3e7c2dfc6cad7cbc289c4c8ca">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Account Manager</td>
										<td>(106) 3485 978</td>
										<td>29 Aug 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-success text-success"><i
													class="ti ti-point-filled"></i>Hired</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-008</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-10.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Margaret Soto</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c9a4a8bbaea8bbacbd89acb1a8a4b9a5ace7aaa6a4">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>SEO Analyst</td>
										<td>(174) 3795 107</td>
										<td>22 Feb 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-pink text-pink"><i
													class="ti ti-point-filled"></i>Scheduled</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-009</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-11.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Jeffrey Thaler</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="573d32313125322e17322f363a273b327934383a">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Admin</td>
										<td>(128) 0975 348</td>
										<td>03 Nov 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-purple text-purple"><i
													class="ti ti-point-filled"></i>App Received</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
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
										<td>Cand-010</td>
										<td>

											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-57.jpg"
														class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Joyce Golston</a></h6>
													<span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="adc7c2d4cec8edc8d5ccc0ddc1c883cec2c0">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
										<td>Business Analyst</td>
										<td>(132) 1876 304</td>
										<td>17 Dec 2024</td>
										<td>
											<div class="d-inline-flex">
												<a href="#" class="text-gray me-2 fs-16"><i
														class="ti ti-file-text"></i></a>
												<a href="#" class="text-gray fs-16"><i class="ti ti-download"></i></a>
											</div>
										</td>

										<td><span class="badge border border-success text-success"><i
													class="ti ti-point-filled"></i>Hired</span></td>
										<td>
											<div class="action-icon d-inline-flex">
												
												<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
											</div>
										</td>
									</tr>

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
							<a href="https://smarthr.dreamstechnologies.com/html/template/candidates.html" class="btn btn-danger">Yes, Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->

		<?php require_once("./includes/footer.php"); ?>
 