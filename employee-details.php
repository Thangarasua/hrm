<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<?php
if (isset($_GET['empId'])) {
	$encryptedId = $_GET['empId'];
	$employeeId = base64_decode($encryptedId);
} else {
	$employeeId = $_SESSION['hrm_employeeId'];
}

$bankInfo = getBankInfo($employeeId);
$employeeInfo = getEmployeeInfo($employeeId);
$experienceInfo = getExperienceInfo($employeeId);
$educationInfo = getEducationInfo($employeeId);
$personalInfo = getPersonalInfo($employeeId);
$familyInfo = getFamilyInfo($employeeId);
$progressPercent = getProfileProgress($employeeId);

$employeeRoleId = $_SESSION['hrm_roleId'];
$employeeDepartment = $_SESSION['hrm_departmentId'];
?>
<!-- Image crop-->
<link rel="stylesheet" href="css/plugins/croppie.css">
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">

		<!-- Breadcrumb -->
		<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
			<div class="my-auto mb-2">
				<h6 class="fw-medium d-inline-flex align-items-center mb-3 mb-sm-0"><a href="#">
						<i class="ti ti-arrow-left me-2"></i>Employee Details - <?php echo $employeeId ? $employeeId : ''; ?></a>
				</h6>
			</div>
			<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
				<!-- <div class="mb-2">
					<a href="#" data-bs-toggle="modal" data-bs-target="#add_bank_satutory" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Bank & Statutory</a>
				</div> -->
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
						<div class="profile-progress">
							<div class="progress-ring" style="--progress: <?= $progressPercent; ?>;">
								<div class="test position-relative pointer" data-bs-toggle="dropdown">
									<img src="<?= $personalInfo && !empty($personalInfo['profilePhoto']) ? './uploads/employee_documents/profile_photo/' . $personalInfo['profilePhoto'] : './assets/img/users/sample-user.jpg'; ?>" alt="Img" class="profile-img" id="cropedImage">
									<i class="fas fa-camera position-absolute" style="right: -2px; bottom: 6px; color: black; font-size: 15px; padding: 5px; background: #fff; border-radius: 14px; z-index: 1;"></i>
								</div>

								<!-- Dropdown Menu -->
								<div class="dropdown-menu" id="profileDropdown">
									<div class="dropdown-item pointer">
										<button id="viewProfile" class="border-0 bg-transparent"><i class="fa-regular fa-circle-user"></i> View profile picture</button>
									</div>
									<div class="dropdown-item pointer">
										<button id="openFile" class="border-0 bg-transparent"><i class="fa-solid fa-images"></i> Choose profile picture</a></button>
										<input type="file" id="fileInput" class="item-img d-none" accept="image/*">
									</div>
								</div>

								<div class="progress-label"><?= $progressPercent; ?>%</div>
							</div>
						</div>

						<!-- <input type="file" id="profilePhoto" name="profilePhoto" style="display: none;" accept="image/*"> -->

						<div class="text-center px-3 pb-3 border-bottom">
							<div class="mb-3">
								<h5 class="d-flex align-items-center justify-content-center mb-1"><?php echo $employeeInfo ? $employeeInfo['OfficialName'] : ''; ?><i class="ti ti-discount-check-filled text-success ms-1"></i></h5>
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
									<a href="javascript:void(0);" class="text-info d-inline-flex align-items-center"><span class="__cf_email__ officialMail" data-cfemail=""><?php echo $employeeInfo ? $employeeInfo['email'] : ''; ?></span><i data-bs-toggle="tooltip" title="Copy to clipboard" class="ti ti-copy text-dark ms-2" id="officialMail"></i></a>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<span class="d-inline-flex align-items-center">
										<i class="ti ti-calendar-check me-2"></i>
										Report Office
									</span>
									<div class="d-flex align-items-center">
										<span class="avatar avatar-sm avatar-rounded me-2">
											<img src="./assets/img/profiles/avatar-12.jpg" alt="Img">
										</span>
										<p class="text-gray-9 mb-0"><?php echo $employeeInfo ? $employeeInfo['workLocation'] : ''; ?></p>
									</div>
								</div>
								<div class="row gx-2 mt-3">
									<div class="col-6">
										<div>
											<?php if ($employeeRoleId == 4 || $employeeRoleId == 5 || $employeeDepartment == 5) { ?>
												<a href="#" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit me-1"></i>Edit Info </a>
											<?php } else { ?>
												<a href="#" class="btn btn-dark w-100" data-bs-toggle="tooltip" title="Contact Admin">
													<i class="ti ti-edit me-1"></i>Edit Info
												</a>
											<?php } ?>
										</div>
									</div>
									<div class="col-6">
										<div>
											<a href="#" class="btn btn-primary w-100"><i class="ti ti-message-heart me-1"></i>Message</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between mb-2">
								<h6>Basic information</h6>
								<a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_personal" data-bs-toggle="tooltip" title="edit & update details"><i class="ti ti-edit"></i></a>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-phone me-2"></i>
									Phone
								</span>
								<p class="text-dark"><?php echo $personalInfo ? $personalInfo['phone'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-mail-check me-2"></i>
									Email
								</span>
								<a href="javascript:void(0);" class="text-info d-inline-flex align-items-center"><span class="__cf_email__ personalMail" data-cfemail=""><?php echo $personalInfo ? $personalInfo['email'] : ''; ?></span><i data-bs-toggle="tooltip" title="Copy to clipboard" class="ti ti-copy text-dark ms-2" id="personalMail"></i></a>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-gender-male me-2"></i>
									Gender
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['gender'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-cake me-2"></i>
									Birdthday
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['dob'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-map-pin-check me-2"></i>
									Address
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['permanentAddress'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-map-pin-check me-2"></i>
									Address Proof
								</span>
								<p class="text-dark text-end">
									<a href="#" class="previewDocument" data-file-url="<?php echo $personalInfo ? $personalInfo['addressPoofFile'] : ''; ?>" class="d-flex align-items-center">
										<i class="fa fa-file-alt iconStyle"></i>
									</a>
								</p>
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
								<p class="text-dark"><?php echo $personalInfo ? $personalInfo['passportNo'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-calendar-x me-2"></i>
									Passport Exp Date
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['passportExpiryDate'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-gender-male me-2"></i>
									Nationality
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['nationality'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-bookmark-plus me-2"></i>
									Religion
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['religion'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-hotel-service me-2"></i>
									Marital status
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['maritalStatus'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-2">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-briefcase-2 me-2"></i>
									Employment of spouse
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['employmentSpouse'] : ''; ?></p>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<span class="d-inline-flex align-items-center">
									<i class="ti ti-baby-bottle me-2"></i>
									No. of children
								</span>
								<p class="text-dark text-end"><?php echo $personalInfo ? $personalInfo['children'] : ''; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex align-items-center justify-content-between mb-2">
					<h6>Emergency Contact Number</h6>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_personal"><i class="ti ti-edit"></i></a>
				</div>
				<div class="card">
					<div class="card-body p-0">
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<span class="d-inline-flex align-items-center">
										Primary
									</span>
									<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $personalInfo ? $personalInfo['primaryContacts'] : ''; ?> <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger"></i></span><?php echo $personalInfo ? $personalInfo['primaryRelationship'] : ''; ?></h6>
								</div>
								<p class="text-dark"><?php echo $personalInfo ? $personalInfo['primaryContactPhone'] : ''; ?></p>
							</div>
						</div>
						<div class="p-3 border-bottom">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<span class="d-inline-flex align-items-center">
										Secondry
									</span>
									<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $personalInfo ? $personalInfo['secondaryContact'] : ''; ?> <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger"></i></span><?php echo $personalInfo ? $personalInfo['secondaryRelationship'] : ''; ?></h6>
								</div>
								<p class="text-dark"><?php echo $personalInfo ? $personalInfo['secondaryContactPhone'] : ''; ?></p>
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
								<div class="accordion-item" style="display: none;">
									<div class="accordion-header" id="headingOne">
										<div class="accordion-button">
											<div class="d-flex align-items-center flex-fill">
												<h5>About Employee</h5>
												<a href="#" class="btn btn-sm btn-icon ms-auto" data-bs-toggle="modal" data-bs-target="accordionExample"><i class="ti ti-edit"></i></a>
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
												<div class="col-md-2">
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
												<div class="col-md-2">
													<span class="d-inline-flex align-items-center">
														Branch
													</span>
													<h6 class="d-flex align-items-center fw-medium mt-1"><?php echo $bankInfo ? $bankInfo['branchName'] : ''; ?></h6>
												</div>
												<div class="col-md-2">
													<span class="d-inline-flex align-items-center">
														Proof
													</span>
													<h6>
														<a href="#" class="previewDocument" data-file-url="<?php echo $bankInfo ? $bankInfo['bankProofFile'] : ''; ?>" class="d-flex align-items-center">
															<i class="fa fa-file-alt iconStyle"></i>
														</a>
													</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item" style="display: none;">
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
											<?php echo $familyInfo ? $familyInfo : ''; ?>
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
															<?php echo $educationInfo ? $educationInfo : ''; ?>
														</div>
														<div>
															<button type="submit" class="btn btn-primary" data-bs-target="#edit_education" data-bs-toggle="modal">

																Add More
															</button>
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
													<div class="accordion-button collapsed experienceTab">
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
															<?php echo $experienceInfo ? $experienceInfo : ''; ?>
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
										<input type="hidden" class="form-control" name="designationId" id="designationId" value="<?php echo $employeeInfo ? $employeeInfo['designation'] : ''; ?>">
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
											<?php echo getManagerUsers(3, $employeeInfo ? $employeeInfo['manager'] : ''); ?>
										</select>
									</div>
								</div>
								<div class="col-md-6" id="supervisors-container">
									<div class="mb-3">
										<label class="form-label">Supervisors</label>
										<select class="select" name="supervisors" id="supervisors">
											<option value="">Select</option>
											<?php echo getManagerUsers(2, $employeeInfo ? $employeeInfo['supervisor'] : ''); ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Official Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" onkeypress="return isAlphabets(event)" name="employeeOfficalName" value="<?php echo $employeeInfo ? $employeeInfo['OfficialName'] : ''; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Personal Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" onkeypress="return isAlphabets(event)" name="employeePersonalName" value="<?php echo $employeeInfo ? $employeeInfo['personalName'] : ''; ?>" required>
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
										<input type="text" class="form-control" name="employeeID" id="employeeID" value="<?php echo $employeeInfo ? $employeeInfo['employeeId'] : ''; ?>" readonly>
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
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" id="nextButton">Next <i class="fa-solid fa-circle-chevron-right"></i></button>
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
										<label class="form-label">Work Mode <span class="text-danger"> *</span></label>
										<select class="form-control select" name="workMode" id="workMode">
											<option value="">Select</option>
											<option value="On-Site" <?php echo ($employeeInfo['workMode'] == 'On-Site') ? 'selected' : ''; ?>>On-Site</option>
											<option value="Remote" <?php echo ($employeeInfo['workMode'] == 'Remote') ? 'selected' : ''; ?>>Remote</option>
											<option value="Hybrid" <?php echo ($employeeInfo['workMode'] == 'Hybrid') ? 'selected' : ''; ?>>Hybrid</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Work Type <span class="text-danger"> *</span></label>
										<select class="form-control select" name="workType" id="workType">
											<option value="">Select</option>
											<option value="Full-Time" <?php echo ($employeeInfo['workType'] == 'Full-Time') ? 'selected' : ''; ?>>Full-Time</option>
											<option value="Part-Time" <?php echo ($employeeInfo['workType'] == 'Part-Time') ? 'selected' : ''; ?>>Part-Time</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Work Location <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" id="locationTypeSearch" name="workLocation" oninput="capitalizeWords(this)" value="<?php echo $employeeInfo ? $employeeInfo['workLocation'] : ''; ?>" autocomplete="off" />
										<ul class="list-group addFields" id="locationTypeResult"></ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 position-relative">
										<label class="form-label">Active Status <span class="text-danger"> *</span></label>
										<select name="employeeStatus" id="employeeStatus" class="select">
											<option value="1" <?php echo ($employeeInfo['status'] === '1') ? 'selected' : ''; ?>>Active</option>
											<option value="0" <?php echo ($employeeInfo['status'] === '0') ? 'selected' : ''; ?>>Deactive</option>
										</select>
									</div>
								</div>
								<div class="col-md-6" id="relieving-container" style="display: none;">
									<div class="mb-3 position-relative">
										<label class="form-label">Relieving Date <span class="text-danger"> *</span></label>
										<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" name="relievingDate" id="relievingDate">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-light border me-2" id="previousButton"><i class="fa-solid fa-circle-chevron-left"></i> Back</button>
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
			<form id="addPersonalInfo" action="#" enctype="multipart/form-data">
				<div class="contact-grids-tab">
					<ul class="nav nav-underline" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="basic1-tab" data-bs-toggle="tab" data-bs-target="#basic1-info" type="button" role="tab" aria-selected="true">Basic Information</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab" aria-selected="true">Personal Information</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="emergency-contact-tab" data-bs-toggle="tab" data-bs-target="#emergency-contact-info" type="button" role="tab" aria-selected="true">Emergency Contact Number</button>
						</li>
					</ul>
				</div>
				<div class="tab-content" id="personalInfoTabContent">
					<div class="tab-pane fade show active" id="basic1-info" role="tabpanel" aria-labelledby="basic1-tab" tabindex="0">
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Phone Number <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="personalPhone" value="<?php echo $personalInfo ? $personalInfo['phone'] : ''; ?>" onkeypress="return phoneNumber(event)" onkeypress="return tenDigits(event)" onpaste="numberPasteValidate(event, this)">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Email <span class="text-danger"> *</span></label>
										<input type="email" class="form-control" onblur="return isEmail(this)" placeholder="@gmail.com" name="personalEmail" value="<?php echo $personalInfo ? $personalInfo['email'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Gender <span class="text-danger"> *</span></label>
										<select class="select" name="gender" id="gender">
											<option value="" <?php echo empty($personalInfo['gender']) ? 'selected' : ''; ?>>Select</option>
											<option value="Male" <?php echo isset($personalInfo['gender']) && $personalInfo['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
											<option value="Female" <?php echo isset($personalInfo['gender']) && $personalInfo['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
											<option value="Transgender" <?php echo isset($personalInfo['gender']) && $personalInfo['gender'] == 'Transgender' ? 'selected' : ''; ?>>Transgender</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Date Of Birth <span class="text-danger"> *</span></label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" name="dob" id="dob" value="<?php echo $personalInfo ? $personalInfo['dob'] : ''; ?>">
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Permanent Address <span class="text-danger"> *</span></label>
										<textarea class="form-control" rows="2" name="permanentAddress" id="permanentAddress"><?php echo $personalInfo ? $personalInfo['permanentAddress'] : ''; ?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Present Address <span class="text-danger"> * &nbsp;&nbsp;&nbsp;</span>
											<input class="form-check-input" type="checkbox" id="sameAddressCheck">
											<label class="form-check-label" for="sameAddressCheck">
												Same as Permanent Address
											</label>
										</label>
										<textarea class="form-control" rows="2" name="presentAddress" id="presentAddress"><?php echo $personalInfo ? $personalInfo['presentAddress'] : ''; ?></textarea>
									</div>
								</div>
								<!-- Document Upload Field -->
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Upload Address Proof <span class="text-danger"> (Only support PDF)*</span></label>
										<input type="file" name="addressProof" class="form-control" id="addressProof" accept=".pdf" value="<?php echo $personalInfo ? $personalInfo['addressPoof'] : ''; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-bs-target="#personal-info" data-bs-toggle="tab" id="nextBasicTab">Next</button>
						</div>
					</div>
					<div class="tab-pane fade" id="personal-info" role="tabpanel" aria-labelledby="personal-tab" tabindex="1">
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Passport No</label>
										<input type="text" class="form-control" name="passportNo" id="passportNo" value="<?php echo $personalInfo ? $personalInfo['passportNo'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Passport Expiry Date</label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" name="passportExpiryDate" id="passportExpiryDate" value="<?php echo $personalInfo ? $personalInfo['passportExpiryDate'] : ''; ?>">
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Nationality</label>
										<input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $personalInfo ? $personalInfo['nationality'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Religion</label>
										<input type="text" class="form-control" name="religion" id="religion" value="<?php echo $personalInfo ? $personalInfo['religion'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Marital Status <span class="text-danger"> *</span></label>
										<select class="select" name="maritalStatus" id="maritalStatus">
											<option value="" <?php echo empty($personalInfo['maritalStatus']) ? 'selected' : ''; ?>>Select</option>
											<option value="Yes" <?php echo isset($personalInfo['maritalStatus']) && $personalInfo['maritalStatus'] == 'Yes' ? 'selected' : ''; ?>>Married</option>
											<option value="No" <?php echo isset($personalInfo['maritalStatus']) && $personalInfo['maritalStatus'] == 'No' ? 'selected' : ''; ?>>Single</option>
										</select>
									</div>
								</div>
								<div class="col-md-4" id="employmentSpouseContainer">
									<div class="mb-3">
										<label class="form-label">Employment Spouse</label>
										<input type="text" class="form-control" name="employmentSpouse" id="employmentSpouse" value="<?php echo $personalInfo ? $personalInfo['employmentSpouse'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-4" id="childrenContainer">
									<div class="mb-3">
										<label class="form-label">No. of Children</label>
										<input type="text" class="form-control" name="children" id="children" value="<?php echo $personalInfo ? $personalInfo['children'] : '0'; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary border me-2" data-bs-target="#basic1-info" data-bs-toggle="tab" id="prevBasicTab">Back</button>
							<button type="button" class="btn btn-primary" data-bs-target="#emergency-contact-info" data-bs-toggle="tab" id="nextPersonalTab">Next</button>
						</div>
					</div>
					<div class="tab-pane fade" id="emergency-contact-info" role="tabpanel" aria-labelledby="emergency-contact-tab" tabindex="2">
						<div class="modal-body pb-0">
							<div class="border-bottom mb-3 ">
								<div class="row">
									<h5 class="mb-3">Primary Contact Details</h5>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Name <span class="text-danger"> *</span></label>
											<input type="text" class="form-control" name="primaryContact" id="primaryContact" value="<?php echo $personalInfo ? $personalInfo['primaryContacts'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Relationship </label>
											<input type="text" class="form-control" name="primaryRelationship" id="primaryRelationship" value="<?php echo $personalInfo ? $personalInfo['primaryRelationship'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Phone No <span class="text-danger"> *</span></label>
											<input type="text" class="form-control" name="primaryContactPhone" id="primaryContactPhone" value="<?php echo $personalInfo ? $personalInfo['primaryContactPhone'] : ''; ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<h5 class="mb-3">Secondary Contact Details</h5>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="secondaryContact" id="secondaryContact" value="<?php echo $personalInfo ? $personalInfo['secondaryContact'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Relationship </label>
										<input type="text" class="form-control" name="secondaryRelationship" id="secondaryRelationship" value="<?php echo $personalInfo ? $personalInfo['secondaryRelationship'] : ''; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Phone No <span class="text-danger"> *</span></label>
										<input type="text" class="form-control" name="secondaryContactPhone" id="secondaryContactPhone" value="<?php echo $personalInfo ? $personalInfo['secondaryContactPhone'] : ''; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary border me-2" data-bs-target="#personal-info" data-bs-toggle="tab" id="prevPersonalTab">Back</button>
							<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
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
			<form action="#">
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
								<label class="form-label">Bank Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="bankName" value="<?php echo $bankInfo ? $bankInfo['bankName'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Bank account No <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="bankAccountNumber" value="<?php echo $bankInfo ? $bankInfo['bankAccountNumber'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">IFSC Code <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="ifscCode" value="<?php echo $bankInfo ? $bankInfo['ifscCode'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Branch Address <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="branchName" value="<?php echo $bankInfo ? $bankInfo['branchName'] : ''; ?>" required>
							</div>
						</div>
						<div class="col-md-12">
							<label for="">Upload Proof Bank Passbok / Statement:</label>
							<input type="file" name="bankdocument" class="form-control" id="bankdocument" accept=".pdf,image/*" />
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
			<form action="#" id="addFamilyinformation">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="relationName" id="relationName" oninput="capitalizeWords(this)">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Relationship <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="relationship" id="relationship" oninput="capitalizeWords(this)">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Phone <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="relationPhone" id="relationPhone" onkeypress="return phoneNumber(event)" onkeypress="return tenDigits(event)" onpaste="numberPasteValidate(event, this)">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Address <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="relationAddress" id="relationAddress" oninput="capitalizeWords(this)">
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
<!-- Modal for editing and uploading documents -->
<div class="modal fade" id="edit_education">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Education Information</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form action="#" id="AddEducationInfo" enctype="multipart/form-data">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Category</label>
								<input type="text" class="form-control" id="category" name="category">
							</div>
						</div>

						<!-- Upload Document Fields -->
						<div id="uploadFieldsContainer"></div>

						<!-- Add More Upload Button -->
						<div class="col-md-12">
							<button type="button" class="btn btn-link" id="addMoreUploadFields">Add More Uploads</button>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save Changes</button>
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
				<h4 class="modal-title">Experence Details</h4>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<form id="addExperienceInfo">
				<div class="modal-body pb-0">
					<div class="row">
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label">Experence Level<span class="text-danger"> *</span></label>
								<select class="select" name="experienceLevel" id="experienceLevel">
									<option value="">Select</option>
									<option value="Fresher">Fresher</option>
									<option value="Experience">Experience</option>
								</select>
							</div>
						</div> 
					</div>
					<div class="row expDetails" style="display: none;">
						<div class="col-md-4">
							<div class="mb-3">
								<input type="hidden" class="form-control" name="experienceId" id="experienceId" value="">
								<label class="form-label">Previous Company Name <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="companyName" id="companyName" value="">
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label">Designation <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="previousDesignation" id="previousDesignation" value="">
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label">Start Date <span class="text-danger"> *</span></label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" name="startDate" id="startDate">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label">End Date <span class="text-danger"> *</span></label>
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" name="endDate" id="endDate">
									<span class="input-icon-addon">
										<i class="ti ti-calendar text-gray-7"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label class="form-label">Total Work Experience <span class="text-danger"> *</span></label>
								<input type="text" class="form-control" name="workExperience" id="workExperience" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Skills <small>(Optional)</small></label>
								<input type="text" class="form-control" name="skills" id="skills">
							</div>
						</div>
						<div class="col-md-12" id="editUploadFields"></div>
						<div class="col-md-12">
							<label for="">Upload Proof Document:</label>
							<input type="file" name="experienceDocument[]" class="form-control experienceDocument" accept=".pdf,image/*" />
						</div>
						<div class="col-md-12" id="uploadFields"></div>
						<div class="col-md-12">
							<button type="button" class="btn btn-link addMoreUploadFields">Add More Uploads</button>
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
<!-- /Add Experience -->

<!-- Add Employee Success -->
<div class="modal fade" id="success_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3"><i class="ti ti-check fs-24"></i></span>
					<h5 class="mb-2">Employee Update Successfully</h5>
					<p class="mb-3"><?php echo $employeeInfo ? $employeeInfo['OfficialName'] : ''; ?> : <span class="text-primary">#<?php echo $employeeInfo ? $employeeInfo['employeeId'] : ''; ?></span>
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
						<img src="./assets/img/laptop.jpg" alt="img" class="ig-fluid rounded-circle">
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
						<img src="./assets/img/laptop-01.jpg" alt="img" class="img-fluid rounded me-2">
						<img src="./assets/img/laptop-2.jpg" alt="img" class="img-fluid rounded me-2">
						<img src="./assets/img/laptop-3.jpg" alt="img" class="img-fluid rounded">
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
			<form action="#">
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
					<a href="#" class="btn btn-danger">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->
<!-- image crop model start -->
<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="cropImageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span> <b><i class="fa-solid fa-circle-exclamation"></i> Use the mouse scroll (or) adjust the range slider below.</b></span>
				<span></span>
			</div>
			<div class="modal-body">
				<div id="upload-demo"></div>
			</div>
			<form id="profileForm">
				<input type="hidden" id="employeeProfile" name="employeeProfile">
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" id="cropImageBtn" class="btn btn-primary">Crop</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- image crop model end -->

<!-- profile image preview modal start -->
<div class="modal fade" id="profilePopup">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<img src="" alt="Img" id="profilePopupImage">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Close</button>
				<button type="button" id="openFile2" class="btn btn-success" data-bs-dismiss="modal">Change Profile</button>
			</div>
		</div>
	</div>
</div>
<!-- profile image preview modal end -->

<!-- Modal for Preview -->
<div class="modal" tabindex="-1" id="documentPreviewModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Document Preview</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="previewContent"></div> <!-- Document preview will appear here -->
			</div>
		</div>
	</div>
</div>



<?php require_once("./includes/footer.php"); ?>
<script src="./js/employee-details.js"></script>
<script src="js/plugins/croppie.js"></script>