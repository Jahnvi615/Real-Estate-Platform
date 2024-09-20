<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Our Agent</title>

<link rel="stylesheet" href="style.css">
<style> 
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



.title{
    text-align: center;
    text-transform: capitalize;
    color: #726a95;
    margin: 10px 0;
    position: relative;
}

.title::after{
    content: "";
    position: absolute;
    width: 20%; height: 2px;
    background-image: linear-gradient(to left, transparent 5%, #726a95);
    bottom: -10px; left: 50%;
    transform: translate(-50%);
}

.team-row{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    padding: 40px 0;
}

.member{
    flex: 1 1 250px;
    margin: 20px;
    text-align: center;
    padding: 20px 10px;
    cursor: pointer;
    max-width: 300px;
    transition: all 0.3s;
}

.member:hover{
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    transform: translateY(-20px);
}

.member img{
    display: block;
    width: 150px; height: 150px;
    object-fit: cover;
    border:4px solid #726a95;
    border-radius: 50%;
    margin: 0 auto;
}

.member h2{
    text-transform: uppercase;
    font-size: 24px;
    color: #726a95;
    margin: 15px 0;
}

.member p{
    font-size: 15px;
    color: #838383;
    line-height: 1.6;
}
</style>
</head>
<body>
<?php include("include/header.php");?>
<div class="banner-full-row page-banner" style="background-image:url('images/banner.jpg');background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Agent</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
<section>
    <h1 class="title">Our Agent</h1>
    <div class="team-row">
        <div class="member">
            <img src="images/logo/jahvi.png" alt="">
            <h2>Jahnvi Goyal</h2>
            <p>Real Estate Consultancy</p>
        </div>
        
    </div>
</section>
<?php include("include/footer.php");?>
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

<script>
    document.getElementsByTagName("h1")[0].style.fontSize = "6vw";
</script>

</body>
</html>