<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<?php include("./queries/commonFunctions.php"); 
if (isset($_GET['empId'])) {
	$encryptedId = $_GET['empId'];
    $employeeId = base64_decode($encryptedId);
}
$bankInfo = getBankInfo($employeeId);
$employeeInfo = getEmployeeInfo($employeeId);
?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h6 class="fw-medium d-inline-flex align-items-center mb-3 mb-sm-0"><a href="https://smarthr.dreamstechnologies.com/html/template/employees.html">
						<i class="ti ti-arrow-left me-2"></i>Employee Details - <?php echo $employeeId ? $employeeId : ''; ?></a>
				</h6>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
				<div class="mb-2">
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_bank_satutory" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Bank & Statutory</a>
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
			<div class="col-xl-4 theiaStickySidebar">
				<div class="card card-bg-1">
					<div class="card-body p-0">
						<span class="avatar avatar-xl avatar-rounded border border-2 border-white m-auto d-flex mb-2">
							<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-13.jpg" class="w-auto h-auto" alt="Img">
						</span>
						<div class="text-center px-3 pb-3 border-bottom">
							<div class="mb-3">
								<h5 class="d-flex align-items-center justify-content-center mb-1"><?php echo $employeeInfo ? $employeeInfo['fullName'] : ''; ?><i class="ti ti-discount-check-filled text-success ms-1"></i></h5>
								<span class="badge badge-soft-dark fw-medium me-2">
									<i class="ti ti-point-filled me-1"></i><?php echo $employeeInfo ? $employeeInfo['designationName'] : ''; ?>
								</span>
								<span class="badge badge-soft-secondary fw-medium">10+ years of Experience</span>
							</div>
							<div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<span class="d-inline-flex align-items-center">
										<i class="ti ti-id me-2"></i>
										Employee ID
									</span>
									<p class="text-dark"><?php echo $employeeInfo ? $employeeInfo['employeeId'] : ''; ?></p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<span class="d-inline-flex align-items-center">
										<i class="ti ti-calendar-check me-2"></i>
										Department
									</span>
									<p class="text-dark"><?php echo $employeeInfo ? $employeeInfo['departmentName'] : ''; ?></p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<span class="d-inline-flex align-items-center">
										<i class="ti ti-calendar-check me-2"></i>
										Role
									</span>
									<p class="text-dark"><?php echo $employeeInfo ? $employeeInfo['roleName'] : ''; ?></p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<span class="d-inline-flex align-items-center">
										<i class="ti ti-calendar-check me-2"></i>
										Date Of Join
									</span>
									<p class="text-dark"><?php echo $employeeInfo ? $employeeInfo['doj'] : ''; ?></p>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<span class="d-inline-flex align-items-center">
										<i class="ti ti-calendar-check me-2"></i>
										Report Office
									</span>
									<div class="d-flex align-items-center">
										<span class="avatar avatar-sm avatar-rounded me-2">
											<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-12.jpg" alt="Img">
										</span>
										<p class="text-gray-9 mb-0"><?php echo $employeeInfo ? $employeeInfo['workLocation'] : ''; ?></p>
									</div>
								</div>
								<div class="row gx-2 mt-3">
									<div class="col-6">
										<div>
											<a href="#" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit me-1"></i>Edit Info</a>
										</div>
									</div>
									<div class="col-6">
										<div>
											<a href="https://smarthr.dreamstechnologies.com/html/template/chat.html" class="btn btn-primary w-100"><i class="ti ti-message-heart me-1"></i>Message</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between mb-2">
								<h6>Basic information</h6>
								<a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-phone me-2"></i>
									Phone
								</span>
								<p class="text-dark"><?php echo $employeeInfo ? $employeeInfo['phone'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-mail-check me-2"></i>
									Email
								</span>
								<a href="javascript:void(0);" class="text-info d-inline-flex align-items-center"><span class="__cf_email__" data-cfemail=""><?php echo $employeeInfo ? $employeeInfo['email'] : ''; ?></span><i class="ti ti-copy text-dark ms-2"></i></a>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-gender-male me-2"></i>
									Gender
								</span>
								<p class="text-dark text-end">Male</p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-cake me-2"></i>
									Birdthday
								</span>
								<p class="text-dark text-end">24th July 2000</p>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-map-pin-check me-2"></i>
									Address
								</span>
								<p class="text-dark text-end">1861 Bayonne Ave, <br> Manchester, NJ, 08759</p>
							</div>
						</div>
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between mb-2">
								<h6>Personal Information</h6>
								<a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_personal"><i class="ti ti-edit"></i></a>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-e-passport me-2"></i>
									Passport No
								</span>
								<p class="text-dark">QRET4566FGRT</p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-calendar-x me-2"></i>
									Passport Exp Date
								</span>
								<p class="text-dark text-end">15 May 2029</p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-gender-male me-2"></i>
									Nationality
								</span>
								<p class="text-dark text-end">Indian</p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-bookmark-plus me-2"></i>
									Religion
								</span>
								<p class="text-dark text-end">Christianity</p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-hotel-service me-2"></i>
									Marital status
								</span>
								<p class="text-dark text-end">Yes</p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-briefcase-2 me-2"></i>
									Employment of spouse
								</span>
								<p class="text-dark text-end">No</p>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-baby-bottle me-2"></i>
									No. of children
								</span>
								<p class="text-dark text-end">2</p>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex align-items-center justify-content-between mb-2">
					<h6>Emergency Contact Number</h6>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_emergency"><i class="ti ti-edit"></i></a>
				</div>
				<div class="card">
					<div class="card-body p-0">
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<span class="d-inline-flex align-items-center">
										Primary
									</span>
									<h6 class="d-flex align-items-center fw-medium mt-1">Adrian Peralt <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger"></i></span>Father</h6>
								</div>
								<p class="text-dark">+1 127 2685 598</p>
							</div>
						</div>
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<span class="d-inline-flex align-items-center">
										Secondry
									</span>
									<h6 class="d-flex align-items-center fw-medium mt-1">Karen Wills <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger"></i></span>Mother</h6>
								</div>
								<p class="text-dark">+1 989 7774 787</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8">
				<div>
					<div class="tab-content custom-accordion-items">
						<div class="tab-pane active show" id="bottom-justified-tab1" role="tabpanel">
							<div class="accordion accordions-items-seperate" id="accordionExample">
								<div class="accordion-item">
									<div class="accordion-header" id="headingOne">
										<div class="accordion-button">
											<div class="d-flex align-items-center flex-fill">
												<h5>About Employee</h5>
												<a href="#" class="btn btn-sm btn-icon ms-auto" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
												<a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderOne" aria-expanded="false" aria-controls="primaryBorderOne">
													<i class="ti ti-chevron-down fs-18"></i>
												</a>
											</div>
										</div>
									</div>
									<div id="primaryBorderOne" class="accordion-collapse collapse show border-top" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body mt-2">
											<?php echo $employeeInfo ? $employeeInfo['about'] : ''; ?> 
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<div class="accordion-header" id="headingTwo">
										<div class="accordion-button">
											<div class="d-flex align-items-center flex-fill">
												<h5>Bank Information</h5>
												<a href="#" class="btn btn-sm btn-icon ms-auto" data-bs-toggle="modal" data-bs-target="#edit_bank"><i class="ti ti-edit"></i></a>
												<a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderTwo" aria-expanded="false" aria-controls="primaryBorderTwo">
													<i class="ti ti-chevron-down fs-18"></i>
												</a>
											</div>
										</div>
									</div>
									<div id="primaryBorderTwo" class="accordion-collapse collapse border-top" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="row">
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Bank Name
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $bankInfo ? $bankInfo['bankName'] : ''; ?></h6>
												</div>
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Bank account no
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $bankInfo ? $bankInfo['bankAccountNumber'] : ''; ?></h6>
												</div>
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														IFSC Code
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $bankInfo ? $bankInfo['ifscCode'] : ''; ?></h6>
												</div>
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Branch
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $bankInfo ? $bankInfo['branchName'] : ''; ?></h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<div class="accordion-header" id="headingThree">
										<div class="accordion-button">
											<div class="d-flex align-items-center justify-content-between flex-fill">
												<h5>Family Information</h5>
												<div class="d-flex">
													<a href="#" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_familyinformation"><i class="ti ti-edit"></i></a>
													<a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderThree" aria-expanded="false" aria-controls="primaryBorderThree">
														<i class="ti ti-chevron-down fs-18"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div id="primaryBorderThree" class="accordion-collapse collapse border-top" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="row">
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Name
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1">Hendry Peralt</h6>
												</div>
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Relationship
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1">Brother</h6>
												</div>
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Date of birth
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1">25 May 2014</h6>
												</div>
												<div class="col-md-3">
													<span class="d-inline-flex align-items-center">
														Phone
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1">+1 265 6956 961</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="accordion-item">
											<div class="row">
												<div class="accordion-header" id="headingFour">
													<div class="accordion-button">
														<div class="d-flex align-items-center justify-content-between flex-fill">
															<h5>Education Details</h5>
															<div class="d-flex">
																<a href="#" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_education"><i class="ti ti-edit"></i></a>
																<a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFour" aria-expanded="false" aria-controls="primaryBorderFour">
																	<i class="ti ti-chevron-down fs-18"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
												<div id="primaryBorderFour" class="accordion-collapse collapse border-top" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
													<div class="accordion-body">
														<div>
															<div class="mb-3">
																<div class="d-flex align-items-center justify-content-between">
																	<div>
																		<span class="d-inline-flex align-items-center fw-normal">
																			Oxford University
																		</span>
																		<h6 class="d-flex align-items-center mt-1">Computer Science</h6>
																	</div>
																	<p class="text-dark">2020 - 2022</p>
																</div>
															</div>
															<div class="mb-3">
																<div class="d-flex align-items-center justify-content-between">
																	<div>
																		<span class="d-inline-flex align-items-center fw-normal">
																			Cambridge University
																		</span>
																		<h6 class="d-flex align-items-center mt-1">Computer Network & Systems</h6>
																	</div>
																	<p class="text-dark">2016- 2019</p>
																</div>
															</div>
															<div>
																<div class="d-flex align-items-center justify-content-between">
																	<div>
																		<span class="d-inline-flex align-items-center fw-normal">
																			Oxford School
																		</span>
																		<h6 class="d-flex align-items-center mt-1">Grade X</h6>
																	</div>
																	<p class="text-dark">2012 - 2016</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="accordion-item">
											<div class="row">
												<div class="accordion-header" id="headingFive">
													<div class="accordion-button collapsed">
														<div class="d-flex align-items-center justify-content-between flex-fill">
															<h5>Experience</h5>
															<div class="d-flex">
																<a href="#" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_experience"><i class="ti ti-edit"></i></a>
																<a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFive" aria-expanded="false" aria-controls="primaryBorderFive">
																	<i class="ti ti-chevron-down fs-18"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
												<div id="primaryBorderFive" class="accordion-collapse collapse border-top" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
													<div class="accordion-body">
														<div>
															<div class="mb-3">
																<div class="d-flex align-items-center justify-content-between">
																	<div>
																		<h6 class="d-inline-flex align-items-center fw-medium">
																			Google
																		</h6>
																		<span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>UI/UX Developer</span>
																	</div>
																	<p class="text-dark">Jan 2013 - Present</p>
																</div>
															</div>
															<div class="mb-3">
																<div class="d-flex align-items-center justify-content-between">
																	<div>
																		<h6 class="d-inline-flex align-items-center fw-medium">
																			Salesforce
																		</h6>
																		<span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>Web Developer</span>
																	</div>
																	<p class="text-dark">Dec 2012- Jan 2015</p>
																</div>
															</div>
															<div>
																<div class="d-flex align-items-center justify-content-between">
																	<div>
																		<h6 class="d-inline-flex align-items-center fw-medium">
																			HubSpot
																		</h6>
																		<span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>Software Developer</span>
																	</div>
																	<p class="text-dark">Dec 2011- Jan 2012</p>
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
									<div class="card-body">
										<div class="contact-grids-tab p-0 mb-3">
											<ul class="nav nav-underline" id="myTab" role="tablist">
												<li class="nav-item" role="presentation">
													<button class="nav-link active" id="info-tab2" data-bs-toggle="tab" data-bs-target="#basic-info2" type="button" role="tab" aria-selected="true">Projects</button>
												</li>
												<li class="nav-item" role="presentation">
													<button class="nav-link" id="address-tab2" data-bs-toggle="tab" data-bs-target="#address2" type="button" role="tab" aria-selected="false">Assets</button>
												</li>
											</ul>
										</div>
										<div class="tab-content" id="myTabContent3">
											<div class="tab-pane fade show active" id="basic-info2" role="tabpanel" aria-labelledby="info-tab2" tabindex="0">
												<div class="row">
													<div class="col-md-6 d-flex">
														<div class="card flex-fill mb-4 mb-md-0">
															<div class="card-body">
																<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
																	<a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html" class="flex-shrink-0 me-2">
																		<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/social/project-03.svg" alt="Img">
																	</a>
																	<div>
																		<h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html">World Health</a></h6>
																		<div class="d-flex align-items-center">
																			<p class="mb-0 fs-13">8 tasks</p>
																			<p class="fs-13"><span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>15 Completed</p>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-6">
																		<div>
																			<span class="mb-1 d-block">Deadline</span>
																			<p class="text-dark">31 July 2025</p>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div>
																			<span class="mb-1 d-block">Project Lead</span>
																			<a href="#" class="fw-normal d-flex align-items-center">
																				<img class="avatar avatar-sm rounded-circle me-2" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="Img">
																				Leona
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6 d-flex">
														<div class="card flex-fill mb-0">
															<div class="card-body">
																<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
																	<a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html" class="flex-shrink-0 me-2">
																		<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/social/project-01.svg" alt="Img">
																	</a>
																	<div>
																		<h6 class="mb-1 text-truncate"><a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html">Hospital Administration</a></h6>
																		<div class="d-flex align-items-center">
																			<p class="mb-0 fs-13">8 tasks</p>
																			<p class="fs-13"><span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>15 Completed</p>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-6">
																		<div>
																			<span class="mb-1 d-block">Deadline</span>
																			<p class="text-dark">31 July 2025</p>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div>
																			<span class="mb-1 d-block">Project Lead</span>
																			<a href="#" class="fw-normal d-flex align-items-center">
																				<img class="avatar avatar-sm rounded-circle me-2" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="Img">
																				Leona
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="address2" role="tabpanel" aria-labelledby="address-tab2" tabindex="0">
												<div class="row">
													<div class="col-md-12 d-flex">
														<div class="card flex-fill">
															<div class="card-body">
																<div class="row align-items-center">
																	<div class="col-md-8">
																		<div class="d-flex align-items-center">
																			<a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html" class="flex-shrink-0 me-2">
																				<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/products/product-05.jpg" class="img-fluid rounded-circle" alt="img">
																			</a>
																			<div>
																				<h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html">Dell Laptop - #343556656</a></h6>
																				<div class="d-flex align-items-center">
																					<p><span class="text-primary">AST - 001<i class="ti ti-point-filled text-primary mx-1"></i></span>Assigned on 22 Nov, 2022 10:32AM </p>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div>
																			<span class="mb-1 d-block">Assigned by</span>
																			<a href="#" class="fw-normal d-flex align-items-center">
																				<img class="avatar avatar-sm rounded-circle me-2" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="Img">
																				Andrew Symon
																			</a>
																		</div>
																	</div>
																	<div class="col-md-1">
																		<div class="dropdown ms-2">
																			<a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
																				<i class="ti ti-dots-vertical"></i>
																			</a>
																			<ul class="dropdown-menu dropdown-menu-end p-3">
																				<li>
																					<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#asset_info">View Info</a>
																				</li>
																				<li>
																					<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#refuse_msg">Raise Issue </a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 d-flex">
														<div class="card flex-fill mb-0">
															<div class="card-body">
																<div class="row align-items-center">
																	<div class="col-md-8">
																		<div class="d-flex align-items-center">
																			<a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html" class="flex-shrink-0 me-2">
																				<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/products/product-06.jpg" class="img-fluid rounded-circle" alt="img">
																			</a>
																			<div>
																				<h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/project-details.html">Bluetooth Mouse - #478878</a></h6>
																				<div class="d-flex align-items-center">
																					<p><span class="text-primary">AST - 001<i class="ti ti-point-filled text-primary mx-1"></i></span>Assigned on 22 Nov, 2022 10:32AM </p>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div>
																			<span class="mb-1 d-block">Assigned by</span>
																			<a href="#" class="fw-normal d-flex align-items-center">
																				<img class="avatar avatar-sm rounded-circle me-2" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="Img">
																				Andrew Symon
																			</a>
																		</div>
																	</div>
																	<div class="col-md-1">
																		<div class="dropdown ms-2">
																			<a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
																				<i class="ti ti-dots-vertical"></i>
																			</a>
																			<ul class="dropdown-menu dropdown-menu-end p-3">
																				<li>
																					<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#asset_info">View Info</a>
																				</li>
																				<li>
																					<a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#refuse_msg">Raise Issue </a>
																				</li>
																			</ul>
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

<!-- Edit Employee -->
<div class="modal fade" id="edit_employee">
<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<h4 class="modal-title me-2">Edit Employee</h4>
				</div>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="editEmployee">
				<div class="contact-grids-tab">
					<ul class="nav nav-underline" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">Basic Information</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="office-tab" data-bs-toggle="tab" data-bs-target="#office-info" type="button" role="tab" aria-selected="true">Official Information</button>
						</li>
					</ul>
				</div>
				<div class="tab-content" id="myTabContent">
					<!-- Basic Information Tab -->
					<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-tab" tabindex="0">
						<div class="modal-body pb-0 ">
							<div class="row">
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Role (or) Hierarchy <span class="text-danger"> *</span></label>
										<select class="select" name="role" id="role" required>
											<option value="">Select</option>
											<?php echo getRoles($employeeInfo ? $employeeInfo['role'] : ''); ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Department <span class="text-danger"> *</span></label>
										<select class="select" name="department" id="department" required>
											<option value="">Select</option>
											<?php echo getDepartments($employeeInfo ? $employeeInfo['department'] : ''); ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Designation <span class="text-danger"> *</span></label>
										<input type="hidden" class="form-control" name="designationId" id="designationId" value="<?php echo $employeeInfo ? $employeeInfo['designation'] : ''; ?>" >
										<select class="select" name="designation" id="designation" required>
											<option value="">Select</option>
										</select>
									</div>
								</div>
								<div class="col-md-6" id="manager-container">
									<div class="mb-3">
										<label class="form-label">Manager <span class="text-danger"> *</span></label>
										<select class="select" name="manager" id="manager">
											<option value="">Select</option>
											<?php echo getManagerUsers(3, $employeeInfo ? $employeeInfo['manager'] : '') ; ?>
										</select>
									</div>
								</div>
								<div class="col-md-6" id="supervisors-container">
									<div class="mb-3">
										<label class="form-label">Supervisors</label>
										<select class="select" name="supervisors" id="supervisors">
											<option value="">Select</option>
											<?php echo getManagerUsers(2, $employeeInfo ? $employeeInfo['supervisor'] : '') ; ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Full Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" onkeypress="return isAlphabets(event)" name="employeeName" value="<?php echo $employeeInfo ? $employeeInfo['fullName'] : ''; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Email <span class="text-danger"> *</span></label>
										<input type="email" class="form-control" onblur="return isEmail(this)" placeholder="@actetechnologies.com" name="email" value="<?php echo $employeeInfo ? $employeeInfo['email'] : ''; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Phone Number <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" onkeypress="return isNumber(event)" name="phone" value="<?php echo $employeeInfo ? $employeeInfo['phone'] : ''; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Joining Date <span class="text-danger"> *</span></label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" name="doj" id="doj" value="<?php echo $employeeInfo ? $employeeInfo['doj'] : ''; ?>" required>
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Employee ID <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="employeeID"  id="employeeID" value="<?php echo $employeeInfo ? $employeeInfo['employeeId'] : ''; ?>" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Password <span class="text-danger"> *</span></label>
										<input type="password" class="form-control" name="password" required value="<?php echo $employeeInfo ? $employeeInfo['password'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="confirmPassword" value="<?php echo $employeeInfo ? $employeeInfo['password'] : ''; ?>" required>
									</div>
								</div> 
							</div>
						</div>  
					</div>
					<!-- Official Information Tab -->
					<div class="tab-pane fade" id="office-info" role="tabpanel" aria-labelledby="office-tab" tabindex="0">
						<div class="modal-body pb-0">
							<div class="row"> 
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Work Location <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" id="locationTypeSearch" name="workLocation" oninput="capitalizeWords(this)" placeholder="eg : Chennai" autocomplete="off" value="<?php echo $employeeInfo ? $employeeInfo['workLocation'] : ''; ?>" />
										<ul class="list-group addFields" id="locationTypeResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Employee Type <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" id="jobTypeSearch" name="employeeType" oninput="capitalizeWords(this)" placeholder="eg : Full Time" autocomplete="off" value="<?php echo $employeeInfo ? $employeeInfo['employeeType'] : ''; ?>"/>
										<ul class="list-group addFields" id="jobTypeResult"></ul>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">About</label>
										<textarea class="form-control" rows="3" name="about"><?php echo $employeeInfo ? $employeeInfo['about'] : ''; ?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary editEmployeeSaveBtn">Save <i class='fa-solid fa-cloud-arrow-up'></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Employee -->

<!-- Edit Personal -->
<div class="modal fade" id="edit_personal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Personal Info</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Passport No <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Passport Expiry Date <span class="text-danger"> *</span></label>
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
								<label class="form-label">Nationality <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Religion</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Marital status <span class="text-danger"> *</span></label>
								<select class="select">
									<option>Select</option>
									<option>Yes</option>
									<option>Nos</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Employment spouse</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">No. of children</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Personal -->

<!-- Edit Emergency Contact -->
<div class="modal fade" id="edit_emergency">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Emergency Contact Details</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">
				<div class="modal-body pb-0">
					<div class="border-bottom mb-3 ">
						<div class="row">
							<h5 class="mb-3">Secondary Contact Details</h5>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Name <span class="text-danger"> *</span></label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Relationship </label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Phone No 1 <span class="text-danger"> *</span></label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Phone No 2 </label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<h5 class="mb-3">Secondary Contact Details</h5>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Relationship </label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Phone No 1 <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Phone No 2 </label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Emergency Contact -->

<!-- Edit Bank -->
<div class="modal fade" id="edit_bank">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Bank Details</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="#" id="addBankInfo">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Bank Details <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="bankName" value="<?php echo $bankInfo ? $bankInfo['bankName'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Bank account No </label>
								<input type="text" class="form-control" name="bankAccountNumber" value="<?php echo $bankInfo ? $bankInfo['bankAccountNumber'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">IFSC Code</label>
								<input type="text" class="form-control" name="ifscCode" value="<?php echo $bankInfo ? $bankInfo['ifscCode'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Branch Address</label>
								<input type="text" class="form-control" name="branchName" value="<?php echo $bankInfo ? $bankInfo['branchName'] : ''; ?>" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Edit Bank -->

<!-- Add Family -->
<div class="modal fade" id="edit_familyinformation">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Family Information</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Relationship </label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Phone </label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Passport Expiry Date <span class="text-danger"> *</span></label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Family -->

<!-- Add Education -->
<div class="modal fade" id="edit_education">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Education Information</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Institution Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Course <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Start Date <span class="text-danger"> *</span></label>
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
								<label class="form-label">End Date <span class="text-danger"> *</span></label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Education -->

<!-- Add Experience -->
<div class="modal fade" id="edit_experience">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Company Information</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Previous Company Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Designation <span class="text-danger"> *</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Start Date <span class="text-danger"> *</span></label>
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
								<label class="form-label">End Date <span class="text-danger"> *</span></label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-check-label d-flex align-items-center mt-0">
									<input class="form-check-input mt-0 me-2" type="checkbox" checked="">
									<span class="text-dark">Check if you working present</span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Experience -->

<!-- Add Employee Success -->
<div class="modal fade" id="success_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3"><i class="ti ti-check fs-24"></i></span>
					<h5 class="mb-2">Employee Update Successfully</h5>
					<p class="mb-3"><?php echo $employeeInfo ? $employeeInfo['fullName'] : ''; ?> : <span class="text-primary">#<?php echo $employeeInfo ? $employeeInfo['employeeId'] : ''; ?></span>
					</p>
					<div>
						<div class="row g-2">
							<div class="col-6">
								<a href="">Back to List</a>
							</div>
							<div class="col-6">
								<a href="">Detail Page</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Add Client Success -->

<!-- Add Statuorty -->
<div class="modal fade" id="add_bank_satutory">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Bank & Statutory</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form>
                <div class="modal-body pb-0">
                    <h5 class="mb-3">Salary Details</h5>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Gross Salary<span class="text-danger"> *</span></label>
                                <input type="number" id="grossSalary" class="form-control" placeholder="Enter Gross Salary">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">CTC<span class="text-danger"> *</span></label>
                                <input type="number" id="MonthCtc" class="form-control" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label class="form-label">Basic Salary (50%)</label><input type="text" id="basicSalary" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">HRA (50%)</label><input type="text" id="hra" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">Conveyance Allowance (Fixed)</label><input type="text" id="conveyance" class="form-control" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label class="form-label">Medical Allowance (Fixed)</label><input type="text" id="medicalAllowance" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">Per Diem Allowance (Fixed)</label><input type="text" id="perDiem" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">Special Allowance</label><input type="text" id="specialAllowance" class="form-control" readonly></div>
                    </div>
                    
                    <h5 class="mb-3">Deductions</h5>
                    <div class="row mb-2">
                        <div class="col-md-4"><label class="form-label">PF Employee (On Basic 12%)</label><input type="text" id="pfEmployee" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">ESI Employee (On Gross 0.75%)</label><input type="text" id="esiEmployee" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">Professional Tax</label><input type="text" id="professionalTax" class="form-control" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label class="form-label">Total Deductions</label><input type="text" id="totalDeductions" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">Net Salary</label><input type="text" id="netSalary" class="form-control" readonly></div>
                    </div>
                    
                    <h5 class="mb-3">Employer Contributions</h5>
                    <div class="row mb-2">
                        <div class="col-md-4"><label class="form-label">PF Employer (On Basic 13%)</label><input type="text" id="pfEmployer" class="form-control" readonly></div>
                        <div class="col-md-4"><label class="form-label">ESI Employer (On Gross 3.25%)</label><input type="text" id="esiEmployer" class="form-control" readonly></div>
                    </div>
                    
                    <h5 class="mb-3">CTC Calculation</h5>
                    <div class="row mb-2">
                        <div class="col-md-4"><label class="form-label">CTC Month</label><input type="text" id="ctc" class="form-control" readonly></div>
						<div class="col-md-4"><label class="form-label">CTC Years</label><input type="text" id="yearCtc" class="form-control" readonly></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- /Add Statuorty -->

<!-- Asset Information -->
<div class="modal fade" id="asset_info">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Asset Information</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="bg-light p-3 rounded d-flex align-items-center mb-3">
					<span class="avatar avatar-lg flex-shrink-0 me-2">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/laptop.jpg" alt="img" class="ig-fluid rounded-circle">
					</span>
					<div>
						<h6>Dell Laptop - #343556656</h6>
						<p class="fs-13"><span class="text-primary">AST - 001 </span><i class="ti ti-point-filled text-primary"></i> Assigned on 22 Nov, 2022 10:32AM</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Type</p>
							<p class="text-gray-9">Laptop</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Brand</p>
							<p class="text-gray-9">Dell</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Category</p>
							<p class="text-gray-9">Computer</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Serial No</p>
							<p class="text-gray-9">3647952145678</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Cost</p>
							<p class="text-gray-9">$800</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Vendor</p>
							<p class="text-gray-9">Compusoft Systems Ltd.,</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Warranty</p>
							<p class="text-gray-9">12 Jan 2022 - 12 Jan 2026</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<p class="fs-13 mb-0">Location</p>
							<p class="text-gray-9">46 Laurel Lane, TX 79701</p>
						</div>
					</div>
				</div>
				<div>
					<p class="fs-13 mb-2">Asset Images</p>
					<div class="d-flex align-items-center">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/laptop-01.jpg" alt="img" class="img-fluid rounded me-2">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/laptop-2.jpg" alt="img" class="img-fluid rounded me-2">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/laptop-3.jpg" alt="img" class="img-fluid rounded">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Asset Information -->

<!-- Refuse -->
<div class="modal fade" id="refuse_msg">
	<div class="modal-dialog modal-dialog-centered modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Raise Issue</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Description<span class="text-danger"> *</span></label>
								<textarea class="form-control" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Refuse -->

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
					<a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->

<?php require_once("./includes/footer.php"); ?>
<script src="./js/employee-details.js"></script>