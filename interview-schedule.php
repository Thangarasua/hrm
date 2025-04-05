<?php require_once "./includes/config.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/Kolkata");

$encryptedID = $_GET['id'];
$encryptedMail = $_GET['mail'];
$id = base64_decode($encryptedID);
$email = base64_decode($encryptedMail);

$sql = "SELECT * FROM `recruitment` AS `r` INNER JOIN `candidates` AS `c` ON `r`.`ticket_request_id` = `c`.`ticket_request_id` WHERE `id` = '$id' AND `c`.`email` = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$data = $result->fetch_assoc();
	$status = $data['responce_status'];
	if ($status == 0) {
		$formDisplay = 'd-block';
		$thanksDivDisplay = 'd-none';
	} else {
		$formDisplay = 'd-none';
		$thanksDivDisplay = 'd-block';
	}
} else {
	echo "access denied.";
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Interview Form</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/plugins/bootstrap.min.css">
	<!-- page css -->
	<link rel="stylesheet" href="css/interview-schedule.css">
	<!-- Image crop-->
	<link rel="stylesheet" href="css/plugins/croppie.css">
	<!--toastr alert added-->
	<link rel="stylesheet" href="css/plugins/toastr.min.css">
	<!-- sweetalert2 alert added -->
	<script src="js/plugins/sweetalert2.js" type="text/javascript"></script>
</head>

<body>
	<div class="login-root">
		<div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
			<div class="loginbackground box-background--white padding-top--64">
				<div class="loginbackground-gridContainer">
					<div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
						<div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
						</div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
						<div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
						<div class="box-root box-background--blue800 animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
						<div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
						<div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
						<div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
						<div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
						<div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
						<div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
					</div>
				</div>
			</div>
			<div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">

				<div class="formbg-outer">
					<div class="formbg">
						<div class="formbg-inner padding-horizontal--48">
							<form id="interviewForm" class="<?php echo $formDisplay; ?>">
								<div class="row">
									<div class="col-sm">
									</div>
									<div class="col-sm vendor-heading">
										<h4 class="flex-flex flex-justifyContent--center company-title"><b><a href="https://actetechnologies.com" target="_blank" rel="dofollow">MARKERZ SOLUTION</a></b></h4>
										<h6 class="flex-flex flex-justifyContent--center form-title">INTERVIEW SCHEDULE FORM</h6>
									</div>
									<div class="col-sm">
									</div>
								</div>
								<br>
								<div class="accordion" id="accordionExample">
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingOne">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background: #f7ebda;">
												JOB DETAILS
											</button>
										</h2>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<div class="responsive">
													<div class="form-group">
														<label for="text">Job Title</label>
														<input type="text" class="form-control" value="<?php echo $data['job_position']; ?>" readonly>
													</div>
													<div class="form-group">
														<label for="text">Job Type</label>
														<input type="text" class="form-control" value="<?php echo $data['job_type']; ?>" readonly>
													</div>
													<div class="form-group">
														<label for="email">Job Level</label>
														<input type="email" class="form-control" value="<?php echo $data['job_level']; ?>" readonly>
													</div>
													<div class="form-group">
														<label for="text">Experience</label>
														<input type="text" class="form-control" value="<?php echo $data['job_experience']; ?>" readonly>
													</div>
												</div>
												<div class="responsive">
													<div class="form-group">
														<label for="text">Qualification</label>
														<input type="text" class="form-control" value="<?php echo $data['qualification']; ?>" readonly>
													</div>
													<div class="form-group">
														<label for="text">Gender</label>
														<input type="text" class="form-control" value="<?php echo $data['gender']; ?>" readonly>
													</div>
													<div class="form-group">
														<label for="text">Salary Range</label>
														<input type="text" class="form-control" value="<?php echo $data['salary_range']; ?>" readonly>
													</div>
													<div class="form-group">
														<label for="text">Location</label>
														<input type="text" class="form-control" value="<?php echo $data['location']; ?>" readonly>
													</div>
												</div>
												<div class="responsive">
													<div class="form-group">
														<label for="text">Required Skills</label>
														<textarea class="form-control" readonly><?php echo $data['required_skills']; ?></textarea>
													</div>
													<div class="form-group">
														<label for="text">Job Description</label>
														<textarea name="" id="" class="form-control" readonly><?php echo $data['job_descriptions']; ?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingTwo">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background: #f7ebda;">
												Candidate Details
											</button>
										</h2>
										<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<div class="row">
													<div class="col-md-3">
														<div class="row">
															<div class="col-sm">
																<label for="" class="text-center">profile <em class="mandatory">*</em></label>
																<div class="profile-images-card">
																	<label class="cabinet center-block">
																		<figure>
																			<img src="https://actecrm.com/hrm/assets/img/user.jpeg" class="gambar img-responsive img-thumbnail" id="cropedImage" />
																			<figcaption>Click to upload</figcaption>
																		</figure>
																		<input type="file" class="item-img file center-block" accept="image/*">
																		<input type="hidden" id="candidate_profile" name="candidate_profile">
																	</label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-9">
														<div class="responsive">
															<div class="form-group">
																<label for="text">Name <em class="mandatory">*</em><small>(if change)</small></label>
																<input type="text" class="form-control" id="name" name="name" placeholder="Candidate full name" value="<?php echo $data['candidate_name']; ?>" oninput="capitalizeWords(this)">
																<small id="name_error" class="error d-none"> "Please enter letters only".</small>
															</div>
															<div class="form-group">
																<label for="text">Email <em class="mandatory">*</em></label>
																<input type="email" class="form-control" id="email" name="email" placeholder="proper email" value="<?php echo $data['email']; ?>">
																<small id="email_error" class="error"></small>
															</div>
															<div class="form-group">
																<label for="text">phone <em class="mandatory">*</em></label>
																<input type="text" class="form-control" id="phone" name="phone" placeholder="valid mobile number" value="<?php echo $data['contact_number']; ?>">
																<small id="number_error" class="error d-none"></small>
															</div>
														</div>
														<div class="responsive">
															<div class="form-group">
																<label for="text">Qualification <em class="mandatory">*</em></label>
																<input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter your Highest Qualification" oninput="capitalizeWords(this)">
																<small id="qualification_error" class="error d-none"></small>
															</div>
															<div class="form-group">
																<label for="text">Overall experience <em class="mandatory">*</em></label>
																<span class="d-flex">
																	<input type="text" class="form-control totalEpx" id="totalExpYear" name="totalExpYear" placeholder="Year">
																	<input type="text" class="form-control totalEpx" id="totalExpMonth" name="totalExpMonth" placeholder="Month">
																</span>
																<small id='experienceError' class='error d-none'></small>
															</div>
															<div class="form-group">
																<label for="text">Resume <em class="mandatory">*</em> <small>(pdf only)</small> </label>
																<input type="file" class="form-control" id="resume" name="resume" placeholder="Select Recent resume PDF" accept="application/pdf" />
																<span id='' class='error'></span>
															</div>
														</div>
													</div>
												</div>
												<div class="responsive">
													<div class="form-group">
														<label for="text">Skills <em class="mandatory">*</em></label>
														<textarea class="form-control" rows="1" id="skills" name="skills" placeholder="eg: Data Analysis, Python" oninput="capitalizeWords(this)"></textarea>
														<span id='' class='error'></span>
													</div>
													<div class="form-group">
														<label for="text">Current Location <em class="mandatory">*</em></label>
														<input type="text" name="location" id="location" class="form-control" placeholder="eg:Area,district,state" oninput="capitalizeWords(this)">
													</div>
												</div>
												<div class="responsive">
													<div class="form-group">
														<label for="text">Availability time 1 <em class="mandatory">*</em></label>
														<div class="availability availabilityDate1">
															<input type="date" class="form-control" id="availabilityDate1" name="availabilityDate1" min=<?php echo date('Y-m-d'); ?>>
															<input type="time" class="form-control" id="availabilityTime1" name="availabilityTime1">
														</div>
														<span id='availabilityDateError' class='error'></span>
													</div>
													<div class="form-group">
														<label for="text">Availability time 2 <small>(opional)</small></label>
														<div class="availability">
															<input type="date" class="form-control" id="availabilityDate2" name="availabilityDate2" placeholder="Date" min=<?php echo date('Y-m-d'); ?>>
															<input type="time" class="form-control" id="availabilityTime2" name="availabilityTime2" placeholder="Time">
														</div>
														<span id='availabilityDate' class='error'></span>
													</div>
													<div class="form-group">
														<label for="text">Availability time 3 <small>(opional)</small></label>
														<div class="availability">
															<input type="date" class="form-control" id="availabilityDate3" name="availabilityDate3" min=<?php echo date('Y-m-d'); ?>>
															<input type="time" class="form-control" id="availabilityTime3" name="availabilityTime3">
														</div>
														<span id='availabilityDate' class='error'></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="headingThree">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background: #f7ebda;">
												Terms & Condition
											</button>
										</h2>
										<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<h6>1.Eligibility Criteria</h6>
												<p>Applicants must provide accurate and complete information.</p>
												<p>Any false information may lead to disqualification.</p>

												<h6>2.Document Submission</h6>
												<p>Candidates must upload all required documents (resume, ID proof, certificates, etc.).</p>
												<p>Incomplete applications will not be considered.</p>

												<h6>3.Selection Process</h6>
												<p>Shortlisted candidates will be contacted for further rounds.</p>
												<p>Selection is based on qualifications, experience, and interview performance.</p>

												<h6>4.Background Verification</h6>
												<p>The company reserves the right to verify the provided information.</p>
												<p>Any discrepancies may result in application rejection.</p>

												<h6>5.Confidentiality</h6>
												<p>Candidate details will be used solely for recruitment purposes.</p>
												<p>The company will not share personal information with third parties without consent.</p>

												<h6>6.Job Offer & Joining</h6>
												<p>An offer letter will be issued to selected candidates.</p>
												<p>The company reserves the right to withdraw the offer under special circumstances.</p>

												<h6>7.Company Policies</h6>
												<p>Selected candidates must adhere to company rules and regulations.</p>
												<p>Any misconduct may lead to termination of employment.</p>

												<h6>8.Equal Opportunity Employment</h6>
												<p>The company follows a fair recruitment policy without discrimination.</p>
												<p>Updates & Changes</p>

												The company may modify these terms at any time.
											</div>
										</div>
									</div>
								</div>
								<br>
								<input type="hidden" name="id" id="id" value="<?php echo $data['candidate_id']; ?>">
								<button type="submit" id="formSubmit" class="btn btn-primary">Submit </button>
							</form>
							<div class="thanksDiv <?php echo $thanksDivDisplay; ?>">
								<h1 class="thanksTitle">Thank you for your submission.👍</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- image crop model start -->
	<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="cropImageModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="cropImageModalLabel">Edit Photo</h4>
				</div>
				<div class="modal-body">
					<div id="upload-demo"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
				</div>
			</div>
		</div>
	</div>
	<!-- image crop model end -->

	<script src="js/plugins/jquery.min.js" type="text/javascript"></script>
	<!-- Bootstrap Core JS -->
	<script src="js/plugins/bootstrap.bundle.min.js"></script>
	<!-- crop script added -->
	<script src="js/plugins/croppie.js"></script>
	<!-- toastr alert added -->
	<script src="js/plugins/toastr.min.js" type="text/javascript"></script> 

	<script>
		/*-----Fist letter auto caps function----*/
		function capitalizeWords(input) {
			input.value = input.value.replace(/\b\w/g, function(char) {
				return char.toUpperCase();
			});
		}

		$(document).ready(function() {

			/*----------------- Start upload preview image with crop -----------------*/
			var $uploadCrop,
				tempFilename,
				rawImg,
				imageId;

			function readFile(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.upload-demo').addClass('ready');
						$('#cropImagePop').modal('show');
						$('.item-img').val('');
						rawImg = e.target.result;
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					swal("Sorry - Image formate dosn't accepted.");
				}
			}

			$uploadCrop = $('#upload-demo').croppie({
				viewport: {
					width: 150,
					height: 200,
				},
				enforceBoundary: false,
				enableExif: true
			});
			$('#cropImagePop').on('shown.bs.modal', function() {
				$uploadCrop.croppie('bind', {
					url: rawImg
				}).then(function() {
					console.log('jQuery bind complete');
				});
			});
			$('.item-img').on('change', function() {
				imageId = $(this).data('id');
				tempFilename = $(this).val();
				$('#cancelCropBtn').data('id', imageId);
				readFile(this);
			});
			$('#cropImageBtn').on('click', function(ev) {
				$uploadCrop.croppie('result', {
					type: 'base64',
					format: 'jpeg', // set image formate by manually
					size: {
						width: 600, // Increase this for better quality
						height: 800 // Increase this for better quality
					},
					quality: 1 // 0 to 1; 1 is the highest quality with less compression
				}).then(function(resp) {
					$('#cropedImage').attr('src', resp);
					$('#candidate_profile').val(resp);
					$('#cropImagePop').modal('hide');
				});
			});
			/*----------------- End upload preview image -----------------*/

			$("#name").on("input", function() {
				let value = $(this).val();

				if (!/^[a-zA-Z\s]*$/.test(value)) {
					toastr.warning("Only alphabets and spaces are allowed!");
					$("#name_error").removeClass('d-none');
					$(this).val(value.replace(/[^a-zA-Z\s]/g, '')); // Remove non-alphabetic characters
				} else {
					$("#name_error").addClass('d-none');
				}
			});
			$("#phone").on("input", function() {
				const value = $(this).val();
				if (!/^\d*$/.test(value)) {
					toastr.warning("Only numbers are allowed!");
					$("#number_error").removeClass('d-none');
					$("#number_error").html('Please enter numbers only, e.g., 123..');
					$(this).val(value.replace(/\D/g, ''));
					$(this).focus();
				} else if (value.length > 10) {
					toastr.warning("Maximum 10 digits allowed!");
					$("#number_error").removeClass('d-none');
					$("#number_error").html('Maximum 10 digits allowed');
					$(this).val(value.substring(0, 10));
				} else {
					$("#number_error").addClass('d-none');
				}
			});
			$("#qualification").on("input", function() {
				const value = $(this).val();

				// Allow only alphabets (a-z, A-Z), dots (.), and apostrophes (')
				if (!/^[a-zA-Z.'\s]+$/.test(value)) {
					toastr.warning("Only alphabets, dots, and apostrophes are allowed!");
					$("#qualification_error").removeClass('d-none');
					$("#qualification_error").html("Please enter alphabets only, e.g., B.Sc, M.A, Bachelor's..");
					$(this).val(value.replace(/[^a-zA-Z.'\s]/g, ''));
				} else {
					$("#qualification_error").addClass('d-none');
				}
			});
			$(".totalEpx").on("input", function() {
				const value = $(this).val();
				if (!/^\d*$/.test(value)) {
					toastr.warning("Only numbers are allowed!");
					$("#experienceError").removeClass('d-none');
					$("#experienceError").html('Please enter numbers only, e.g., "03"');
					$(this).val(value.replace(/\D/g, ''));
					$(this).focus();
				} else if (value.length > 2) {
					toastr.warning("Maximum 2 digits allowed!");
					$("#experienceError").removeClass('d-none');
					$("#experienceError").html('Maximum 2 digits allowed');
					$(this).val(value.substring(0, 2));
				} else {
					$("#experienceError").addClass('d-none');
				}
			});
			$("#totalExpMonth").on("input", function() {
				const value = $(this).val();
				if (!/^\d*$/.test(value)) {
					toastr.warning("Only numbers are allowed!");
					$("#experienceError").html('Please enter numbers only, e.g., "03"');
					$(this).val(value.replace(/\D/g, ''));
					$(this).focus();
				} else if (value.length > 2) {
					toastr.warning("Maximum 11 months allowed!");
					$("#experienceError").removeClass('d-none');
					$("#experienceError").html('Maximum 2 digits allowed');
					$(this).val(value.substring(0, 2));
				} else if (value > 11) {
					toastr.warning("Maximum 11 months allowed!");
					$("#experienceError").removeClass('d-none');
					$("#experienceError").html('Maximum 11 months allowed');
					$(this).val(value.slice(0, -1));
				} else {
					$("#experienceError").addClass('d-none');
				}
			});
			$("#resume").on("change", function() {
				let file = this.files[0];
				if (file) {
					let fileType = file.name.split('.').pop().toLowerCase();
					if (fileType !== "pdf") {
						$(this).val(""); // Clear the file input
						toastr.error("Only PDF files are allowed.");
					}
				}
			});
			$("input[type='time']").change(function() {
				let minTime = "09:00";
				let maxTime = "18:00";
				let selectedTime = this.value;

				if (selectedTime < minTime || selectedTime > maxTime) {
					toastr.warning("Please select a time between 09:00 AM and 06:00 PM.");
					this.value = ""; // Clear invalid time
				}
			})
			$("#interviewForm").click(function() {
				$(".error").addClass('d-none');
			});
			$("#interviewForm").on("submit", function(e) {
				e.preventDefault();
				var response = validateForm();
				if (response == 0) {
					return;
				}
				let formData = new FormData(this);
				formData.append("flag", "interviewForm");
				$.ajax({
					type: "POST",
					url: "queries/interview-schedule.php",
					data: formData,
					dataType: "json",
					contentType: false,
					cache: false,
					processData: false,
					beforeSend: function() {
						$("#formSubmit").attr("disabled", "disabled");
						$("#formSubmit").css("opacity", ".5");
					},
					success: function(response) {
						if (response.status == 'success') {
							Swal.fire({
								title: "Success!",
								text: "Your form has been submitted!",
								icon: "success",
								confirmButtonText: "OK"
							}).then((result) => {
								if (result.isConfirmed) {
									location.reload();
								}
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: response.error
							});
							// Enable the submit button and restore opacity
							$("#formSubmit").removeAttr("disabled");
							$("#formSubmit").css("opacity", "1");
						}
					},
				});
			});

			function validateForm() {
				$(".error").remove(); // Remove previous error messages

				let candidate_profile = $("#candidate_profile").val().trim();
				if (candidate_profile.length == 0) {
					toastr.warning("Kindly Upload Your Profile Picture.");
					return 0;
				}
				let name = $("#name").val().trim();
				if (name.length == 0) {
					$("#name").focus();
					$("#name").after(
						"<small class='error text-danger'>mandatory field.</small>"
					);
					toastr.warning("Kindly Upload Your Profile Picture.");
					return 0;
				}
				let email = $("#email").val().trim();
				if (email.length == 0) {
					$("#email").focus();
					$("#email").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					toastr.warning("Kindly fill your email.");
					return 0;
				}
				var filter = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
				if (!filter.test(email)) {
					toastr["warning"]("Please enter a valid email!");
					$("#email").focus();
					$("#email").after(
						"<small class='error text-danger'>Please enter a valid email!.</small>"
					);
					toastr.warning("Kindly fill your proper email.");
					return 0;
				}
				let phone = $("#phone").val().trim();
				if (phone.length == 0) {
					$("#phone").focus();
					$("#phone").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					toastr.warning("Kindly fill your cantact number");
					return 0;
				}
				let qualification = $("#qualification").val().trim();
				if (qualification.length == 0) {
					$("#qualification").focus();
					$("#qualification").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					toastr.warning("Kindly fill your education qualification.");
					return 0;
				}
				let totalExpYear = $("#totalExpYear").val().trim();
				if (totalExpYear.length == 0) {
					$("#totalExpYear").focus();
					$("#experienceError").html('mandatory field.');
					toastr.warning("Kindly fill your experience year; if not, enter 0.");
					return 0;
				}
				let totalExpMonth = $("#totalExpMonth").val().trim();
				if (totalExpMonth.length == 0) {
					$("#totalExpMonth").focus();
					$("#experienceError").html('mandatory field.');
					toastr.warning("Kindly fill your experience month; if not, enter 0.");
					return 0;
				}
				let resume = $("#resume").val().trim();
				if (resume.length == 0) {
					$("#resume").focus();
					$("#resume").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					toastr.warning("Kindly Upload Your resume pdf.");
					return 0;
				}
				let skills = $("#skills").val().trim();
				if (skills.length == 0) {
					$("#skills").focus();
					$("#skills").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					toastr.warning("Kindly fill your skills.");
					return 0;
				}
				let location = $("#location").val().trim();
				if (location.length == 0) {
					$("#location").focus();
					$("#location").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					toastr.warning("Kindly enter your current location.");
					return 0;
				}
				let availabilityDate1 = $("#availabilityDate1").val().trim();
				if (availabilityDate1.length == 0) {
					$(".availabilityDate1").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					$("#availabilityDate1").focus();
					toastr.warning("Kindly fill the available date.");
					return 0;
				}
				let availabilityTime1 = $("#availabilityTime1").val().trim();
				if (availabilityTime1.length == 0) {
					$(".availabilityDate1").after(
						"<small class='error text-danger'> mandatory field.</small>"
					);
					$("#availabilityTime1").focus();
					toastr.warning("Kindly fill the available timing.");
					return 0;
				}
			}
		});
	</script>
</body>

</html>