<?php
include("./includes/config.php");

if (isset($_SESSION['hrm_employeeId'])) {
	header('Location: index');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Markerz | HRM Software</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Markerz Global Solutions offers advanced Human Resource Management (HRM) software for efficient employee management, payroll, attendance tracking, and performance evaluation.">
	<meta name="keywords" content="HRM software, human resource management, employee management, payroll system, attendance tracking, recruitment software, performance evaluation, admin panel, business automation, workforce management">
	<meta name="author" content="Markerz Global Solutions - HRM Software Experts">
	<meta name="robots" content="index, follow">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/plugins/bootstrap.min.css">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="plugins/icons/feather/feather.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="plugins/tabler-icons/tabler-icons.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="css/plugins/style.css">

	<!--toastr alert added-->
	<link rel="stylesheet" href="css/plugins/toastr.min.css">

</head>

<body class="bg-white">

	<div id="global-loader" style="display: none;">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<div class="container-fuild">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
				<div class="row">
					<div class="col-lg-5">
						<div class="login-background position-relative d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100">
							<div class="authentication-card w-100">
								<div class="authen-overlay-item border w-100">
									<h1 class="text-white display-1">Empowering people <br> through seamless HR <br> management.</h1>
									<div class="my-4 mx-auto authen-overlay-img">
										<img src="assets/img/bg/login.png" alt="Img">
									</div>
									<div>
										<p class="text-white fs-20 fw-semibold text-center">Efficiently manage your workforce, streamline <br> operations effortlessly.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-12 col-sm-12">
						<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap">
							<div class="col-md-7 mx-auto vh-100">
								<form id="login" class="vh-100">
									<div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
										<div class=" mx-auto mb-3 text-center">
											<!-- <img src="assets/img/logo.svg" class="img-fluid" alt="Logo"> -->
											<img src="assets/img/bg/markerz-logo.png" class="img-fluid" alt="Logo">
										</div>
										<div class="">
											<div class="text-center mb-3">
												<h2 class="mb-2">Sign In</h2>
												<p class="mb-0">Please enter your details to sign in</p>
											</div>
											<div class="mb-3">
												<label class="form-label">User Name</label>
												<div class="input-group">
													<input type="text" name="username" class="form-control border-end-0">
													<span class="input-group-text border-start-0">
														<i class="ti ti-mail"></i>
													</span>
												</div>
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<div class="pass-group">
													<input type="password" name="password" class="pass-input form-control">
													<span class="ti toggle-password ti-eye-off"></span>
												</div>
											</div>
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<div class="form-check form-check-md mb-0">
														<input class="form-check-input" id="remember_me" type="checkbox">
														<label for="remember_me" class="form-check-label mt-0">Remember Me</label>
													</div>
												</div>
												<div class="text-end">
													<a href="#" class="link-danger">Forgot Password?</a>
												</div>
											</div>
											<div class="mb-3">
												<button type="submit" class="btn btn-primary w-100">Sign In</button>
											</div>
										</div>
										<div class="mt-5 pb-4 text-center">
											<p class="mb-0 text-gray-9">Copyright &copy; 2025 - Markerz</p>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="js/plugins/jquery.min.js" type="text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="js/plugins/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="js/plugins/feather.min.js"></script>

	<!-- Custom JS -->
	<script src="js/plugins/script.js"></script>

	<script src="js/plugins/rocket-loader.min.js" data-cf-settings="68bc30b0ce4e888e5ae80754-|49" defer></script>

	<!-- toastr alert added -->
	<script src="js/plugins/toastr.min.js" type="text/javascript"></script>

</body>
<script>
	//creat profile
	$(document).ready(function() {
		// Submit form data via Ajax
		$("#login").on("submit", function(e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "queries/login.php",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				success: function(response) {
					if (response.status == "success") {
						location.reload();
					} else {
						toastr.error(response.message, "Error");
					}
				},
			});
		});
	});
</script>

</html>