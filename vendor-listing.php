<?php
session_start();
$connection = new mysqli("localhost", "root", "", "wedding_old");

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
                        <h1 class="page-title">Listing Vendor </h1>
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
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Listing</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Listing Venue with sidebar
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
            <div class="row">       <?php
                    if (isset($_GET['city_id']) && isset($_GET['category_id'])) {
                        $q = mysqli_query($connection, "select * from tbl_vendor where category_id ='{$_GET['category_id']}' and city_id ='{$_GET['city_id']}'  ");
                    } else {
                        $q = mysqli_query($connection, "select * from tbl_vendor");
                    }
                    $count = mysqli_num_rows($q);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($q)) {
                    ?>
                           <!-- <div class="vendor-thumbnail list-view">
                               
                           <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 border-right pr-0">
                                        <div class="vendor-img">
                           
                                        <a href="#">
                                                <div class="zoomimg"><img src="admin/uploads/<?php echo $row['vendor_image'] ?>" alt="" class="img-fluid" style="height: 300px;"></div>
                                            </a>
                                            <div class="wishlist-sign"><a href="#" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                        </div>
                                    </div>
                           
                                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 pl-0">
                                        <div class="vendor-content">
                           
                                        <h2 class="vendor-title"><a href="#" class="title">
                                                    <?php echo $row['vendor_name'] ?>
                                                </a></h2>
                                            <p class="vendor-address">
                                                <?php echo $row['vendor_name'] ?>
                                            </p>
                           
                                        </div>
                                        <div class="vendor-meta m-0">
                                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                                <span class="vendor-price">
                                                    $150
                                                </span>
                                                <span class="vendor-text">Start From</span>
                                            </div> -->
                                            <!--<div class="vendor-meta-item vendor-meta-item-bordered">
                                                <span class="vendor-guest">
                                                    120+
                                                </span>
                                                <span class="vendor-text">Guest</span>
                                            </div>
                                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                                <span class="rating-star">
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rate-mute"></i>
                                                </span>
                                                <span class="rating-count vendor-text">(20)</span>
                                            </div>
                                        </div>
                                    
                                        <p>
                                            <a href="vendor-details.php?vendor_id=<?php echo $row['vendor_id'] ?>" class="btn btn-primary m-4 mb-0">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="vendor-thumbnail">
                            <!-- Vendor thumbnail -->
                            <div class="vendor-img zoomimg">
                                <!-- Vendor img -->
                                <a href="vendor-details.php?vendor_id=<?php echo $row['vendor_id'] ?>"><img src="./admin/uploads/<?php echo $row['vendor_image'] ?>" alt="" class="img-fluid" style="height: 300px;"></a>
                        
                            </div>
                            <!-- /.Vendor img -->
                            <div class="vendor-content">
                                <!-- Vendor Content -->
                                <h2 class="vendor-title"><a href="vendor-details.php?vendor_id=<?php echo $row['vendor_id'] ?>" class="title"><?php echo $row['vendor_name'] ?></a></h2>
                                <!-- <p class="vendor-address">Ahmedabad, Gujarat.</p> -->
                            </div>
                           
                            
                            <!-- /.Vendor Content -->
                        </div>
                        <!-- /.Vendor thumbnail -->
                    </div>

         
                            <!-- /.Vendor thumbnail -->
                    <?php
                        }
                    } else {
                        echo "<h4>No Records</h4>";
                    }
                    ?>

                    <!-- /.paginations -->
                </div>
            </div>

        </div>
    </div>
    <!-- social-media-section -->
    
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