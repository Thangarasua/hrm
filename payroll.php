<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<?php
	$employeeId = $_SESSION['hrm_employeeId'];
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
				<div class="head-icons ms-2">
					<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
						<i class="ti ti-chevrons-up"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
         <div>
            Working In Progress
         </div>
    </div>
	<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
		<p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
		<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
	</div>
</div>
<!-- /Page Wrapper -->



<?php require_once("./includes/footer.php"); ?>