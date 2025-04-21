<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h2 class="mb-1">Leave Settings</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
                        <li class="breadcrumb-item active" aria-current="page">Leave Settings</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                <div class="mb-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#new_custom_policy" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Custom Policy</a>
                </div>
                <div class="head-icons ms-2">
                    <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                        <i class="ti ti-chevrons-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Leaves Info -->
        <div class="row" id="leavePolicy">
            <!-- dynamically policy contend append this div -->
        </div>
        <!-- /Leaves Info -->

    </div>
    <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
        <p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
        <p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
    </div>
</div>
<!-- /Page Wrapper -->

<!-- New Custom Policy -->
<div class="modal fade" id="new_custom_policy">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Custom Policy</h4>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form id="addLeavePolicy">
                <div class="modal-body pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Policy Name<span class="text-danger">*</span></label>
                                <input type="text" name="policyName" id="policyName" class="form-control" oninput="capitalizeWords(this)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">No of Days</label>
                                <input type="text" name="days" id="days" class="form-control" onkeypress="return isNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Leave Type<span class="text-danger">*</span></label> 
                                <select class="select" name="leaveType" id="leaveType">
									<option value="">Select</option>
									<option value="Paid">Paid</option>
									<option value="Unpaid">Unpaid</option>
								</select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="updateButton">Add Leave Policy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /New Custom Policy -->

<!-- Edit Custom Policy -->
<div class="modal fade" id="edit_custom_policy">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Custom Policy</h4>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form id="update">
                <div class="modal-body pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Policy Name<span class="text-danger">*</span></label>
                                <input type="text" name="policyName" id="updatePolicyName" class="form-control" oninput="capitalizeWords(this)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">No of Days</label>
                                <input type="text" name="days" id="updateDays" class="form-control" onkeypress="return isNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Leave Type<span class="text-danger">*</span></label> 
                                <select class="select" name="leaveType" id="updateLeaveType"> 
									<option value="Paid">Paid</option>
									<option value="Unpaid">Unpaid</option>
								</select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="updateDescription" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="rowId" id="rowId">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Leave Policy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Edit Custom Policy -->

<?php require_once("./includes/footer.php"); ?>

<!-- this page java scripts codes -->
<script src="./js/leave-settings.js"></script>