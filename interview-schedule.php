<?php require_once "./includes/config.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/Kolkata");

// $encryptedID = $_GET['id'];
// $id = base64_decode($encryptedID);

$sql = "SELECT * FROM `recruitment` WHERE `id` = 31";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/plugins/bootstrap.min.css">
	<link rel="stylesheet" href="css/interview-schedule.css">

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

							<div class="row">
								<div class="col-sm">
								</div>
								<div class="col-sm vendor-heading">
									<h4 class="flex-flex flex-justifyContent--center company-title"><b><a href="https://actetechnologies.com" target="_blank" rel="dofollow">MARKERZ SOLUTION</a></b></h4>
									<h6 class="flex-flex flex-justifyContent--center form-title">INTERVIEW SCHEDULE FORM</h6>
								</div>
								<div class="col-sm">
									<div class="profile-images-card">
										<label class="cabinet center-block">
											<figure>
												<img src="https://actecrm.com/img/no-image.png" class="gambar img-responsive img-thumbnail" id="cropedImage" />
												<figcaption>Click to upload</figcaption>
											</figure>
											<input type="file" class="item-img file center-block" />
											<input type="hidden" id="vendor_profile" name="vendor_profile">
										</label>
									</div>
								</div>
							</div>
							<br>
							<fieldset class="">
								<legend class="float-none">Job details</legend>

								<div class="responsive">
									<div class="form-group">
										<label for="text">Job Title</label>
										<input type="text" class="form-control" value="<?php echo $data['job_position']?>" readonly>
									</div>
									<div class="form-group">
										<label for="text">Job Type</label>
										<input type="text" class="form-control" value="<?php echo $data['job_type']?>" readonly>
									</div>
									<div class="form-group">
										<label for="email">Job Level</label>
										<input type="email" class="form-control" value="<?php echo $data['job_level']?>" readonly>
									</div>
									<div class="form-group">
										<label for="text">Experience</label>
										<input type="text" class="form-control" value="<?php echo $data['job_experience']?>" readonly>
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
										<label for="text">Required Skills</label>
										<input type="text" class="form-control" value="<?php echo $data['required_skills']; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="text">Location</label>
										<input type="text" class="form-control" value="<?php echo $data['location']; ?>" readonly>
									</div>
								</div>
								<div class="responsive">
									<div class="form-group">
										<label for="text">Job Description</label>
										<input type="text" class="form-control" value="<?php echo $data['job_descriptions']; ?>" readonly>
									</div>
								</div>
								<br>
							</fieldset>

							<br>
							<fieldset class="">
								<legend class="float-none">Candidate Details</legend>
								<div class="responsive">
									<div class="form-group">
										<label for="text">Name<em class="mandatory">*</em><small class="lowercase text-danger">(change if other)</small></label>
										<div class="input-group">
											<input type="text" class="form-control" id="whatsappno" name="whatsappno" value="" placeholder="Whatsapp No">
											<span id="whatsappnoError" class="error"></span>
										</div>
									</div>
									<div class="form-group">
										<label for="text">Email<em class="mandatory">*</em></label>
										<input type="email" class="form-control course" id="course" name="course">
										<span id='' class='error'></span>
									</div>
									<div class="form-group">
										<label for="text">phone<em class="mandatory">*</em></label>
										<input type="text" class="form-control course" id="course" name="course">
										<span id='' class='error'></span>
									</div>
									<div class="form-group">
										<label for="text">Overall experience<em class="mandatory">*</em></label>
										<span class="d-flex">
											<input type="text" class="form-control totalEpx" id="totalExpYear" name="totalExpYear" placeholder="Year">
											<input type="text" class="form-control totalEpx" id="totalExpMonth" name="totalExpMonth" placeholder="Month">
										</span>
										<span id='totalEpxError' class='error'></span>
									</div>
								</div>
								<div class="responsive">
									<div class="form-group">
										<label for="text">Availability time 1<em class="mandatory">*</em></label>
										<div class="availability">
											<input type="date" class="form-control domainEpx" id="domainExpYear" name="domainExpYear" placeholder="Year">
											<input type="time" class="form-control domainEpx" id="domainExpMonth" name="domainExpMonth" placeholder="Month">
										</div>
										<span id='domainEpxError' class='error'></span>
									</div>
									<div class="form-group">
										<label for="text">Availability time 2<em class="mandatory">*</em></label>
										<div class="availability">
											<input type="date" class="form-control domainEpx" id="domainExpYear" name="domainExpYear" placeholder="Year">
											<input type="time" class="form-control domainEpx" id="domainExpMonth" name="domainExpMonth" placeholder="Month">
										</div>
										<span id='domainEpxError' class='error'></span>
									</div>
									<div class="form-group">
										<label for="text">Availability time 3<em class="mandatory">*</em></label>
										<div class="availability">
											<input type="date" class="form-control domainEpx" id="domainExpYear" name="domainExpYear" placeholder="Year">
											<input type="time" class="form-control domainEpx" id="domainExpMonth" name="domainExpMonth" placeholder="Month">
										</div>
										<span id='domainEpxError' class='error'></span>
									</div>
								</div>

								<div class="responsive">
									<div class="form-group">
										<label for="text">Skills<em class="mandatory">*</em></label>
										<input type="text" class="form-control" id="skills" name="skills" placeholder="eg: Data Analysis, Python">
										<span id='' class='error'></span>
									</div>
									<div class="form-group">
										<label for="text">Location<em class="mandatory">*</em></label>
										<input type="text" name="location" id="location" class="form-control" placeholder="eg:Area,district,state" />
									</div>
								</div>
							</fieldset>

							<br>
							<div class="terms">
								<a href="#" data-toggle="modal" data-target="#termModel"><i class="fa fa-hand-o-right text-danger" aria-hidden="true"></i>Please read the Terms and Conditions and select the checkbox to proceed (Click to open).</a>
							</div>
							<br>
							<input type="hidden" name="type" id="type" value="">
							<input type="hidden" name="id" id="id" value="">
							<button type="submit" id="formSubmit" class="btn btn-primary">Submit</button>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>

</html>