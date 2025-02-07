<?php require_once("./includes/header.php"); ?>
<?php require_once("./includes/sidebar.php"); ?>

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Dashboard</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Superadmin
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<div class="input-icon mb-2 position-relative">
							<span class="input-icon-addon">
								<i class="ti ti-calendar text-gray-9"></i>
							</span>
							<input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<!-- Welcome Wrap -->
				<div class="welcome-wrap mb-4">
					<div class=" d-flex align-items-center justify-content-between flex-wrap">
						<div class="mb-3">
							<h2 class="mb-1 text-white">Welcome Back, Adrian</h2>
							<p class="text-light">14 New Companies Subscribed Today !!!</p>
						</div>
						<div class="d-flex align-items-center flex-wrap mb-1">
							<a href="https://smarthr.dreamstechnologies.com/html/template/companies.html" class="btn btn-dark btn-md me-2 mb-2">Companies</a>
							<a href="https://smarthr.dreamstechnologies.com/html/template/packages.html" class="btn btn-light btn-md mb-2">All Packages</a>
						</div>
					</div>
					<div class="welcome-bg">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/bg/welcome-bg-02.svg" alt="img" class="welcome-bg-01">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/bg/welcome-bg-03.svg" alt="img" class="welcome-bg-02">
						<img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/bg/welcome-bg-01.svg" alt="img" class="welcome-bg-03">
					</div>
				</div>	
				<!-- /Welcome Wrap -->

				<div class="row">

					<!-- Total Companies -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md bg-dark mb-3">
										<i class="ti ti-building fs-16"></i>
									</span>
									<span class="badge bg-success fw-normal mb-3">
										+19.01%
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1">5468</h2>
										<p class="fs-13">Total Companies</p>
									</div>
									<div class="company-bar1">5,10,7,5,10,7,5</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Total Companies -->

					<!-- Active Companies -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md bg-dark mb-3">
										<i class="ti ti-carousel-vertical fs-16"></i>
									</span>
									<span class="badge bg-danger fw-normal mb-3">
										-12%
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1">4598</h2>
										<p class="fs-13">Active Companies</p>
									</div>
									<div class="company-bar2">5,3,7,6,3,10,5</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Active Companies -->

					<!-- Total Subscribers -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md bg-dark mb-3">
										<i class="ti ti-chalkboard-off fs-16"></i>
									</span>
									<span class="badge bg-success fw-normal mb-3">
										+6%
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1">3698</h2>
										<p class="fs-13">Total Subscribers</p>
									</div>
									<div class="company-bar3">8,10,10,8,8,10,8</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Total Subscribers -->

					<!-- Total Earnings -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md bg-dark mb-3">
										<i class="ti ti-businessplan fs-16"></i>
									</span>
									<span class="badge bg-danger fw-normal mb-3">
										-16%
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1">$89,878,58</h2>
										<p class="fs-13">Total Earnings</p>
									</div>
									<div class="company-bar4">5,10,7,5,10,7,5</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Total Earnings -->

				</div>

				<div class="row">

					<!-- Companies -->
					<div class="col-xxl-3 col-lg-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Companies</h5>								
								<div class="dropdown mb-2">
									<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>This Week
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div id="company-chart"></div>
								<p class="f-13 d-inline-flex align-items-center"><span class="badge badge-success me-1">+6%</span> 5 Companies  from last month</p>
							</div>
						</div>
					</div>
					<!-- /Companies -->
					
					<!-- Revenue -->
					<div class="col-lg-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Revenue</h5>								
								<div class="dropdown mb-2">
									<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>2025
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">2025</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body pb-0">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<div class="mb-1">
                                        <h5 class="mb-1">$45787</h5>
                                        <p><span class="text-success fw-bold">+40%</span> increased from last year</p>
									</div>
                                    <p class="fs-13 text-gray-9 d-flex align-items-center mb-1"><i class="ti ti-circle-filled me-1 fs-6 text-primary"></i>Revenue</p>
								</div>
								<div id="revenue-income"></div>
							</div>
						</div>
					</div>
					<!-- /Revenue -->

					<!-- Top Plans -->
					<div class="col-xxl-3 col-xl-12 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Top Plans</h5>							
								<div class="dropdown mb-2">
									<a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
										<i class="ti ti-calendar me-1"></i>This Month
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div id="plan-overview"></div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<p class="f-13 mb-0"><i class="ti ti-circle-filled text-primary me-1"></i>Basic </p>
									<p class="f-13 fw-medium text-gray-9">60%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<p class="f-13 mb-0"><i class="ti ti-circle-filled text-warning me-1"></i>Premium</p>
									<p class="f-13 fw-medium text-gray-9">20%</p>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-0">
									<p class="f-13 mb-0"><i class="ti ti-circle-filled text-info me-1"></i>Enterprise</p>
									<p class="f-13 fw-medium text-gray-9">20%</p>
								</div>
							</div>
						</div>
					</div>
					<!-- /Top Plans -->

				</div>

				<div class="row">

					<!-- Recent Transactions -->
					<div class="col-xxl-4 col-xl-12 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recent Transactions</h5>
								<a href="https://smarthr.dreamstechnologies.com/html/template/purchase-transaction.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                         
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-02.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Stellar Dynamics</a></h6>
                                            <p class="fs-13 d-inline-flex align-items-center"><span class="text-info">#12457</span><i class="ti ti-circle-filled fs-4 text-primary mx-1"></i>14 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <h6 class="mb-1">+$245</h6>
                                        <p class="fs-13">Basic (Monthly)</p>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                           
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-03.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Quantum Nexus</a></h6>
                                            <p class="fs-13 d-inline-flex align-items-center"><span class="text-info">#65974</span><i class="ti ti-circle-filled fs-4 text-primary mx-1"></i>14 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <h6 class="mb-1">+$395</h6>
                                        <p class="fs-13">Enterprise (Yearly)</p>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                           
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-05.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Aurora Technologies</a></h6>
                                            <p class="fs-13 d-inline-flex align-items-center"><span class="text-info">#22457</span><i class="ti ti-circle-filled fs-4 text-primary mx-1"></i>14 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <h6 class="mb-1">+$145</h6>
                                        <p class="fs-13">Advanced (Monthly)</p>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                        
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-07.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">TerraFusion Energy</a></h6>
                                            <p class="fs-13 d-inline-flex align-items-center"><span class="text-info">#43412</span><i class="ti ti-circle-filled fs-4 text-primary mx-1"></i>14 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <h6 class="mb-1">+$145</h6>
                                        <p class="fs-13">Enterprise (Monthly)</p>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-1">
                                    <div class="d-flex align-items-center mb-2">                                           
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-08.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Epicurean Delights</a></h6>
                                            <p class="fs-13 d-inline-flex align-items-center"><span class="text-info">#43567</span><i class="ti ti-circle-filled fs-4 text-primary mx-1"></i>14 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <h6 class="mb-1">+$977</h6>
                                        <p class="fs-13">Premium (Yearly)</p>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Recent Transactions -->

					<!-- Recently Registered -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recently Registered</h5>
								<a href="https://smarthr.dreamstechnologies.com/html/template/purchase-transaction.html" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                            
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-11.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Pitch</a></h6>
                                            <p class="fs-13">Basic (Monthly)</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <p class="fs-13 mb-1">150 Users</p>
                                        <h6 class="fs-13 fw-normal">pitch.example.com</h6>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                                   
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-12.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Initech</a></h6>
                                            <p class="fs-13">Enterprise (Yearly)</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <p class="fs-13 mb-1">200 Users</p>
                                        <h6 class="fs-13 fw-normal">initech.example.com</h6>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                                
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-13.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Umbrella Corp</a></h6>
                                            <p class="fs-13">Advanced (Monthly)</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <p class="fs-13 mb-1">129 Users</p>
                                        <h6 class="fs-13 fw-normal">umbcorp.example.com</h6>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                                   
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-14.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Capital Partners</a></h6>
                                            <p class="fs-13">Enterprise (Monthly)</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <p class="fs-13 mb-1">103 Users</p>
                                        <h6 class="fs-13 fw-normal">capitalpart.example.com</h6>
                                    </div>
                                </div>
								<div class="d-sm-flex justify-content-between flex-wrap mb-1">
                                    <div class="d-flex align-items-center mb-2">                                                    
                                        <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                            <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-15.svg" class="img-fluid w-auto h-auto" alt="img">
                                        </a>
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Massive Dynamic</a></h6>
                                            <p class="fs-13">Premium (Yearly)</p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <p class="fs-13 mb-1">108 Users</p>
                                        <h6 class="fs-13 fw-normal">msdynamic.example.com</h6>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Recent Registered -->

					<!-- Recent Plan Expired -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recent Plan Expired</h5>
								<div class="dropdown mb-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white border btn-sm d-inline-flex align-items-center fs-13" data-bs-toggle="dropdown">
                                        Expired
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end p-3">
                                        <ul class="nav d-block">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-block rounded-1" data-bs-toggle="tab" data-bs-target="#expired">Expired</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-block rounded-1" data-bs-toggle="tab" data-bs-target="#request">Request</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>	      
							</div>
							<div class="card-body pb-2">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="expired">
                                        <div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                            <div class="d-flex align-items-center mb-2">                                            
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-16.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Silicon Corp</a></h6>
                                                    <p class="fs-13">Expired : 10 Apr 2025</p>
                                                </div>
                                            </div>
                                            <div class="text-sm-end mb-2">
                                                <a href="javascript:void(0);" class="link-info text-decoration-underline d-block mb-1">Send Reminder</a>
                                                <p class="fs-13">Basic (Monthly)</p>
                                            </div>
                                        </div>
                                        <div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                            <div class="d-flex align-items-center mb-2">                                        
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-14.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Hubspot</a></h6>
                                                    <p class="fs-13">Expired : 12 Jun 2025</p>
                                                </div>
                                            </div>
                                            <div class="text-sm-end mb-2">
                                                <a href="javascript:void(0);" class="link-info text-decoration-underline d-block mb-1">Send Reminder</a>
                                                <p class="fs-13">Enterprise (Yearly)</p>
                                            </div>
                                        </div>
                                        <div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                            <div class="d-flex align-items-center mb-2">                                      
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-18.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Licon Industries</a></h6>
                                                    <p class="fs-13">Expired : 16 Jun 2025</p>
                                                </div>
                                            </div>
                                            <div class="text-sm-end mb-2">
                                                <a href="javascript:void(0);" class="link-info text-decoration-underline d-block mb-1">Send Reminder</a>
                                                <p class="fs-13">Advanced (Monthly)</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap mb-3">
                                            <div class="d-flex align-items-center mb-2">                                     
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-07.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">TerraFusion Energy</a></h6>
                                                    <p class="fs-13">Expired : 12 May 2025</p>
                                                </div>
                                            </div>
                                            <div class="text-sm-end mb-2">
                                                <a href="javascript:void(0);" class="link-info text-decoration-underline d-block mb-1">Send Reminder</a>
                                                <p class="fs-13">Enterprise (Monthly)</p>
                                            </div>
                                        </div>
                                        <div class="d-sm-flex justify-content-between flex-wrap mb-1">
                                            <div class="d-flex align-items-center mb-2">                                       
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-08.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Epicurean Delights</a></h6>
                                                    <p class="fs-13">Expired : 15 May 2025</p>
                                                </div>
                                            </div>
                                            <div class="text-sm-end mb-2">
                                                <a href="javascript:void(0);" class="link-info text-decoration-underline d-block mb-1">Send Reminder</a>
                                                <p class="fs-13">Premium (Yearly)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="request">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center overflow-hidden">                                            
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-16.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill overflow-hidden">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Silicon Corp</a></h6>
                                                    <p class="fs-13 text-info text-truncate">silicon.example.com</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="link-success text-decoration-underline fs-13 fw-medium me-3">Approve</a>
                                                <a href="javascript:void(0);" class="link-danger text-decoration-underline fs-13 fw-medium">Reject</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center overflow-hidden">                                            
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-14.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill overflow-hidden">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Hubspot</a></h6>
                                                    <p class="fs-13 text-info text-truncate">hubspot.example.com</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="link-success text-decoration-underline fs-13 fw-medium me-3">Approve</a>
                                                <a href="javascript:void(0);" class="link-danger text-decoration-underline fs-13 fw-medium">Reject</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center overflow-hidden">                                            
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/icons/company-icon-18.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill overflow-hidden">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Licon Industries</a></h6>
                                                    <p class="fs-13 text-info text-truncate">licon.example.com</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="link-success text-decoration-underline fs-13 fw-medium me-3">Approve</a>
                                                <a href="javascript:void(0);" class="link-danger text-decoration-underline fs-13 fw-medium">Reject</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center overflow-hidden">                                            
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-07.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill overflow-hidden">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">TerraFusion Energy</a></h6>
                                                    <p class="fs-13 text-info text-truncate">fusion.example.com</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="link-success text-decoration-underline fs-13 fw-medium me-3">Approve</a>
                                                <a href="javascript:void(0);" class="link-danger text-decoration-underline fs-13 fw-medium">Reject</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-0">
                                            <div class="d-flex align-items-center overflow-hidden">                                            
                                                <a href="javscript:void(0);" class="avatar avatar-md bg-gray-100 rounded-circle flex-shrink-0">
                                                    <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/company/company-08.svg" class="img-fluid w-auto h-auto" alt="img">
                                                </a>
                                                <div class="ms-2 flex-fill overflow-hidden">
                                                    <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);">Epicurean Delights</a></h6>
                                                    <p class="fs-13 text-info text-truncate">epicuran.example.com</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="link-success text-decoration-underline fs-13 fw-medium me-3">Approve</a>
                                                <a href="javascript:void(0);" class="link-danger text-decoration-underline fs-13 fw-medium">Reject</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Recent Plan Expired -->

				</div>

			</div>

			<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
		<p class="mb-0">2024 - 2025 &copy; MARKERZ.</p>
		<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">MARKERZ</a></p>
	</div>

		</div>
		<!-- /Page Wrapper -->
 
 <?php require_once("./includes/footer.php");?>