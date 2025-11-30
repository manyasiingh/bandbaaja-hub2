<?php
$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:42 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BandBaaja Hub | Wedding Vendor & Supplier Directory HTML Template - Contact us</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- header -->
  <?php

  include './themepart/header.php';

  ?>
    <!-- /.header -->
    <!-- page-header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption">
                        <h1 class="page-title">About us</h1>
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>
        <!-- page caption -->
        <div class="page-breadcrumb">
            <div class="container">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- about-descriptions -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!--  about-details  -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb100">
                    <img src="images/about-img-4.jpg" alt="" class="img-fluid rounded">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" >
                    <div class="p-5">
                        <h2>Who we are</h2>
                        <p class="lead">India's favourite wedding planning website & app with monthly dedicated users. ​Realwed is​ a ​swanky alternative to the outdated wedding planning process. A one-stop-shop for all things weddings, you can find inspiratio​​n​, ​ideas ​and vendors within​ your​ budget​. WedMeGood has been trusted by over thousands of ​​brides & grooms​ all over the world​ to plan their big day.​ So sit back, log on to Realwed, and ​plan the wedding of your dreams​!. </p>

                       
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <div class="space-small counter-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="counter text-center">
                        <h2 class="timer count-title count-number" data-to="50000" data-speed="1500">40+</h2>
                        <h3 class="count-text">Vendors</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="counter text-center">
                        <h2 class="timer count-title" data-to="150" data-speed="1500">8</h2>
                        <h3 class="count-text ">Users</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="counter  text-center">
                        <h2 class="timer count-title" data-to="5000" data-speed="1500">55+</h2>
                        <h3 class="count-text ">Packages</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- /.venue-categoris-section-->
    
   
    <?php

    include './themepart/footer.php';

    ?>
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <!-- nice-select -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script>
    function initMap() {
        var uluru = {
            lat: 23.0732195,
            lng: 72.5646902
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: 'images/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&amp;callback=initMap">
    </script>
    <script src="js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:42 GMT -->
</html>