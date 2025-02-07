<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Employee Dashboard</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Dashboard
								</li>
								<li class="breadcrumb-item active" aria-current="page">Employee Dashboard</li>
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
						<div class="input-icon w-120 position-relative mb-2">
							<span class="input-icon-addon">
								<i class="ti ti-calendar text-gray-9"></i>
							</span>
							<input type="text" class="form-control datetimepicker" value="15 Apr 2025">
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<div class="alert bg-secondary-transparent alert-dismissible fade show mb-4">
					Your Leave Request on“24th April 2024”has been Approved!!!
					<button type="button" class="btn-close fs-14" data-bs-dismiss="alert" aria-label="Close"><i class="ti ti-x"></i></button>
				</div>
				<div class="row">
					<div class="col-xl-4 d-flex">
						<div class="card position-relative flex-fill">
							<div class="card-header bg-dark">
								<div class="d-flex align-items-center">
									<span class="avatar avatar-lg avatar-rounded border border-white border-2 flex-shrink-0 me-2">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-01.jpg" alt="Img">
									</span>
									<div>
										<h5 class="text-white mb-1">Stephan Peralt</h5>
										<div class="d-flex align-items-center">
										<p class="text-white fs-12 mb-0">Senior Product Designer</p>
										<span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>
										<p class="fs-12">UI/UX Design</p>
									</div>
									</div>
								</div>
								<a href="#" class="btn btn-icon btn-sm text-white rounded-circle edit-top"><i class="ti ti-edit"></i></a>
							</div>
							<div class="card-body">
								<div class="mb-3">
									<span class="d-block mb-1 fs-13">Phone Number</span>
									<p class="text-gray-9">+1 324 3453 545</p>
								</div>
								<div class="mb-3">
									<span class="d-block mb-1 fs-13">Email Address</span>
									<p class="text-gray-9"><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eab99e8f9a8f988e8fdbd8deaa8f928b879a868fc4898587">[email&#160;protected]</a></p>
								</div>
								<div class="mb-3">
									<span class="d-block mb-1 fs-13">Report Office</span>
									<p class="text-gray-9">Doglas Martini</p>
								</div>
								<div>
									<span class="d-block mb-1 fs-13">Joined on</span>
									<p class="text-gray-9">15  Jan 2024</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>Leave Details</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>2024
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2022</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-md-6">
										<div class="mb-3">
											<div class="mb-3">
												<p class="d-flex align-items-center"><i class="ti ti-circle-filled fs-8 text-dark me-1"></i>
													<span class="text-gray-9 fw-semibold me-1">1254</span>
													on time
												</p>
											</div>
											<div class="mb-3">
												<p class="d-flex align-items-center"><i class="ti ti-circle-filled fs-8 text-success me-1"></i>
													<span class="text-gray-9 fw-semibold me-1">32</span>
													Late Attendance
												</p>
											</div>
											<div class="mb-3">
												<p class="d-flex align-items-center"><i class="ti ti-circle-filled fs-8 text-primary me-1"></i>
													<span class="text-gray-9 fw-semibold me-1">658</span>
													Work From Home
												</p>
											</div>
											<div class="mb-3">
												<p class="d-flex align-items-center"><i class="ti ti-circle-filled fs-8 text-danger me-1"></i>
													<span class="text-gray-9 fw-semibold me-1">14</span>
													Absent
												</p>
											</div>
											<div>
												<p class="d-flex align-items-center"><i class="ti ti-circle-filled fs-8 text-warning me-1"></i>
													<span class="text-gray-9 fw-semibold me-1">68</span>
													Sick Leave
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 d-flex justify-content-md-end">
											<div id="leaves_chart"></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-check mt-2">
											<input class="form-check-input" type="checkbox" id="todo1">
											<label class="form-check-label" for="todo1">Better than  <span class="text-gray-9">85%</span> of Employees</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>Leave Details</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>2024
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2022</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-sm-6">
										<div class="mb-4">
											<span class="d-block mb-1">Total Leaves</span>
											<h4>16</h4>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-4">
											<span class="d-block mb-1">Taken</span>
											<h4>10</h4>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-4">
											<span class="d-block mb-1">Absent</span>
											<h4>2</h4>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-4">
											<span class="d-block mb-1">Request</span>
											<h4>0</h4>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-4">
											<span class="d-block mb-1">Worked Days</span>
											<h4>240</h4>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-4">
											<span class="d-block mb-1">Loss of Pay</span>
											<h4>2</h4>
										</div>
									</div>
									<div class="col-sm-12">
										<div>
											<a href="#" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_leaves">Apply New Leave</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 d-flex">
						<div class="card flex-fill border-primary attendance-bg">
							<div class="card-body">
								<div class="mb-4 text-center">
									<h6 class="fw-medium text-gray-5 mb-1">Attendance</h6>
									<h4>08:35 AM, 11 Mar 2025</h4>
								</div>
								<div class="attendance-circle-progress attendance-progress mx-auto mb-3"  data-value='65'>
									<span class="progress-left">
										<span class="progress-bar border-success"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-success"></span>
									</span>
									<div class="total-work-hours text-center w-100">
										<span class="fs-13 d-block mb-1">Total Hours</span>
										<h6>5:45:32</h6>
									</div>
								</div>
								<div class="text-center">
									<div class="badge badge-dark badge-md mb-3">Production :  3.45 hrs</div>
									<h6 class="fw-medium d-flex align-items-center justify-content-center mb-4">
										<i class="ti ti-fingerprint text-primary me-1"></i>
										Punch In at  10.00 AM
									</h6>
									<a href="#" class="btn btn-primary w-100">Punch Out</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 d-flex">
						<div class="row flex-fill">
							<div class="col-xl-3 col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="border-bottom mb-3 pb-2">
											<span class="avatar avatar-sm bg-primary mb-2"><i class="ti ti-clock-stop"></i></span>
											<h2 class="mb-2">8.36 / <span class="fs-20 text-gray-5"> 9</span></h2>
											<p class="fw-medium text-truncate">Total Hours Today</p>
										</div>
										<div>
											<p class="d-flex align-items-center fs-13">
												<span class="avatar avatar-xs rounded-circle bg-success flex-shrink-0 me-2">
													<i class="ti ti-arrow-up fs-12"></i>
												</span>
												<span>5% This Week</span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="border-bottom mb-3 pb-2">
											<span class="avatar avatar-sm bg-dark mb-2"><i class="ti ti-clock-up"></i></span>
											<h2 class="mb-2">10 / <span class="fs-20 text-gray-5"> 40</span></h2>
											<p class="fw-medium text-truncate">Total Hours Week</p>
										</div>
										<div>
											<p class="d-flex align-items-center fs-13">
												<span class="avatar avatar-xs rounded-circle bg-success flex-shrink-0 me-2">
													<i class="ti ti-arrow-up fs-12"></i>
												</span>
												<span>7% Last Week</span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="border-bottom mb-3 pb-2">
											<span class="avatar avatar-sm bg-info mb-2"><i class="ti ti-calendar-up"></i></span>
											<h2 class="mb-2">75 / <span class="fs-20 text-gray-5"> 98</span></h2>
											<p class="fw-medium text-truncate">Total Hours Month</p>
										</div>
										<div>
											<p class="d-flex align-items-center fs-13 text-truncate">
												<span class="avatar avatar-xs rounded-circle bg-danger flex-shrink-0 me-2">
													<i class="ti ti-arrow-down fs-12"></i>
												</span>
												<span>8% Last Month</span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="border-bottom mb-3 pb-2">
											<span class="avatar avatar-sm bg-pink mb-2"><i class="ti ti-calendar-star"></i></span>
											<h2 class="mb-2">16 / <span class="fs-20 text-gray-5"> 28</span></h2>
											<p class="fw-medium text-truncate">Overtime this Month</p>
										</div>
										<div>
											<p class="d-flex align-items-center fs-13 text-truncate">
												<span class="avatar avatar-xs rounded-circle bg-danger flex-shrink-0 me-2">
													<i class="ti ti-arrow-down fs-12"></i>
												</span>
												<span>6% Last Month</span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-xl-3">
												<div class="mb-4">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-dark-transparent me-1"></i>Total Working hours</p>
													<h3>12h 36m</h3>
												</div>
											</div>
											<div class="col-xl-3">
												<div class="mb-4">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-success me-1"></i>Productive Hours</p>
													<h3>08h 36m</h3>
												</div>
											</div>
											<div class="col-xl-3">
												<div class="mb-4">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-warning me-1"></i>Break hours</p>
													<h3>22m 15s</h3>
												</div>
											</div>
											<div class="col-xl-3">
												<div class="mb-4">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-info me-1"></i>Overtime</p>
													<h3>02h 15m</h3>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="progress bg-transparent-dark mb-3" style="height: 24px;">
													<div class="progress-bar bg-white rounded" role="progressbar" style="width: 18%;"></div>
													<div class="progress-bar bg-success rounded me-2" role="progressbar" style="width: 18%;"></div>
													<div class="progress-bar bg-warning rounded me-2" role="progressbar" style="width: 5%;"></div>
													<div class="progress-bar bg-success rounded me-2" role="progressbar" style="width: 28%;"></div>
													<div class="progress-bar bg-warning rounded me-2" role="progressbar" style="width: 17%;"></div>
													<div class="progress-bar bg-success rounded me-2" role="progressbar" style="width: 22%;"></div>
													<div class="progress-bar bg-warning rounded me-2" role="progressbar" style="width: 5%;"></div>
													<div class="progress-bar bg-info rounded me-2" role="progressbar" style="width: 3%;"></div>
													<div class="progress-bar bg-info rounded" role="progressbar" style="width: 2%;"></div>
													<div class="progress-bar bg-white rounded" role="progressbar" style="width: 18%;"></div>
												</div>
												
											</div>
											<div class="co-md-12">
												<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
													<span class="fs-10">06:00</span>
													<span class="fs-10">07:00</span>
													<span class="fs-10">08:00</span>
													<span class="fs-10">09:00</span>
													<span class="fs-10">10:00</span>
													<span class="fs-10">11:00</span>
													<span class="fs-10">12:00</span>
													<span class="fs-10">01:00</span>
													<span class="fs-10">02:00</span>
													<span class="fs-10">03:00</span>
													<span class="fs-10">04:00</span>
													<span class="fs-10">05:00</span>
													<span class="fs-10">06:00</span>
													<span class="fs-10">07:00</span>
													<span class="fs-10">08:00</span>
													<span class="fs-10">09:00</span>
													<span class="fs-10">10:00</span>
													<span class="fs-10">11:00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>Projects</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border-0 dropdown-toggle border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											Ongoing Projects
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">All Projects</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Ongoing Projects</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="card mb-4 shadow-none mb-md-0">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<h6>Office Management</h6>
													<div class="dropdown">
														<a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
															<i class="ti ti-dots-vertical"></i>
														</a>
														<ul class="dropdown-menu dropdown-menu-end p-3">
															<li>
																<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
															</li>
															<li>
																<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
															</li>
														</ul>
													</div>
												</div>
												<div>
													<div class="d-flex align-items-center mb-3">
														<a href="javascript:void(0);" class="avatar">
															<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-32.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-normal"><a href="javascript:void(0);">Anthony Lewis</a></h6>
															<span class="fs-13 d-block">Project Leader</span>
														</div>
													</div>
													<div class="d-flex align-items-center mb-3">
														<a href="javascript:void(0);" class="avatar bg-soft-primary rounded-circle">
															<i class="ti ti-calendar text-primary fs-16"></i>
														</a>
														<div class="ms-2">
															<h6 class="fw-normal">14 Jan 2024</h6>
															<span class="fs-13 d-block">Deadline</span>
														</div>
													</div>
													<div class="d-flex align-items-center justify-content-between bg-transparent-light border border-dashed rounded p-2 mb-3">
														<div class="d-flex align-items-center">
															<span class="avatar avatar-sm bg-success-transparent rounded-circle me-1"><i class="ti ti-checklist fs-16"></i></span>
															<p>Tasks : <span class="text-gray-9">6 </span> /10</p>
														</div>
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-06.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-07.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-08.jpg" alt="img">
															</span>
															<a class="avatar bg-primary avatar-rounded text-fixed-white fs-12 fw-medium" href="javascript:void(0);">
																+2
															</a>
														</div>
													</div>
													<div class="bg-soft-secondary p-2 rounded d-flex align-items-center justify-content-between">
														<p class="text-secondary mb-0 text-truncate">Time Spent</p>
														<h5 class="text-secondary text-truncate">65/120 <span class="fs-14 fw-normal">Hrs</span></h5>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card shadow-none mb-0">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<h6>Office Management</h6>
													<div class="dropdown">
														<a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
															<i class="ti ti-dots-vertical"></i>
														</a>
														<ul class="dropdown-menu dropdown-menu-end p-3">
															<li>
																<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
															</li>
															<li>
																<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
															</li>
														</ul>
													</div>
												</div>
												<div>
													<div class="d-flex align-items-center mb-3">
														<a href="javascript:void(0);" class="avatar">
															<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-33.jpg" class="img-fluid rounded-circle" alt="img">
														</a>
														<div class="ms-2">
															<h6 class="fw-normal"><a href="javascript:void(0);">Anthony Lewis</a></h6>
															<span class="fs-13 d-block">Project Leader</span>
														</div>
													</div>
													<div class="d-flex align-items-center mb-3">
														<a href="javascript:void(0);" class="avatar bg-soft-primary rounded-circle">
															<i class="ti ti-calendar text-primary fs-16"></i>
														</a>
														<div class="ms-2">
															<h6 class="fw-normal">14 Jan 2024</h6>
															<span class="fs-13 d-block">Deadline</span>
														</div>
													</div>
													<div class="d-flex align-items-center justify-content-between bg-transparent-light border border-dashed rounded p-2 mb-3">
														<div class="d-flex align-items-center">
															<span class="avatar avatar-sm bg-success-transparent rounded-circle me-1"><i class="ti ti-checklist fs-16"></i></span>
															<p>Tasks : <span class="text-gray-9">6 </span> /10</p>
														</div>
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-06.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-07.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-08.jpg" alt="img">
															</span>
															<a class="avatar bg-primary avatar-rounded text-fixed-white fs-12 fw-medium" href="javascript:void(0);">
																+2
															</a>
														</div>
													</div>
													<div class="bg-soft-secondary p-2 rounded d-flex align-items-center justify-content-between">
														<p class="text-secondary mb-0 text-truncate">Time Spent</p>
														<h5 class="text-secondary text-truncate">65/120 <span class="fs-14 fw-normal">Hrs</span></h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>Tasks</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border-0 dropdown-toggle border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											All Projects
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">All Projects</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Ongoing Projects</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="list-group list-group-flush">
									<div class="list-group-item border rounded mb-3 p-2">
										<div class="row align-items-center row-gap-3">
											<div class="col-md-8">
												<div class="todo-inbox-check d-flex align-items-center">
													<span><i class="ti ti-grid-dots me-2"></i></span>
													<div class="form-check">
														<input class="form-check-input" type="checkbox">
													</div>
													<span class="me-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
													<div class="strike-info">
														<h4 class="fs-14 text-truncate">Patient appointment booking</h4>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
													<span class="badge bg-soft-pink d-inline-flex align-items-center me-2"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
													<div class="d-flex align-items-center">
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-13.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-15.jpg" alt="img">
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item border rounded mb-3 p-2">
										<div class="row align-items-center row-gap-3">
											<div class="col-md-8">
												<div class="todo-inbox-check d-flex align-items-center">
													<span><i class="ti ti-grid-dots me-2"></i></span>
													<div class="form-check">
														<input class="form-check-input" type="checkbox">
													</div>
													<span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
													<div class="strike-info">
														<h4 class="fs-14 text-truncate">Appointment booking with payment</h4>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
													<span class="badge bg-transparent-purple d-flex align-items-center me-2"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
													<div class="d-flex align-items-center">
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-20.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-21.jpg" alt="img">
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item border rounded mb-3 p-2">
										<div class="row align-items-center row-gap-3">
											<div class="col-md-8">
												<div class="todo-inbox-check d-flex align-items-center">
													<span><i class="ti ti-grid-dots me-2"></i></span>
													<div class="form-check">
														<input class="form-check-input" type="checkbox">
													</div>
													<span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
													<div class="strike-info">
														<h4 class="fs-14 text-truncate">Patient and Doctor video conferencing</h4>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
													<span class="badge badge-soft-success align-items-center me-2"><i class="fas fa-circle fs-6 me-1"></i>Completed</span>
													<div class="d-flex align-items-center">
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-28.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-29.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-24.jpg" alt="img">
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item border rounded mb-3 p-2">
										<div class="row align-items-center row-gap-3">
											<div class="col-md-8">
												<div class="todo-inbox-check d-flex align-items-center todo-strike-content">
													<span><i class="ti ti-grid-dots me-2"></i></span>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" checked="">
													</div>
													<span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
													<div class="strike-info">
														<h4 class="fs-14 text-truncate">Private chat module</h4>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
													<span class="badge badge-secondary-transparent d-flex align-items-center me-2"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
													<div class="d-flex align-items-center">
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-23.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-24.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-25.jpg" alt="img">
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item border rounded p-2">
										<div class="row align-items-center row-gap-3">
											<div class="col-md-8">
												<div class="todo-inbox-check d-flex align-items-center">
													<span><i class="ti ti-grid-dots me-2"></i></span>
													<div class="form-check">
														<input class="form-check-input" type="checkbox">
													</div>
													<span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
													<div class="strike-info">
														<h4 class="fs-14 text-truncate">Go-Live and Post-Implementation Support</h4>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
													<span class="badge bg-transparent-purple d-flex align-items-center me-2"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
													<div class="d-flex align-items-center">
														<div class="avatar-list-stacked avatar-group-sm">
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-28.jpg" alt="img">
															</span>
															<span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-29.jpg" alt="img">
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>Performance</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>2024
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2022</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div>
									<div class="bg-light d-flex align-items-center rounded p-2">
										<h3 class="me-2">98%</h3>
										<span class="badge badge-outline-success bg-success-transparent rounded-pill me-1">12%</span>
										<span>vs last years</span>
									</div>
									<div id="performance_chart2"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>My Skills</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>2024
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">2022</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div>
									<div class="border border-dashed bg-transparent-light rounded p-2 mb-2">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<span class="d-block border border-2 h-12 border-primary rounded-5 me-2"></span>
												<div>
													<h6 class="fw-medium mb-1">Figma</h6>
													<p>Updated : 15 May 2025</p>
												</div>
											</div>
											<div class="circle-progress circle-progress-md"  data-value='95'>
												<span class="progress-left">
													<span class="progress-bar border-primary"></span>
												</span>
												<span class="progress-right">
													<span class="progress-bar border-primary"></span>
												</span>
												<div class="progress-value">95%</div>
											</div>
										</div>
									</div>
									<div class="border border-dashed bg-transparent-light rounded p-2 mb-2">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<span class="d-block border border-2 h-12 border-success rounded-5 me-2"></span>
												<div>
													<h6 class="fw-medium mb-1">HTML</h6>
													<p>Updated : 12 May 2025</p>
												</div>
											</div>
											<div class="circle-progress circle-progress-md"  data-value='85'>
												<span class="progress-left">
													<span class="progress-bar border-success"></span>
												</span>
												<span class="progress-right">
													<span class="progress-bar border-success"></span>
												</span>
												<div class="progress-value">85%</div>
											</div>
										</div>
									</div>
									<div class="border border-dashed bg-transparent-light rounded p-2 mb-2">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<span class="d-block border border-2 h-12 border-purple rounded-5 me-2"></span>
												<div>
													<h6 class="fw-medium mb-1">CSS</h6>
													<p>Updated : 12 May 2025</p>
												</div>
											</div>
											<div class="circle-progress circle-progress-md"  data-value='70'>
												<span class="progress-left">
													<span class="progress-bar border-purple"></span>
												</span>
												<span class="progress-right">
													<span class="progress-bar border-purple"></span>
												</span>
												<div class="progress-value">70%</div>
											</div>
										</div>
									</div>
									<div class="border border-dashed bg-transparent-light rounded p-2 mb-2">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<span class="d-block border border-2 h-12 border-info rounded-5 me-2"></span>
												<div>
													<h6 class="fw-medium mb-1">Wordpress</h6>
													<p>Updated : 15 May 2025</p>
												</div>
											</div>
											<div class="circle-progress circle-progress-md"  data-value='61'>
												<span class="progress-left">
													<span class="progress-bar border-info"></span>
												</span>
												<span class="progress-right">
													<span class="progress-bar border-info"></span>
												</span>
												<div class="progress-value">61%</div>
											</div>
										</div>
									</div>
									<div class="border border-dashed bg-transparent-light rounded p-2">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<span class="d-block border border-2 h-12 border-dark rounded-5 me-2"></span>
												<div>
													<h6 class="fw-medium mb-1">Javascript</h6>
													<p>Updated : 13 May 2025</p>
												</div>
											</div>
											<div class="circle-progress circle-progress-md"  data-value='58'>
												<span class="progress-left">
													<span class="progress-bar border-dark"></span>
												</span>
												<span class="progress-right">
													<span class="progress-bar border-dark"></span>
												</span>
												<div class="progress-value">58%</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 d-flex">
						<div class="flex-fill">
							<div class="card card-bg-5 bg-dark mb-3">
								<div class="card-body">
									<div class="text-center">
										<h5 class="text-white mb-4">Team Birthday</h5>
										<span class="avatar avatar-xl avatar-rounded mb-2">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-35.jpg" alt="Img">
										</span>
										<div class="mb-3">
											<h6 class="text-white fw-medium mb-1">Andrew Jermia</h6>
											<p>IOS Developer</p>
										</div>
										<a href="#" class="btn btn-sm btn-primary">Send Wishes</a>
									</div>
								</div>
							</div>
							<div class="card bg-secondary mb-3">
								<div class="card-body d-flex align-items-center justify-content-between p-3">
									<div>
										<h5 class="text-white mb-1">Leave Policy</h5>
										<p class="text-white">Last Updated : Today</p>
									</div>
									<a href="#" class="btn btn-white btn-sm px-3">View All</a>
								</div>
							</div>
							<div class="card bg-warning">
								<div class="card-body d-flex align-items-center justify-content-between p-3">
									<div>
										<h5 class="mb-1">Next Holiday</h5>
										<p class="text-gray-9">Diwali, 15 Sep 2025</p>
									</div>
									<a href="https://smarthr.dreamstechnologies.com/html/template/holidays.html" class="btn btn-white btn-sm px-3">View All</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h5>Team Members</h5>
									<div>
										<a href="#" class="btn btn-light btn-sm">View All</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar flex-shrink-0">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-27.jpg" class="rounded-circle border border-2" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Alexander Jermai</a></h6>
											<p class="fs-13">UI/UX Designer</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-phone fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-mail-bolt fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm"><i class="ti ti-brand-hipchat fs-16"></i></a>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar flex-shrink-0">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-42.jpg" class="rounded-circle border border-2" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Doglas Martini</a></h6>
											<p class="fs-13">Product Designer</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-phone fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-mail-bolt fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm"><i class="ti ti-brand-hipchat fs-16"></i></a>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar flex-shrink-0">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-43.jpg" class="rounded-circle border border-2" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Daniel Esbella</a></h6>
											<p class="fs-13">Project Manager</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-phone fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-mail-bolt fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm"><i class="ti ti-brand-hipchat fs-16"></i></a>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar flex-shrink-0">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-11.jpg" class="rounded-circle border border-2" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Daniel Esbella</a></h6>
											<p class="fs-13">Team Lead</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-phone fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-mail-bolt fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm"><i class="ti ti-brand-hipchat fs-16"></i></a>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar flex-shrink-0">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-44.jpg" class="rounded-circle border border-2" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Stephan Peralt</a></h6>
											<p class="fs-13">Team Lead</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-phone fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-mail-bolt fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm"><i class="ti ti-brand-hipchat fs-16"></i></a>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar flex-shrink-0">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-54.jpg" class="rounded-circle border border-2" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Andrew Jermia</a></h6>
											<p class="fs-13">Project  Lead</p>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-phone fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm me-2"><i class="ti ti-mail-bolt fs-16"></i></a>
										<a href="#" class="btn btn-light btn-icon btn-sm"><i class="ti ti-brand-hipchat fs-16"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h5>Notifications</h5>
									<div>
										<a href="#" class="btn btn-light btn-sm">View All</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-start mb-4">
									<a href="javascript:void(0);" class="avatar flex-shrink-0">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-27.jpg" class="rounded-circle border border-2" alt="img">
									</a>
									<div class="ms-2">
										<h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
										<p class="fs-13 mb-2">Today at 9:42 AM</p>
										<div class="d-flex align-items-center">
											<a href="#" class="avatar avatar-sm border flex-shrink-0 me-2"><img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/social/pdf-icon.svg" class="w-auto h-auto" alt="Img"></a>
											<h6 class="fw-normal"><a href="#">EY_review.pdf</a></h6>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-start mb-4">
									<a href="javascript:void(0);" class="avatar flex-shrink-0">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-28.jpg" class="rounded-circle border border-2" alt="img">
									</a>
									<div class="ms-2">
										<h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
										<p class="fs-13 mb-0">Today at 10:00 AM</p>
									</div>
								</div>
								<div class="d-flex align-items-start mb-4">
									<a href="javascript:void(0);" class="avatar flex-shrink-0">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-29.jpg" class="rounded-circle border border-2" alt="img">
									</a>
									<div class="ms-2">
										<h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
										<p class="fs-13 mb-2">Today at 10:50 AM</p>
										<div class="d-flex align-items-center">
											<a href="#" class="btn btn-primary btn-sm me-2">Approve</a>
											<a href="#" class="btn btn-outline-primary btn-sm">Decline</a>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-start mb-4">
									<a href="javascript:void(0);" class="avatar flex-shrink-0">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-30.jpg" class="rounded-circle border border-2" alt="img">
									</a>
									<div class="ms-2">
										<h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
										<p class="fs-13 mb-0">Today at 12:00 PM</p>
									</div>
								</div>
								<div class="d-flex align-items-start">
									<a href="javascript:void(0);" class="avatar flex-shrink-0">
										<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-33.jpg" class="rounded-circle border border-2" alt="img">
									</a>
									<div class="ms-2">
										<h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
										<p class="fs-13 mb-0">Today at 05:00 PM</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
									<h5>Meetings Schedule</h5>
									<div class="dropdown">
										<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
											<i class="ti ti-calendar me-1"></i>Today
										</a>
										<ul class="dropdown-menu  dropdown-menu-end p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item rounded-1">This Year</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body schedule-timeline">
								<div class="d-flex align-items-start">
									<div class="d-flex align-items-center active-time">
										<span>09:25 AM</span>
										<span><i class="ti ti-point-filled text-primary fs-20"></i></span>
									</div>
									<div class="flex-fill ps-3 pb-4 timeline-flow">
										<div class="bg-light p-2 rounded">
											<p class="fw-medium text-gray-9 mb-1">Marketing Strategy Presentation</p>
											<span>Marketing</span>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-start">
									<div class="d-flex align-items-center active-time">
										<span>09:20 AM</span>
										<span><i class="ti ti-point-filled text-secondary fs-20"></i></span>
									</div>
									<div class="flex-fill ps-3 pb-4 timeline-flow">
										<div class="bg-light p-2 rounded">
											<p class="fw-medium text-gray-9 mb-1">Design Review Hospital, doctors Management Project</p>
											<span>Review</span>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-start">
									<div class="d-flex align-items-center active-time">
										<span>09:18 AM</span>
										<span><i class="ti ti-point-filled text-warning fs-20"></i></span>
									</div>
									<div class="flex-fill ps-3 pb-4 timeline-flow">
										<div class="bg-light p-2 rounded">
											<p class="fw-medium text-gray-9 mb-1">Birthday Celebration of Employee</p>
											<span>Celebration</span>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-start">
									<div class="d-flex align-items-center active-time">
										<span>09:10 AM</span>
										<span><i class="ti ti-point-filled text-success fs-20"></i></span>
									</div>
									<div class="flex-fill ps-3 timeline-flow">
										<div class="bg-light p-2 rounded">
											<p class="fw-medium text-gray-9 mb-1">Update of Project Flow</p>
											<span>Development</span>
										</div>
									</div>
								</div>
							</div>
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

		<!-- Add Leaves -->
		<div class="modal fade" id="add_leaves">
			<div class="modal-dialog modal-dialog-centered modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Leave</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html">
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Employee Name</label>
										<select class="select">
											<option>Select</option>
											<option>Anthony Lewis</option>
											<option>Brian Villalobos</option>
											<option>Harvey Smith</option>
										</select>
									</div>	
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Leave Type</label>
										<select class="select">
											<option>Select</option>
											<option>Medical Leave</option>
											<option>Casual Leave</option>
											<option>Annual Leave</option>
										</select>
									</div>	
								</div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">From </label>
                                        <div class="input-icon-end position-relative">
                                            <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
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
                                            <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar text-gray-7"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>   
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">No of Days</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Remaining Days</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Reason</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Add Leaves</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Leaves -->

		<!-- Edit Task -->
		<div class="modal fade" id="edit_task">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Task  </h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="mb-3">
										<label class="form-label">Todo Title</label>
										<input type="text" class="form-control" value="Patient appointment booking">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Due Date</label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Project</label>
										<select class="select">
											<option>Select</option>
											<option selected>Office Management</option>
											<option>Clinic Management </option>
											<option>Educational Platform</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label me-2">Team Members</label>
										<input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Jerald,Andrew,Philip,Davis">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Tag</label>
										<select class="select">
											<option>Select</option>
											<option>Internal</option>
											<option selected>Projects</option>
											<option>Meetings</option>
											<option>Reminder</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Status</label>
										<select class="select">
											<option>Select</option>
											<option selected>Inprogress</option>
											<option>Completed</option>
											<option>Pending</option>
											<option>Onhold</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Priority</label>
										<select class="select">
											<option>Select</option>
											<option selected>Medium</option>
											<option>High</option>
											<option>Low</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<label class="form-label">Who Can See this Task?</label>
									<div class="d-flex align-items-center">
										<div class="form-check me-3">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
											<label class="form-check-label text-dark" for="flexRadioDefault4">
												Public
											</label>
										</div>
										<div class="form-check me-3">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked="">
											<label class="form-check-label text-dark" for="flexRadioDefault5">
												Private
											</label>
										</div>
										<div class="form-check ">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
											<label class="form-check-label text-dark" for="flexRadioDefault6">
												Admin Only
											</label>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Descriptions</label>
										<div class="summernote"></div>
									</div>
								</div>
								<div class="col-md-12">
									<label class="form-label">Upload Attachment</label>
									<div class="bg-light rounded p-2">
										<div class="profile-uploader border-bottom mb-2 pb-2">
											<div class="drag-upload-btn btn btn-sm btn-white border px-3">
												Select File
												<input type="file" class="form-control image-sign" multiple="">
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
											<div class="d-flex align-items-center">
												<h6 class="fs-12 fw-medium me-1">Logo.zip</h6>
												<span class="badge badge-soft-info">21MB </span>
											</div>
											<a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<h6 class="fs-12 fw-medium me-1">Files.zip</h6>
												<span class="badge badge-soft-info">25MB </span>
											</div>
											<a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Edit Task -->

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
							<a href="https://smarthr.dreamstechnologies.com/html/template/employee-dashboard.html" class="btn btn-danger">Yes, Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->
 
	<?php require_once("./includes/footer.php");?>