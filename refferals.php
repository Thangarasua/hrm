<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Refferals</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Administration
								</li>
								<li class="breadcrumb-item active" aria-current="page">Refferals</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<div class="mb-2">
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
						<h5>Refferals List</h5>
						<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
							
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
										<th>Refferals ID</th>
                                        <th> Referrer Name</th>
										<th>Job Reffered</th>
										<th>Referee Name</th>
										<th>Refferals Bonus</th>
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
                                        <td>Reff-001</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-32.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Anthony Lewis</a></h6>
                                                    <span class="d-block mt-1">Finance</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/apple.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Senior IOS Developer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-11.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Harold Gaynor</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="274f4655484b4367425f464a574b420944484a">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$200</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-002</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-09.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Brian Villalobos</a></h6>
                                                    <span class="d-block mt-1">Developer</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/php.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Junior PHP Developer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-29.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Sandra Ornellas</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b4c7d5dad0c6d5f4d1ccd5d9c4d8d19ad7dbd9">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$100</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-003</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-01.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Harvey Smith</a></h6>
                                                    <span class="d-block mt-1">Developer</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/black.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Network Engineer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-16.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">John Harris</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="95fffafdfbd5f0edf4f8e5f9f0bbf6faf8">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$300</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-004</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-33.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Stephan Peralt</a></h6>
                                                    <span class="d-block mt-1">Executive Officer</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/react.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Junior React Developer </a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-57.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Whitney Barnette</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="32455a5b465c574b72574a535f425e571c515d5f">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$150</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-005</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-56.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Doglas Martini</a></h6>
                                                    <span class="d-block mt-1">Manager</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/laravel.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Senior Laravel Developer </a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-55.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Richard Thompson</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="daa8b3b9b2bba8be9abfa2bbb7aab6bff4b9b5b7">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$250</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-006</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-34.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Linda Ray</a></h6>
                                                    <span class="d-block mt-1">Finance</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/devops.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">DevOps Engineer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-45.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Kerry Drake</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cfa4aabdbdb68faab7aea2bfa3aae1aca0a2">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$400</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-007</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-42.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Elliot Murray</a></h6>
                                                    <span class="d-block mt-1">Developer</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/android.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Junior Android Developer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-30.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">David Carmona</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4d292c3b24290d28352c203d2128632e2220">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$450</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-008</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-38.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Rebecca Smtih</a></h6>
                                                    <span class="d-block mt-1">Executive</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/html.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Senior HTML Developer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-26.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Margaret Soto</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2a474b584d4b584f5e6a4f524b475a464f04494547">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$220</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-009</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-52.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Connie Waters</a></h6>
                                                    <span class="d-block mt-1">Developer</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/ui.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Junior UI/UX Designer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-44.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Jeffrey Thaler</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="204a454646524559604558414d504c450e434f4d">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$180</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
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
                                        <td>Reff-010</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-06.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Lori Broaddus</a></h6>
                                                    <span class="d-block mt-1">Finance</span>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md bg-light rounded">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/grafic.svg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Senior Graphic Designer</a></h6>
                                                   
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-10.jpg" class="img-fluid rounded-circle" alt="img">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">Joyce Golston</a></h6>
                                                    <span class="d-block mt-1"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b5dfdaccd6d0f5d0cdd4d8c5d9d09bd6dad8">[email&#160;protected]</a></span>
												</div>
											</div>
										</td>
                                        <td>$250</td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" ><i class="ti ti-edit"></i></a>
												<a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
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
							<a href="https://smarthr.dreamstechnologies.com/html/template/refferals.html" class="btn btn-danger">Yes, Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->
		
		<?php require_once("./includes/footer.php"); ?>