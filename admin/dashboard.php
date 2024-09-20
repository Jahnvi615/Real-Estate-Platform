<?php
session_start();
require("config.php");

// Check if user is logged in
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
    exit();
}

// Fetch data from the database
$user_count = $feedback_count = $property_count = $contact_message_count = 0;

// Get users count
$result = mysqli_query($con, "SELECT COUNT(*) as count FROM user");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $user_count = $row['count'];
} else {
    echo "Error fetching users count: " . mysqli_error($con);
}

// Get feedback count
$result = mysqli_query($con, "SELECT COUNT(*) as count FROM feedback");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $feedback_count = $row['count'];
} else {
    echo "Error fetching feedback count: " . mysqli_error($con);
}

// Get property count
$result = mysqli_query($con, "SELECT COUNT(*) as count FROM property");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $property_count = $row['count'];
} else {
    echo "Error fetching property count: " . mysqli_error($con);
}

// Get contact message count
$result = mysqli_query($con, "SELECT COUNT(*) as count FROM contact");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $contact_message_count = $row['count'];
} else {
    echo "Error fetching contact message count: " . mysqli_error($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Jahnvi Estate | Dashboard</title>
    <link rel="shortcut icon" type="images/png" href="../images/logo/jahvi.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Main Wrapper -->
    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- /Header -->
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin</h3>
                        <p></p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-primary">
                                    <i class="fe fe-users"></i>
                                </span>
                            </div>
                            <div class="dash-widget-info">
                                <h3><?php echo $user_count; ?></h3>
                                <h6 class="text-muted">Users</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-success">
                                    <i class="fe fe-users"></i>
                                </span>
                            </div>
                            <div class="dash-widget-info">
                                <h3><?php echo $feedback_count; ?></h3>
                                <h6 class="text-muted">Feedback</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-danger">
                                    <i class="fe fe-users"></i>
                                </span>
                            </div>
                            <div class="dash-widget-info">
                                <h3><?php echo $property_count; ?></h3>
                                <h6 class="text-muted">Property</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-warning">
                                    <i class="fe fe-users"></i>
                                </span>
                            </div>
                            <div class="dash-widget-info">
                                <h3><?php echo $contact_message_count; ?></h3>
                                <h6 class="text-muted">Contact Message</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>
    <!-- /Page Wrapper -->
    <!-- /Main Wrapper -->
    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>    
    <script src="assets/plugins/morris/morris.min.js"></script>  
    <script src="assets/js/chart.morris.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>
