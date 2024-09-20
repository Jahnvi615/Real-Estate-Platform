<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>  
<style>
	/* General responsive settings */
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Ensure images are responsive */
img {
    max-width: 100%;
    height: auto;
}

/* Desktop header styling */
.header-left {
    display: flex;
    align-items: center;
}

.header img {
    height: 50px;
    width: auto;
}

.nav.user-menu {
    display: flex;
    align-items: center;
}

.user-menu h4 {
    font-size: 16px;
}

/* Sidebar for desktop */
.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #222;
    overflow-y: auto;
    color: #fff;
}

/* Responsive for tablets and smaller devices */
@media only screen and (max-width: 768px) {
    /* Adjust header for mobile */
    .header-left {
        justify-content: space-between;
        padding: 10px;
    }

    .header img {
        margin-left: 0;
        height: 40px;
        width: 40px;
    }

    /* Sidebar */
    .sidebar {
        width: 200px;
        position: fixed;
        z-index: 1000;
        transition: transform 0.3s ease;
        transform: translateX(-250px);
    }

    .sidebar.open {
        transform: translateX(0);
    }

    /* Mobile menu toggle button */
    .mobile_btn {
        display: block;
        font-size: 24px;
        color: white;
    }

    /* Menu toggle icon for mobile */
    #toggle_btn {
        display: block;
        font-size: 24px;
        color: white;
        margin: 10px;
    }
}

/* For phones (screens less than 480px) */
@media only screen and (max-width: 480px) {
    /* Smaller adjustments */
    .header img {
        height: 30px;
        width: 30px;
    }

    /* Adjust text size */
    .nav.user-menu h4 {
        font-size: 14px;
    }

    .sidebar {
        width: 180px;
    }
}

/* Show sidebar when toggled */
.sidebar.open {
    transform: translateX(0);
}

</style>
  <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard.php" class="logo">
					<!--	<img src="../images/logo/AMT1.jpg" alt="Logo"style="margin-left: -140px;height:300px; width:70px;">
					</a>
					<a href="dashboard.php" class="logo logo-small">
						<img src="../images/logo/AMT1.jpg" alt="Logo" width="30" height="30">
					</a>-->
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				

				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					
					<!-- User Menu -->
					<h4 style="color:white;margin-top:13px;text-transform:capitalize;"><?php echo $_SESSION['auser'];?></h4>
					<li class="nav-item dropdown app-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="../images/logo/jahvi.png" width="31" alt="Ryan Taylor"></span>
						</a>
						
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $_SESSION['auser'];?></h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.php">Profile</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>

					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			
			<!-- header --->
			
			
			
						<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							
							<li class="menu-title"> 
								<span>Authentication</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="index.php"> Login </a></li>
									<li><a href="register.php"> Register </a></li>
									
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Users</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Users </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="adminlist.php"> Admin </a></li>
									<li><a href="userlist.php"> Users </a></li>
									<li><a href="useragent.php"> Agent </a></li>
									<li><a href="userbuilder.php"> Builder </a></li>
								</ul>
							</li>
						
							<li class="menu-title"> 
								<span>Property</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Property</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="propertyadd.php"> Add Property</a></li>
									<li><a href="propertyview.php"> View Property </a></li>
									
								</ul>
							</li>
							
							<li class="menu-title"> 
								<span>State & City</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span>State & City</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="stateadd.php"> State </a></li>
									<li><a href="cityadd.php"> City </a></li>
								</ul>
							</li>
							
							<li class="menu-title"> 
								<span>Query</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Query </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="contactview.php"> Contact </a></li>
									<li><a href="feedbackview.php"> Feedback </a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>About</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> About </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="aboutadd.php"> About </a></li>
									<li><a href="aboutview.php"> View About </a></li>
								</ul>
							</li>
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			<script>
// Toggle sidebar on mobile view
document.getElementById('mobile_btn').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
});
</script>