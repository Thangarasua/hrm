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

        <div class="card border-0">
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-md-5">
                        <div class="mb-3 mb-md-0">
                            <h4 class="mb-1">Attendance Details Today</h4>
                            <p>Data from the 800+ total no of employees</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex align-items-center justify-content-md-end">
                            <h6>Total Absenties today</h6>
                            <div class="avatar-list-stacked avatar-group-sm ms-4">
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg"
                                        alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-03.jpg"
                                        alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-05.jpg"
                                        alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-06.jpg"
                                        alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-07.jpg"
                                        alt="img">
                                </span>
                                <a class="avatar bg-primary avatar-rounded text-fixed-white fs-12"
                                    href="javascript:void(0);">
                                    +1
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border rounded">
                    <div class="row gx-0">
                        <div class="col-md col-sm-4 border-end">
                            <div class="p-3">
                                <span class="fw-medium mb-1 d-block">Present</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>250</h5>
                                    <span class="badge badge-success d-inline-flex align-items-center">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        +1%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md col-sm-4 border-end">
                            <div class="p-3">
                                <span class="fw-medium mb-1 d-block">Late Login</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>45</h5>
                                    <span class="badge badge-danger d-inline-flex align-items-center">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        -1%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md col-sm-4 border-end">
                            <div class="p-3">
                                <span class="fw-medium mb-1 d-block">Uninformed</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>15</h5>
                                    <span class="badge badge-danger d-inline-flex align-items-center">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        -12%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md col-sm-4 border-end">
                            <div class="p-3">
                                <span class="fw-medium mb-1 d-block">Permisson</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>03</h5>
                                    <span class="badge badge-success d-inline-flex align-items-center">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        +1%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md col-sm-4">
                            <div class="p-3">
                                <span class="fw-medium mb-1 d-block">Absent</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>12</h5>
                                    <span class="badge badge-danger d-inline-flex align-items-center">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        -19%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <h5>Admin Attendance</h5>
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
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            Department
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Application
                                    Development</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">IT Management</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown me-3">
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
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
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
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
                                <th>Emp ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Late</th>
                                <th>Overtime</th>
                                <th>Production Hours</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Wrapper -->
<?php require_once("./includes/footer.php"); ?>
<script src="./js/admin-attendance.js"></script>