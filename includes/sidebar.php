<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<!-- Logo -->
	<div class="sidebar-logo">
		<a href="index" class="logo logo-normal">
			<!-- <img src="assets/img/logo.svg" alt="Logo"> -->
			<h2>ACTE HRM</h2>
		</a>
		<a href="index" class="logo-small">
			<!-- <img src="assets/img/logo-small.svg" alt="Logo"> -->
			<h4>HRM</h4>
		</a>
		<a href="index" class="dark-logo">
			<!-- <img src="assets/img/logo-white.svg" alt="Logo"> -->
			<h2>ACTE HRM</h2>
		</a>
	</div>
	<!-- /Logo -->
	<div class="modern-profile p-3 pb-0">
		<div class="text-center rounded bg-light p-3 mb-4 user-profile">
			<div class="avatar avatar-lg online mb-3">
				<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
			</div>
			<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
			<p class="fs-10">System Admin</p>
		</div>
		<div class="sidebar-nav mb-3">
			<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
				<li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
				<li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
				<li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
			</ul>
		</div>
	</div>
	<div class="sidebar-header p-3 pb-0 pt-2">
		<div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
			<div class="avatar avatar-md onlin">
				<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
			</div>
			<div class="text-start sidebar-profile-info ms-2">
				<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
				<p class="fs-10">System Admin</p>
			</div>
		</div>
		<div class="input-group input-group-flat d-inline-flex mb-4">
			<span class="input-icon-addon">
				<i class="ti ti-search"></i>
			</span>
			<input type="text" class="form-control" placeholder="Search in HRMS">
			<span class="input-group-text">
				<kbd>CTRL + / </kbd>
			</span>
		</div>
		<div class="d-flex align-items-center justify-content-between menu-item mb-3">
			<div class="me-3">
				<a href="calendar.html" class="btn btn-menubar">
					<i class="ti ti-layout-grid-remove"></i>
				</a>
			</div>
			<div class="me-3">
				<a href="chat.html" class="btn btn-menubar position-relative">
					<i class="ti ti-brand-hipchat"></i>
					<span class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
				</a>
			</div>
			<div class="me-3 notification-item">
				<a href="activity.html" class="btn btn-menubar position-relative me-1">
					<i class="ti ti-bell"></i>
					<span class="notification-status-dot"></span>
				</a>
			</div>
			<div class="me-0">
				<a href="email.html" class="btn btn-menubar">
					<i class="ti ti-message"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<?php if (in_array($roleId, [3, 4, 5])) { ?>
					<li class="menu-title"><span>MAIN MENU</span></li>
					<li>
						<ul>
							<li class="submenu">
								<a href="javascript:void(0);" class="sub-menu-title">
									<i class="ti ti-smart-home"></i>
									<span>Dashboard</span>
									<span class="badge badge-danger fs-10 fw-medium text-white p-1">Hot</span>
									<span class="menu-arrow"></span>
								</a>
								<ul class="list-menus">
									<li><a href="index" class="index">Admin Dashboard</a></li>
									<li><a href="dashboard" class="dashboard">Dashboard</a></li>
									<li><a href="employee-dashboard" class="employee-dashboard">Employee Dashboard</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="menu-title"><span>HRM</span></li>
					<li>
						<ul>
							<li class="submenu">
								<a href="javascript:void(0);" class="sub-menu-title">
									<i class="ti ti-users"></i><span>Employees</span>
									<span class="menu-arrow"></span>
								</a>
								<ul>
									<li><a href="employees" class="employees">Employee Lists</a></li>
									<li><a href="departments" class="departments">Departments</a></li>
									<li><a href="designations" class="designations">Designations</a></li>
									<li><a href="roles" class="roles">Roles</a></li>
									<li><a href="salary-structure" class="salary-structure">Salary Structure</a></li>
									<li><a href="policy" class="policy">Policies</a></li>
								</ul>
							</li>
						</ul>
					</li>
				<?php } ?>

				<li class="menu-title"><span>MY PAGE</span></li>
				<li>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);" class="sub-menu-title">
								<i class="ti ti-user-shield"></i><span>My Page</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="employee-details" class="employee-details">My Info</a></li>
								<li><a href="employee-attendance" class="attendance">Attendance</a></li>
								<li><a href="leave-managment" class="leave-managment">Leave Management</a></li>
								<li><a href="payroll" class="payroll">Payroll</a></li> 
							</ul>
						</li>
					</ul>
				</li>

				<li class="menu-title"><span>RECRUITMENT</span></li>
				<li>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);" class="sub-menu-title">
								<i class="ti ti-user-shield"></i><span>Recruitment</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="recruitment" class="recruitment">Recruitment</a></li>
								<li><a href="candidates" class="candidates">Candidates</a></li>
								<li><a href="interview" class="interview">Interview</a></li>
								<li><a href="job-offers" class="job-offers">Job Offers</a></li>
								<li><a href="referrals" class="referrals">Job Referrals</a></li>
							</ul>
						</li>
						<li><a href="job-openings" class="job-openings"><i class="ti ti-timeline"></i><span>Job Openings</span></a></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->

<!-- Horizontal Menu -->
<div class="sidebar sidebar-horizontal" id="horizontal-menu">
	<div class="sidebar-menu">
		<div class="main-menu">
			<ul class="nav-menu">
				<li class="menu-title">
					<span>Main</span>
				</li>
				<li class="submenu">
					<a href="#" class="active subdrop">
						<i class="ti ti-smart-home"></i><span>Dashboard</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li><a href="index">Admin Dashboard</a></li>
						<li><a href="dashboard">Dashboard</a></li>
						<li><a href="employee-dashboard">Employee Dashboard</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<i class="ti ti-user-star"></i><span>Super Admin</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li><a href="dashboard">Dashboard</a></li>
						<li><a href="companies.html">Companies</a></li>
						<li><a href="subscription.html">Subscriptions</a></li>
						<li><a href="packages.html">Packages</a></li>
						<li><a href="domain.html">Domain</a></li>
						<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<i class="ti ti-layout-grid-add"></i><span>Applications</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li><a href="chat.html">Chat</a></li>
						<li class="submenu submenu-two">
							<a href="call.html">Calls<span class="menu-arrow inside-submenu"></span></a>
							<ul>
								<li><a href="voice-call.html">Voice Call</a></li>
								<li><a href="video-call.html">Video Call</a></li>
								<li><a href="outgoing-call.html">Outgoing Call</a></li>
								<li><a href="incoming-call.html">Incoming Call</a></li>
								<li><a href="call-history.html">Call History</a></li>
							</ul>
						</li>
						<li><a href="calendar.html">Calendar</a></li>
						<li><a href="email.html">Email</a></li>
						<li><a href="todo.html">To Do</a></li>
						<li><a href="notes.html">Notes</a></li>
						<li><a href="file-manager.html">File Manager</a></li>
						<li><a href="kanban-view.html">Kanban</a></li>
						<li><a href="invoices.html">Invoices</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<i class="ti ti-layout-board-split"></i><span>Layouts</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li>
							<a href="layout-horizontal.html">
								<span>Horizontal</span>
							</a>
						</li>
						<li>
							<a href="layout-detached.html">
								<span>Detached</span>
							</a>
						</li>
						<li>
							<a href="layout-modern.html">
								<span>Modern</span>
							</a>
						</li>
						<li>
							<a href="layout-two-column.html">
								<span>Two Column </span>
							</a>
						</li>
						<li>
							<a href="layout-hovered.html">
								<span>Hovered</span>
							</a>
						</li>
						<li>
							<a href="layout-box.html">
								<span>Boxed</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-single.html">
								<span>Horizontal Single</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-overlay.html">
								<span>Horizontal Overlay</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-box.html">
								<span>Horizontal Box</span>
							</a>
						</li>
						<li>
							<a href="layout-horizontal-sidemenu.html">
								<span>Menu Aside</span>
							</a>
						</li>
						<li>
							<a href="layout-vertical-transparent.html">
								<span>Transparent</span>
							</a>
						</li>
						<li>
							<a href="layout-without-header.html">
								<span>Without Header</span>
							</a>
						</li>
						<li>
							<a href="layout-rtl.html">
								<span>RTL</span>
							</a>
						</li>
						<li>
							<a href="layout-dark.html">
								<span>Dark</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<i class="ti ti-user-star"></i><span>Projects</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li>
							<a href="clients-grid.html"><span>Clients</span>
							</a>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Projects</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="projects-grid.html">Projects</a></li>
								<li><a href="tasks.html">Tasks</a></li>
								<li><a href="task-board.html">Task Board</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="call.html">Crm<span class="menu-arrow"></span></a>
							<ul>
								<li><a href="contacts-grid.html"><span>Contacts</span></a></li>
								<li><a href="companies-grid.html"><span>Companies</span></a></li>
								<li><a href="deals-grid.html"><span>Deals</span></a></li>
								<li><a href="leads-grid.html"><span>Leads</span></a></li>
								<li><a href="pipeline.html"><span>Pipeline</span></a></li>
								<li><a href="analytics.html"><span>Analytics</span></a></li>
								<li><a href="activity.html"><span>Activities</span></a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Employees</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="users">User Lists</a></li>
								<li><a href="employees.html">Employee Lists</a></li>
								<li><a href="employees-grid.html">Employee Grid</a></li>
								<!-- <li><a href="employee-details">Employee Details</a></li> -->
								<li><a href="departments">Departments</a></li>
								<li><a href="designations">Designations</a></li>
								<li><a href="policy">Policies</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Tickets</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="tickets.html">Tickets</a></li>
								<li><a href="ticket-details.html">Ticket Details</a></li>
							</ul>
						</li>
						<li><a href="holidays.html"><span>Holidays</span></a></li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Attendance</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">Leaves<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="leaves.html">Leaves (Admin)</a></li>
										<li><a href="leaves-employee.html">Leave (Employee)</a></li>
										<li><a href="leave-settings.html">Leave Settings</a></li>
									</ul>
								</li>
								<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
								<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
								<li><a href="timesheets.html">Timesheets</a></li>
								<li><a href="schedule-timing.html">Shift & Schedule</a></li>
								<li><a href="overtime.html">Overtime</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Performance</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="performance-indicator.html">Performance Indicator</a></li>
								<li><a href="performance-review.html">Performance Review</a></li>
								<li><a href="performance-appraisal.html">Performance Appraisal</a></li>
								<li><a href="goal-tracking.html">Goal List</a></li>
								<li><a href="goal-type.html">Goal Type</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Training</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="training.html">Training List</a></li>
								<li><a href="trainers.html">Trainers</a></li>
								<li><a href="training-type.html">Training Type</a></li>
							</ul>
						</li>
						<li><a href="promotion.html"><span>Promotion</span></a></li>
						<li><a href="resignation.html"><span>Resignation</span></a></li>
						<li><a href="termination.html"><span>Termination</span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<i class="ti ti-user-star"></i><span>Administration</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Sales</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="estimates.html">Estimates</a></li>
								<li><a href="invoices.html">Invoices</a></li>
								<li><a href="payments.html">Payments</a></li>
								<li><a href="expenses.html">Expenses</a></li>
								<li><a href="provident-fund.html">Provident Fund</a></li>
								<li><a href="taxes.html">Taxes</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Accounting</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="categories.html">Categories</a></li>
								<li><a href="budgets.html">Budgets</a></li>
								<li><a href="budget-expenses.html">Budget Expenses</a></li>
								<li><a href="budget-revenues.html">Budget Revenues</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Payroll</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="employee-salary.html">Employee Salary</a></li>
								<li><a href="payslip.html">Payslip</a></li>
								<li><a href="payroll.html">Payroll Items</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Assets</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="assets.html">Assets</a></li>
								<li><a href="asset-categories.html">Asset Categories</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Help & Supports</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="knowledgebase.html">Knowledge Base</a></li>
								<li><a href="activity.html">Activities</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>User Management</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="users.html">Users</a></li>
								<li><a href="roles-permissions.html">Roles & Permissions</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Reports</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="expenses-report.html">Expense Report</a></li>
								<li><a href="invoice-report.html">Invoice Report</a></li>
								<li><a href="payment-report.html">Payment Report</a></li>
								<li><a href="project-report.html">Project Report</a></li>
								<li><a href="task-report.html">Task Report</a></li>
								<li><a href="user-report.html">User Report</a></li>
								<li><a href="employee-report.html">Employee Report</a></li>
								<li><a href="payslip-report.html">Payslip Report</a></li>
								<li><a href="attendance-report.html">Attendance Report</a></li>
								<li><a href="leave-report.html">Leave Report</a></li>
								<li><a href="daily-report.html">Daily Report</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Settings</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">General Settings<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="profile-settings.html">Profile</a></li>
										<li><a href="security-settings.html">Security</a></li>
										<li><a href="notification-settings.html">Notifications</a></li>
										<li><a href="connected-apps.html">Connected Apps</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">Website Settings<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="bussiness-settings.html">Business Settings</a></li>
										<li><a href="seo-settings.html">SEO Settings</a></li>
										<li><a href="localization-settings.html">Localization</a></li>
										<li><a href="prefixes.html">Prefixes</a></li>
										<li><a href="preferences.html">Preferences</a></li>
										<li><a href="performance-appraisal.html">Appearance</a></li>
										<li><a href="language.html">Language</a></li>
										<li><a href="authentication-settings.html">Authentication</a></li>
										<li><a href="ai-settings.html">AI Settings</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">App Settings<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="salary-settings.html">Salary Settings</a></li>
										<li><a href="approval-settings.html">Approval Settings</a></li>
										<li><a href="invoice-settings.html">Invoice Settings</a></li>
										<li><a href="leave-type.html">Leave Type</a></li>
										<li><a href="custom-fields.html">Custom Fields</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">System Settings<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="email-settings.html">Email Settings</a></li>
										<li><a href="email-template.html">Email Templates</a></li>
										<li><a href="sms-settings.html">SMS Settings</a></li>
										<li><a href="sms-template.html">SMS Templates</a></li>
										<li><a href="otp-settings.html">OTP</a></li>
										<li><a href="gdpr.html">GDPR Cookies</a></li>
										<li><a href="maintenance-mode.html">Maintenance Mode</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">Financial Settings<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="payment-gateways.html">Payment Gateways</a></li>
										<li><a href="tax-rates.html">Tax Rate</a></li>
										<li><a href="currencies.html">Currencies</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">Other Settings<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="custom-css.html">Custom CSS</a></li>
										<li><a href="custom-js.html">Custom JS</a></li>
										<li><a href="cronjob.html">Cronjob</a></li>
										<li><a href="storage-settings.html">Storage</a></li>
										<li><a href="ban-ip-address.html">Ban IP Address</a></li>
										<li><a href="backup.html">Backup</a></li>
										<li><a href="clear-cache.html">Clear Cache</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<i class="ti ti-page-break"></i><span>Pages</span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li><a href="starter.html"><span>Starter</span></a></li>
						<li><a href="profile.html"><span>Profile</span></a></li>
						<li><a href="gallery.html"><span>Gallery</span></a></li>
						<li><a href="search-result.html"><span>Search Results</span></a></li>
						<li><a href="timeline.html"><span>Timeline</span></a></li>
						<li><a href="pricing.html"><span>Pricing</span></a></li>
						<li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
						<li><a href="under-maintenance.html"><span>Under Maintenance</span></a></li>
						<li><a href="under-construction.html"><span>Under Construction</span></a></li>
						<li><a href="api-keys.html"><span>API Keys</span></a></li>
						<li><a href="privacy-policy"><span>Privacy Policy</span></a></li>
						<li><a href="terms-condition.html"><span>Terms & Conditions</span></a></li>
						<li class="submenu">
							<a href="#"><span>Content</span> <span class="menu-arrow"></span></a>
							<ul>
								<li><a href="pages.html">Pages</a></li>
								<li class="submenu">
									<a href="javascript:void(0);">Blogs<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="blogs.html">All Blogs</a></li>
										<li><a href="blog-categories.html">Categories</a></li>
										<li><a href="blog-comments.html">Comments</a></li>
										<li><a href="blog-tags.html">Tags</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">Locations<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="countries.html">Countries</a></li>
										<li><a href="states.html">States</a></li>
										<li><a href="cities.html">Cities</a></li>
									</ul>
								</li>
								<li><a href="testimonials.html">Testimonials</a></li>
								<li><a href="faq.html">FAQ’S</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<span>Authentication</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);" class="">Login<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="login.html">Cover</a></li>
										<li><a href="login-2.html">Illustration</a></li>
										<li><a href="login-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="">Register<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="register.html">Cover</a></li>
										<li><a href="register-2.html">Illustration</a></li>
										<li><a href="register-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="forgot-password.html">Cover</a></li>
										<li><a href="forgot-password-2.html">Illustration</a></li>
										<li><a href="forgot-password-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">Reset Password<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="reset-password.html">Cover</a></li>
										<li><a href="reset-password-2.html">Illustration</a></li>
										<li><a href="reset-password-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">Email Verification<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="email-verification.html">Cover</a></li>
										<li><a href="email-verification-2.html">Illustration</a></li>
										<li><a href="email-verification-3.html">Basic</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">2 Step Verification<span class="menu-arrow"></span></a>
									<ul>
										<li><a href="two-step-verification.html">Cover</a></li>
										<li><a href="two-step-verification-2.html">Illustration</a></li>
										<li><a href="two-step-verification-3.html">Basic</a></li>
									</ul>
								</li>
								<li><a href="lock-screen.html">Lock Screen</a></li>
								<li><a href="error-404.html">404 Error</a></li>
								<li><a href="error-500.html">500 Error</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<span>UI Interface</span>
								<span class="menu-arrow"></span>
							</a>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-hierarchy-2"></i>
										<span>Base UI</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="ui-alerts.html">Alerts</a>
										</li>
										<li>
											<a href="ui-accordion.html">Accordion</a>
										</li>
										<li>
											<a href="ui-avatar.html">Avatar</a>
										</li>
										<li>
											<a href="ui-badges.html">Badges</a>
										</li>
										<li>
											<a href="ui-borders.html">Border</a>
										</li>
										<li>
											<a href="ui-buttons.html">Buttons</a>
										</li>
										<li>
											<a href="ui-buttons-group.html">Button Group</a>
										</li>
										<li>
											<a href="ui-breadcrumb.html">Breadcrumb</a>
										</li>
										<li>
											<a href="ui-cards.html">Card</a>
										</li>
										<li>
											<a href="ui-carousel.html">Carousel</a>
										</li>
										<li>
											<a href="ui-colors.html">Colors</a>
										</li>
										<li>
											<a href="ui-dropdowns.html">Dropdowns</a>
										</li>
										<li>
											<a href="ui-grid.html">Grid</a>
										</li>
										<li>
											<a href="ui-images.html">Images</a>
										</li>
										<li>
											<a href="ui-lightbox.html">Lightbox</a>
										</li>
										<li>
											<a href="ui-media.html">Media</a>
										</li>
										<li>
											<a href="ui-modals.html">Modals</a>
										</li>
										<li>
											<a href="ui-offcanvas.html">Offcanvas</a>
										</li>
										<li>
											<a href="ui-pagination.html">Pagination</a>
										</li>
										<li>
											<a href="ui-popovers.html">Popovers</a>
										</li>
										<li>
											<a href="ui-progress.html">Progress</a>
										</li>
										<li>
											<a href="ui-placeholders.html">Placeholders</a>
										</li>
										<li>
											<a href="ui-spinner.html">Spinner</a>
										</li>
										<li>
											<a href="ui-sweetalerts.html">Sweet Alerts</a>
										</li>
										<li>
											<a href="ui-nav-tabs.html">Tabs</a>
										</li>
										<li>
											<a href="ui-toasts.html">Toasts</a>
										</li>
										<li>
											<a href="ui-tooltips.html">Tooltips</a>
										</li>
										<li>
											<a href="ui-typography.html">Typography</a>
										</li>
										<li>
											<a href="ui-video.html">Video</a>
										</li>
										<li>
											<a href="ui-sortable.html">Sortable</a>
										</li>
										<li>
											<a href="ui-swiperjs.html">Swiperjs</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-hierarchy-3"></i>
										<span>Advanced UI</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="ui-ribbon.html">Ribbon</a>
										</li>
										<li>
											<a href="ui-clipboard.html">Clipboard</a>
										</li>
										<li>
											<a href="ui-drag-drop.html">Drag & Drop</a>
										</li>
										<li>
											<a href="ui-rangeslider.html">Range Slider</a>
										</li>
										<li>
											<a href="ui-rating.html">Rating</a>
										</li>
										<li>
											<a href="ui-text-editor.html">Text Editor</a>
										</li>
										<li>
											<a href="ui-counter.html">Counter</a>
										</li>
										<li>
											<a href="ui-scrollbar.html">Scrollbar</a>
										</li>
										<li>
											<a href="ui-stickynote.html">Sticky Note</a>
										</li>
										<li>
											<a href="ui-timeline.html">Timeline</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-input-search"></i>
										<span>Forms</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Form Elements <span class="menu-arrow inside-submenu"></span>
											</a>
											<ul>
												<li>
													<a href="form-basic-inputs.html">Basic Inputs</a>
												</li>
												<li>
													<a href="form-checkbox-radios.html">Checkbox & Radios</a>
												</li>
												<li>
													<a href="form-input-groups.html">Input Groups</a>
												</li>
												<li>
													<a href="form-grid-gutters.html">Grid & Gutters</a>
												</li>
												<li>
													<a href="form-select.html">Form Select</a>
												</li>
												<li>
													<a href="form-mask.html">Input Masks</a>
												</li>
												<li>
													<a href="form-fileupload.html">File Uploads</a>
												</li>
											</ul>
										</li>
										<li class="submenu submenu-two">
											<a href="javascript:void(0);">Layouts <span class="menu-arrow inside-submenu"></span>
											</a>
											<ul>
												<li>
													<a href="form-horizontal.html">Horizontal Form</a>
												</li>
												<li>
													<a href="form-vertical.html">Vertical Form</a>
												</li>
												<li>
													<a href="form-floating-labels.html">Floating Labels</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="form-validation.html">Form Validation</a>
										</li>
										<li>
											<a href="form-select2.html">Select2</a>
										</li>
										<li>
											<a href="form-wizard.html">Form Wizard</a>
										</li>
										<li>
											<a href="form-pickers.html">Form Pickers</a>
										</li>

									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-table-plus"></i>
										<span>Tables</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="tables-basic.html">Basic Tables </a>
										</li>
										<li>
											<a href="data-tables.html">Data Table </a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-chart-line"></i>
										<span>Charts</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="chart-apex.html">Apex Charts</a>
										</li>
										<li>
											<a href="chart-c3.html">Chart C3</a>
										</li>
										<li>
											<a href="chart-js.html">Chart Js</a>
										</li>
										<li>
											<a href="chart-morris.html">Morris Charts</a>
										</li>
										<li>
											<a href="chart-flot.html">Flot Charts</a>
										</li>
										<li>
											<a href="chart-peity.html">Peity Charts</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-icons"></i>
										<span>Icons</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="icon-fontawesome.html">Fontawesome Icons</a>
										</li>
										<li>
											<a href="icon-tabler.html">Tabler Icons</a>
										</li>
										<li>
											<a href="icon-bootstrap.html">Bootstrap Icons</a>
										</li>
										<li>
											<a href="icon-remix.html">Remix Icons</a>
										</li>
										<li>
											<a href="icon-feather.html">Feather Icons</a>
										</li>
										<li>
											<a href="icon-ionic.html">Ionic Icons</a>
										</li>
										<li>
											<a href="icon-material.html">Material Icons</a>
										</li>
										<li>
											<a href="icon-pe7.html">Pe7 Icons</a>
										</li>
										<li>
											<a href="icon-simpleline.html">Simpleline Icons</a>
										</li>
										<li>
											<a href="icon-themify.html">Themify Icons</a>
										</li>
										<li>
											<a href="icon-weather.html">Weather Icons</a>
										</li>
										<li>
											<a href="icon-typicon.html">Typicon Icons</a>
										</li>
										<li>
											<a href="icon-flag.html">Flag Icons</a>
										</li>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-table-plus"></i>
										<span>Maps</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li>
											<a href="maps-vector.html">Vector</a>
										</li>
										<li>
											<a href="maps-leaflet.html">Leaflet</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">Documentation</a></li>
						<li><a href="#">Change Log</a></li>
						<li class="submenu">
							<a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
							<ul>
								<li><a href="javascript:void(0);">Multilevel 1</a></li>
								<li class="submenu submenu-two">
									<a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
									<ul>
										<li><a href="javascript:void(0);">Multilevel 2.1</a></li>
										<li class="submenu submenu-two submenu-three">
											<a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
											<ul>
												<li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
												<li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="javascript:void(0);">Multilevel 3</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<div class="d-xl-flex align-items-center d-none">
				<a href="#" class="me-3 avatar avatar-sm">
					<img src="assets/img/profiles/avatar-07.jpg" alt="profile" class="rounded-circle">
				</a>
				<a href="#" class="btn btn-icon btn-sm rounded-circle mode-toggle">
					<i class="ti ti-sun"></i>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- /Horizontal Menu -->