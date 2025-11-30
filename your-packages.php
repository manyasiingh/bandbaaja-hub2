<?php
$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-view-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BandBaaja Hub | Wedding Vendor & Supplier Directory HTML Template - List View Sidebar</title>
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
    <?php

    include './themepart/header.php';

    ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption">
                        <h1 class="page-title">Your Packages</h1>
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
                            <li class="breadcrumb-item active text-white" aria-current="page">
                                Your Packages
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- vendor-section -->
    <div class="content">
        <div class="container">
            <!-- Vendor thumbnail -->
            <div class="row">
                <?php
                $q = mysqli_query($connection, "SELECT * FROM `tbl_package` WHERE `vendor_id` = '{$_SESSION['id']}'");
                while ($row = mysqli_fetch_array($q)) {
                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="vendor-thumbnail">
                            <!-- Vendor thumbnail -->
                            <div class="vendor-img zoomimg">
                                <!-- Vendor img -->
                                <a href="package-details.php?package_id=<?php echo $row['package_id'] ?>"><img src="./admin/uploads/<?php echo $row['package_image'] ?>" alt="" class="img-fluid" style="height: 300px;"></a>
                                <div class="wishlist-sign"><a href="package-details.php?package_id=<?php echo $row['package_id'] ?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                            </div>
                            <!-- /.Vendor img -->
                            <div class="vendor-content">
                                <!-- Vendor Content -->
                                <h2 class="vendor-title"><a href="package-details.php?package_id=<?php echo $row['package_id'] ?>" class="title"><?php echo $row['package_name'] ?></a></h2>
                                <!-- <p class="vendor-address">Ahmedabad, Gujarat.</p> -->
                            </div>
                            <div class="vendor-meta">
                                <div class="vendor-meta-item vendor-meta-item-bordered">
                                    <span class="vendor-price">
                                        Rs.<?php echo $row['package_price'] ?>
                                    </span>
                                    <span class="vendor-text">Start From</span>
                                </div>
                                <div class="vendor-meta-item vendor-meta-item-bordered">
                                    <span class="rating-star">
                                        
                                    <h3><a href="package-edit.php?id=<?php echo $row['package_id'] ?>">Edit</a></h3>
                                    
                                    <h3><a href="package-delete.php?id=<?php echo $row['package_id'] ?>">Delete</a></h3>
                                    </span>
                                    
                                </div>
                            </div>
                            <!-- /.Vendor Content -->
                        </div>
                        <!-- /.Vendor thumbnail -->
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
        <!-- /.Vendor thumbnail -->
    </div>
    <!-- social-media-section -->
    <div class="social-media-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                    <h3 class="text-white mb0 mt10">Would you like to connect with us</h3>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 text-right">
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
    <!-- footer-section -->
    <?php

    include './themepart/footer.php';

    ?>

    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-view-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->

</html>