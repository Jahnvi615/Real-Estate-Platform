<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

// Function to display time ago
function timeAgo($timestamp){
    $time = time() - strtotime($timestamp); // Calculate the difference
    $units = [
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    ];
    foreach ($units as $seconds => $unit) {
        $diff = floor($time / $seconds);
        if ($diff >= 1) {
            return $diff . ' ' . $unit . ($diff > 1 ? 's' : '') . ' ago';
        }
    }
    return 'Just now';
}                               
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--Required meta tags-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--Meta Tags-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Homex template">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="shortcut icon" href="images/logo/jahvi.png">

<!--Fonts-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--Css Link-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--Title-->
<title>Jahnvi Estate</title>
</head>
<body>

<div id="page-wrapper">
    <div class="row"> 
        <!-- Header start -->
        <?php include("include/header.php");?>
        <!-- Header end -->
        
        <!-- Banner -->
        <div class="banner-full-row page-banner" style="background-image:url('images/banner.jpg');background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Grid</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Property Grid</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner -->
        
        <!-- Property Grid -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php 
                            // Fetch properties from the database
                            $query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage FROM `property`, `user` WHERE property.uid=user.uid");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <div class="col-md-6">
                                <div class="featured-thumb hover-zoomer mb-4">
                                    <div class="overlay-black overflow-hidden position-relative">
                                        <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                        <div class="sale bg-secondary text-white">For <?php echo $row['5'];?></div>
                                        <div class="price text-primary text-capitalize">₹<?php echo $row['13'];?> <span class="text-white"><?php echo $row['12'];?> Sqft</span></div>
                                    </div>
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-4">
                                            <h5 class="text-secondary hover-text-primary mb-2 text-capitalize">
                                                <a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a>
                                            </h5>
                                            <span class="location text-capitalize">
                                                <i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?>
                                            </span>
                                        </div>
                                        <div class="px-4 pb-4 d-inline-block w-100">
                                            <div class="float-left text-capitalize">
                                                <i class="fas fa-user text-primary mr-1"></i> By: <?php echo $row['uname']; ?>
                                            </div>
                                            <div class="float-right">
                                                <i class="far fa-calendar-alt text-primary mr-1"></i> 
                                                <?php echo timeAgo($row['date']); ?>
                                            </div>
                                            <br>
                                            <center>
                                                <button onclick="window.location.href='prodetails.php?pid=<?php echo $row['0']; ?>';" style="border-radius:50px;background-color:var(--theme-primary-color);color:#fff;">More Details</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <!-- Sidebar with Recent Properties -->
                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recent Property Add</h4>
                            <ul class="property_list_widget">
                                <?php 
                                $recentQuery = mysqli_query($con, "SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
                                while ($recentRow = mysqli_fetch_array($recentQuery)) {
                                ?>
                                <li>
                                    <img src="admin/property/<?php echo $recentRow['18']; ?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-primary text-capitalize">
                                        <a href="propertydetail.php?pid=<?php echo $recentRow['0']; ?>"><?php echo $recentRow['1']; ?></a>
                                    </h6>
                                    <span class="font-14">
                                        <i class="fas fa-map-marker-alt icon-primary icon-small"></i> <?php echo $recentRow['14']; ?>
                                    </span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled"> <span class="page-link">Previous</span> </li>
                                        <li class="page-item active" aria-current="page"> <span class="page-link"> 1 <span class="sr-only">(current)</span> </span> </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                    </ul>
                                </nav>
                            </div> 
                        </div>
                    </div>
                    
        </div>


        <!-- Property Grid End -->

        <!-- Footer -->
        <?php include("include/footer.php"); ?>
        <!-- Footer End -->

        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--Js Link--> 
<script src="js/jquery.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>
