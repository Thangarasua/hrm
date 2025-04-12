<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h2 class="mb-1">Job List</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class=""><a href="index"><i class="ti ti-smart-home"></i> Home </a></li> /
                        <li class="active" aria-current="page">Job openings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <div class="row">
            <?php
            $sql = "SELECT r.*, COUNT(jr.job_id) AS count FROM recruitment AS r LEFT JOIN job_referrals AS jr ON r.ticket_request_id = jr.job_id GROUP BY r.ticket_request_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card bg-light">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="me-2">
                                                <span class="avatar avatar-lg bg-gray"><img src="assets/img/icons/promotion.png" class="w-auto h-auto" alt="icon"></span></a>
                                            <div>
                                                <h6 class="fw-medium mb-1 text-truncate"><a href="#"><?php echo $row['job_position']; ?></a></h6>
                                                <p class="fs-12 text-gray fw-normal"><?php echo $row['count']; ?> Applications</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <p class="text-dark d-inline-flex align-items-center mb-2">
                                        <i class="fa-solid fa-location-dot text-gray-5 me-2"></i>
                                        <?php echo $row['location']; ?>
                                    </p>
                                    <p class="text-dark d-inline-flex align-items-center mb-2">
                                        <i class="fa-solid fa-indian-rupee-sign text-gray-5 me-2"></i>
                                        <?php echo $row['salary_range']; ?>
                                    </p>
                                    <p class="text-dark d-inline-flex align-items-center">
                                        <i class="fa-solid fa-briefcase text-gray-5 me-2"></i>
                                        <?php echo $row['job_experience']; ?>
                                    </p>
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                        <span class="badge badge-pink-transparent me-2"><?php echo $row['job_type']; ?></span>
                                        <span class="badge bg-secondary-transparent"><?php echo $row['job_level']; ?></span>
                                    </div>
                                    <div>
                                        <a href="#" data-id="<?php echo $row['id']; ?>" class="view"><i class="fa-solid fa-eye pointer me-2" data-bs-toggle="tooltip" data-bs-original-title="Job Details"></i></a>
                                        <a href="#" data-id="<?php echo $row['id']; ?>" class="send"><i class="fa-solid fa-paper-plane pointer" data-bs-toggle="tooltip" data-bs-original-title="Send Job Application"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  }
            } else {
            }
            ?>

        </div>
    </div>

    <!-- View Post -->
    <div class="modal fade" id="viewModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Recruitment Details</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form>
                    <div class="modal-body pb-0">
                        <div class="tab-content" id="">
                            <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job Title <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="view_jobTitle" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Salary Range <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="view_salaryRange" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Job Description <span class="text-danger"> *</span></label>
                                            <textarea rows="3" class="form-control" id="view_jobDescription" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Work Mode <span class="text-danger"> *</span></label>
                                            <select class="select" id="view_workMode" readonly>
                                                <option value="">Select</option>
                                                <option value="On Premises">On Premises</option>
                                                <option value="Work From Home">Work From Home</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Job Type <span class="text-danger"> *</span></label>
                                            <input type="text" id="view_jobType" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Job Level <span class="text-danger"> *</span></label>
                                            <input type="text" id="view_jobLevel" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Experience <span class="text-danger"> *</span></label>
                                            <input type="text" id="view_experience" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Qualification <span class="text-danger"> *</span></label>
                                            <input type="text" id="view_qual" class="form-control" readonly>
                                            <ul class="list-group addFields" id="qualificationResult"></ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Gender <span class="text-danger"> *</span></label>
                                            <select class="select" id="view_gender" readonly>
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Any">Any</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Required Skills</label>
                                            <input type="text" class="form-control" id="view_requiredSkills" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Notice period <span class="text-danger"> *</span></label>
                                            <select class="select" id="view_priority" readonly>
                                                <option value="">Select</option>
                                                <option value="Immediate">Immediate</option>
                                                <option value="15 Days">15 Days</option>
                                                <option value="01 Month">01 Month</option>
                                                <option value="45 Days">45 Days</option>
                                                <option value="02 Month">02 Month</option>
                                                <option value="No Limite">No Limite</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">No Of Opening <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="view_openings" placeholder="Number of openings" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Location</label>
                                            <input type="text" class="form-control" id="view_location" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /View Post -->
    <!-- Recruitment form send -->
    <div class="modal fade" id="sendModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Recruitment Form send</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form id="referralAdd">
                    <div class="modal-body pb-0">
                        <div class="tab-content" id="">
                            <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job ID</label>
                                            <input type="text" class="form-control" name="ticketRequestId" id="send_jobIt" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job Title</label>
                                            <input type="text" class="form-control" name="jobTitle" id="send_jobTitle" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <h4>Candidate Details</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Candidate Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="candidateName" id="candidateName" onkeypress="return isAlphabets(event)" oninput="capitalizeWords(this)" placeholder="Candidate Name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Candidate Mail <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="candidateMail" id="candidateMail" onblur="return isEmail(this)" placeholder="user@example.com" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Candidate Contact <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="candidateContact" id="candidateContact" onkeypress="return phoneNumber(event)" onpaste="numberPasteValidate(event, this)" placeholder="candidate mobile" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Referred By</label>
                                            <input type="text" class="form-control" value="<?php echo $employeeName; ?>" disabled>
                                            <input type="hidden" class="form-control" name="referred" id="referred" value="<?php echo $employeeId; ?>">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="raisedBy" id="send_raised_by">
                                <input type="hidden" class="form-control" name="jobSno" id="jobSno">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="sendButton" class="btn btn-primary">Submit <i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Recruitment form send -->

    <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
        <p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
        <p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
    </div>

</div>
<!-- /Page Wrapper -->

<?php require_once("./includes/footer.php"); ?>
<!-- this page java scripts codes -->
<script src="./js/recruitment.js"></script>
<script src="./js/job-openings.js"></script>