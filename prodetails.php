<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

// Check if 'pid' is provided in the URL and sanitize it
if (isset($_GET['pid'])) {
    $pid = intval($_GET['pid']);  // Sanitize the input to ensure it's an integer

    // Fetch property details from the database based on the dynamic pid
    $query = mysqli_query($con, "SELECT property.*, user.uname, user.uemail, user.uphone, user.utype, user.uimage FROM property JOIN user ON property.uid = user.uid WHERE property.pid = '$pid'");
    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    } else {
        echo "No property details found for the given ID.";
        exit();  // Exit if no property is found for the provided pid
    }
} else {
    echo "No property ID provided.";
    exit();  // Exit if no pid is provided
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--Meta Tags-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" type="images/jpg" href="images/logo/jahvi.png">

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

    <style>
  

    .property-container {
        padding: 30px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .property-description {
        background-color: #fafafa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .property-description h4 {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }

    .property-description p {
        font-size: 16px;
        color: #666;
        line-height: 1.5;
    }

    .property-details img {
        width: 100%;
        max-width: 500px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .property-info {
        padding: 20px;
    }

    .price {
        color: #27ae60;
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .agent-details,
    .availability,
    .property-type,
    .rooms,
    .floor-space {
        background-color: #fafafa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        font-size: 16px;
    }

    .agent-details strong,
    .availability strong,
    .property-type strong,
    .rooms strong,
    .floor-space strong {
        color: #333;
    }

    .carousel-inner img {
        height: 400px;
        width: 100%;
        object-fit: contain;
        border-radius: 8px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
    }
</style>

</head>
<body>
<?php include("include/header.php");?>
<div class="banner-full-row page-banner" style="background-image:url('images/banner.jpg');background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>About US</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


<div class="container property-container">
    <div class="row">
        <!-- Property Details Section -->
        <div class="col-md-12">
            <!-- Image Carousel -->
            <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php 
                    // Fetch images for the carousel
                    $imagePaths = [
                        isset($row['18']) ? "admin/property/{$row['18']}" : null,
                        isset($row['19']) ? "admin/property/{$row['19']}" : null,
                        isset($row['20']) ? "admin/property/{$row['20']}" : null
                    ];

                    foreach ($imagePaths as $index => $path) {
                        if ($path) {
                            $active = $index === 0 ? 'class="active"' : '';
                            echo "<li data-target='#propertyCarousel' data-slide-to='$index' $active></li>";
                        }
                    }
                    ?>
                </ol>

                <div class="carousel-inner">
                    <?php 
                    foreach ($imagePaths as $index => $image) {
                        if ($image) {
                            $active = $index === 0 ? 'active' : '';
                            echo "<div class='carousel-item $active'>
                                <img src='$image' class='d-block w-100' alt='Property Image $index'>
                            </div>";
                        }
                    }
                    ?>
                </div>

                <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Property Info Below Carousel -->
            <div class="property-info">
                <div class="property-description">
                    <h4>Properties Detail</h4>
                    <p id="property-description"><?php echo isset($row['2']) ? $row['2'] : 'N/A'; ?></p>
                    <p>Location: <strong id="property-location"><?php echo isset($row['location']) ? $row['location'] : 'N/A'; ?></strong></p>
                </div>
                <div class="agent-details">
                    <strong>Agent Details:</strong>
                    <p id="agent-name"><?php echo isset($row['uname']) ? $row['uname'] : 'N/A'; ?></p>
                    <p id="agent-phone"><?php echo isset($row['uphone']) ? $row['uphone'] : 'N/A'; ?></p>
                    <p id="agent-email"><?php echo isset($row['uemail']) ? $row['uemail'] : 'N/A'; ?></p>
                </div>
                <div class="price" id="property-price-detail">Price :- ₹ <?php echo isset($row['price']) ? $row['price'] : 'N/A'; ?></div>
                <div class="availability">
                    Availability Type: <strong id="property-availability"><?php echo isset($row['5']) ? $row['5'] : 'N/A'; ?></strong>
                </div>
                <div class="property-type">
                    Property Type: <strong id="property-type-detail"><?php echo isset($row['type']) ? $row['type'] : 'N/A'; ?></strong>
                </div>
                <div class="rooms">
                    BHK: <strong id="property-rooms"><?php echo isset($row['4']) ? $row['4'] : 'N/A'; ?></strong>
                </div>
                <div class="floor-space">
                    Floor Space: <strong id="property-floor-space"><?php echo isset($row['12']) ? $row['12'] : 'N/A'; ?> Sqft</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php");?>

<!-- Add jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider--> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider--> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/YouTubePopUp.jquery.js"></script> 
<script src="js/validate.js"></script> 
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>

</body>
</html>
