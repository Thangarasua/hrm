<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<?php
$employeeId = $_SESSION['hrm_employeeId'];
$employeeInfo = getEmployeeInfo($employeeId);
$personalInfo = getPersonalInfo($employeeId);
?>
<!-- Page Wrapper -->
<div class="page-wrapper">
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Employee Attendance</h2>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<div class="me-2 mb-2">
							<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
								<a href="https://smarthr.dreamstechnologies.com/html/template/attendance-admin.html" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-brand-days-counter"></i></a>
								<a href="https://smarthr.dreamstechnologies.com/html/template/attendance-admin.html" class="btn btn-icon btn-sm"><i class="ti ti-calendar-event"></i></a>
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
							<a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#attendance_report"><i class="ti ti-file-analytics me-2"></i>Report</a>
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<div class="row">
					<div class="col-xl-3 col-lg-4 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="mb-3 text-center">
									<h6 class="fw-medium text-gray-5 mb-2">Good Morning, <?php echo $employeeInfo ? $employeeInfo['OfficialName'] : ''; ?></h6>
									<h4 id="logiInTime">00:00 AM, 11 Mar 2025</h4>
									<input type="hidden" class="form-control" name="employeeID" id="employeeID" value="<?php echo $employeeInfo ? $employeeInfo['employeeId'] : ''; ?>" readonly>
								</div>
								<div class="attendance-circle-progress mx-auto mb-3"  data-value='65'>
									<span class="progress-left">
										<span class="progress-bar border-success"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-success"></span>
									</span>
									<div class="avatar avatar-xxl avatar-rounded">
									<img src="<?= $personalInfo && !empty($personalInfo['profilePhoto']) ? './uploads/employee_documents/profile_photo/' . $personalInfo['profilePhoto'] : './assets/img/users/sample-user.jpg'; ?>" alt="Img" class="profile-img" id="cropedImage">
									</div>
								</div>
								<div class="text-center">
									<div class="badge badge-md badge-primary mb-3" id="production-hours">Production: 0.00 hrs</div>
									<h6 class="fw-medium d-flex align-items-center justify-content-center mb-3">
										<i class="text-primary me-1">
											<span id="check-in-status">Log In at 10.00 AM</span>
										</i>
									</h6>
									<a id="punch-action" class="btn btn-dark w-100 disabled">Log In</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 d-flex">
						<div class="row flex-fill">
							<div class="col-xl-3 col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="border-bottom mb-2 pb-2">
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
										<div class="border-bottom mb-2 pb-2">
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
										<div class="border-bottom mb-2 pb-2">
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
										<div class="border-bottom mb-2 pb-2">
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
												<div class="mb-3">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-dark-transparent me-1"></i>Total Working hours</p>
													<h3>12h 36m</h3>
												</div>
											</div>
											<div class="col-xl-3">
												<div class="mb-3">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-success me-1"></i>Productive Hours</p>
													<h3>08h 36m</h3>
												</div>
											</div>
											<div class="col-xl-3">
												<div class="mb-3">
													<p class="d-flex align-items-center mb-1"><i class="ti ti-point-filled text-warning me-1"></i>Break hours</p>
													<h3>22m 15s</h3>
												</div>
											</div>
											<div class="col-xl-3">
												<div class="mb-3">
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

				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
						<h5>Employee Attendance</h5>
						<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
							<div class="me-3">
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control date-range bookingrange" id="attendanceRange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-chevron-down"></i>
									</span>
								</div>
							</div>
							<div class="dropdown me-3">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									Select Status
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Present</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Absent</a>
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
							<table class="table datatable" id="tableRecords">
								<thead class="thead-light">
									<tr>
										<th>S.No</th>
										<th>Date</th>
										<th>Log In</th>
										<th>Status</th>
										<th>Log Out</th>
										<th>Late</th>
										<th>Overtime</th>
										<th>Production Hours</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>

			<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
				<p class="mb-0">2014 - 2025 &copy; SmartHR.</p>
				<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
			</div>

		</div>
		<!-- /Page Wrapper -->

		<!-- Attendance Report -->
		<div class="modal fade" id="attendance_report">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Attendance</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="card shadow-none bg-transparent-light">
							<div class="card-body pb-1">
								<div class="row">
									<div class="col-sm-3">
										<div class="mb-3">
											<span>Date</span>
											<p class="text-gray-9 fw-medium">15 Apr 2025</p>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="mb-3">
											<span>Punch in at</span>
											<p class="text-gray-9 fw-medium">09:00 AM</p>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="mb-3">
											<span>Punch out at</span>
											<p class="text-gray-9 fw-medium">06:45 PM</p>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="mb-3">
											<span>Status</span>
											<p class="text-gray-9 fw-medium">Present</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow-none border mb-0">
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
									<div class="col-md-8 mx-auto">
										<div class="progress bg-transparent-dark mb-3" style="height: 24px;">
											<div class="progress-bar bg-success rounded me-2" role="progressbar" style="width: 18%;"></div>
											<div class="progress-bar bg-warning rounded me-2" role="progressbar" style="width: 5%;"></div>
											<div class="progress-bar bg-success rounded me-2" role="progressbar" style="width: 28%;"></div>
											<div class="progress-bar bg-warning rounded me-2" role="progressbar" style="width: 17%;"></div>
											<div class="progress-bar bg-success rounded me-2" role="progressbar" style="width: 22%;"></div>
											<div class="progress-bar bg-warning rounded me-2" role="progressbar" style="width: 5%;"></div>
											<div class="progress-bar bg-info rounded me-2" role="progressbar" style="width: 3%;"></div>
											<div class="progress-bar bg-info rounded" role="progressbar" style="width: 2%;"></div>
										</div>
										
									</div>
									<div class="co-md-12">
										<div class="d-flex align-items-center justify-content-between">
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
		<!-- /Attendance Report -->
	</div>
	<!-- /Page Wrapper -->
<?php require_once("./includes/footer.php"); ?>
<script src="./js/employee-attendance.js"></script>