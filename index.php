<?php
$connection = mysqli_connect("localhost", "root", "", "wedding_old");
session_start();
?>
<!DOCTYPE html>
<html lang="en">



<!-- Mirrored from jituchauhan.com/real-wed/realwed/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Bandbaaja Hub | Wedding Vendor</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <!-- OwlCarosuel CSS -->
    <link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
    <link href="css/owl.theme.default.css" type="text/css" rel="stylesheet">
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
    <!-- hero-section -->
    <div class="hero-section-third">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12">
                    <!-- search-block -->
                    <div class="">
                        <!--  <div class="text-center search-head">
                            <h1 class="search-head-title text-white">Find Local Wedding Vendors</h1>
                            <p class="d-none d-xl-block d-lg-block d-sm-block text-white">Browse the best wedding vendors in your area — from venues and photographers, to wedding planners, caterers, florists and more.</p>
                        </div>
                        <!-- /.search-block -->
                        <!-- search-form -->
                        <br /><br /><br /><br /><br /><br /><br /><br />
                        <div class="search-form">
                            <form class="form-row" action="vendor-listing.php">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <!-- select -->
                                    <select class="wide" name="category_id">
                                        <option value='Venue Type'>Vendor Type</option>

                                        <?php
                                        $q = mysqli_query($connection, "select * from tbl_category");
                                        while ($row = mysqli_fetch_array($q)) {
                                            echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                        }

                                        ?>


                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <!-- select -->
                                    <select class="wide" name="city_id">
                                        <?php
                                        $q = mysqli_query($connection, "select * from tbl_city");
                                        while ($row = mysqli_fetch_array($q)) {
                                            echo "<option value='{$row['city_id']}'>{$row['city_name']}</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <!-- button -->
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <button class="btn btn-default btn-block" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.search-form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-section" style="background-color:#ff47ad99 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">40+</h3>
                                <p class="text-white">Vendor Listing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">100+</h3>
                                <p class="text-white">Happy Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">2+</h3>
                                <p class="text-white"> Cities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="text-white mb-1">20+</h3>
                                <p class="text-white">Real Weddings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.hero-section -->
    <!-- venue-categoris-section-->
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10">Browse Vendors by Category</h2>
                        <p>You can browse all venues by category with thumbnail image and category name.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <!-- venue-categoris-block-->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="vendor-categories-block zoomimg">
                        <div class="vendor-categories-img"> <a href="package-listing.php?category_id=1">
                                <img src="./pacakage_image/36_1.jpeg" alt="" class="img-fluid" style="height: 180px;width: 100%;"></a></div>
                        <div class="vendor-categories-overlay">
                            <div class="vendor-categories-text">
                                <h4 class="mb0"><a href="package-listing.php?category_id=1" class="vendor-categories-title">Wedding Venues</a></h4>
                                <p class="vendor-categories-numbers"></p>

                            </div>
                        </div>
                    </div>
                    <!-- /.venue-categoris-block-->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="vendor-categories-block zoomimg">
                        <div class="vendor-categories-img">
                            <a href="package-listing.php?category_id=2">
                                <img src="./pacakage_image/36_2.jpg" alt="" class="img-fluid" style="height: 180px;width: 100%;"></a>
                        </div>
                        <div class="vendor-categories-overlay">
                            <div class="vendor-categories-text">
                                <h4 class="mb0"><a href="package-listing.php?category_id=2" class="vendor-categories-title">Decoration</a></h4>
                                <p class="vendor-categories-numbers"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.venue-categoris-block-->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="vendor-categories-block zoomimg">
                        <div class="vendor-categories-img"> <a href="package-listing.php?category_id=3">
                                <img src="./pacakage_image/24_3.jpg" alt="" class="img-fluid" style="height: 180px;width: 100%;"></a></div>
                        <div class="vendor-categories-overlay">
                            <div class="vendor-categories-text">
                                <h4 class="mb0"><a href="package-listing.php?category_id=3" class="vendor-categories-title">Catering</a></h4>
                                <p class="vendor-categories-numbers"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.venue-categoris-block-->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="vendor-categories-block zoomimg">
                        <div class="vendor-categories-img"> <a href="package-listing.php?category_id=5">
                                <img src="./pacakage_image/m2.png" alt="" class="img-fluid" style="height: 180px;width: 100%;"></a></div>
                        <div class="vendor-categories-overlay">
                            <div class="vendor-categories-text">
                                <h4 class="mb0"><a href="package-listing.php?category_id=5" class="vendor-categories-title">Wedding Makeup & Mehndi</a></h4>
                                <p class="vendor-categories-numbers"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.venue-categoris-block-->
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="vendor-categories-block zoomimg">
                        <div class="vendor-categories-img"> <a href="package-listing.php?category_id=4">
                                <img src="./pacakage_image/6_2.jpeg" alt="" class="img-fluid" style="height: 180px;width: 100%;"></a></div>
                        <div class="vendor-categories-overlay">
                            <div class="vendor-categories-text">
                                <h4 class="mb0"><a href="package-listing.php?category_id=4" class="vendor-categories-title">Photography</a></h4>
                                <p class="vendor-categories-numbers"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.venue-categoris-block-->
                </div>
            </div>
            <!-- venue-categoris-btn -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt20"><a href="package-listing.php" class="btn btn-primary btn-lg">Browse all </a></div>
            </div>
            <!-- /.venue-categoris-btn -->
        </div>
    </div>
    <!-- /.venue-categoris-section-->




    <div class="space-small bg-default text-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                    <h2 class="text-white mb10">Submit your Listing Right Now!</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-center mt-3">
                    <a href="#" class="btn btn-primary btn-lg">Submit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- social-media-section -->
    <div class="social-media-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6 col-12">
                    <h3 class="text-white mb0 mt10">Would you like to connect with us</h3>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-12 text-right">
                    <div class="social-icons">
                        <a href="#" class="icon-square"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="icon-square"><i class="fab fa-twitter"></i> </a>
                        <a href="#" class="icon-square"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="icon-square"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="icon-square"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.social-media-section -->
    <?php

    include './themepart/footer.php';

    ?>
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- owl-carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- nice-select js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
    <script>
        //jQuery to collapse the navbar on scroll
        $(window).scroll(function() {
            if ($(".header-transparent").offset().top > 200) {
                $(".fixed-top").addClass("top-nav-collapse");
            } else {
                $(".fixed-top").removeClass("top-nav-collapse");
            }
        });
    </script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:38 GMT -->

</html>