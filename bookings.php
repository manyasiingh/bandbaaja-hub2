<?php
$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();
    
    $data = mysqli_query($connection, "SELECT * FROM `tbl_booking` where user_id = '{$_SESSION['id']}'");

$count = mysqli_num_rows($data);
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-view-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bookings</title>
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
                        <h1 class="page-title">Bookings</h1>
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
                            <li class="breadcrumb-item active text-white" aria-current="page">Bookings</li>
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
            <div class="card border card-shadow-none">
                <h3 class="card-header bg-white">About Your Bookings</h3>
                <div class="card-body">
                    <div class="venue-highlights">
                        <div class=" table-responsive">
                            <?php
                            if ($count > 0) {
                            ?>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Package Name</th>
                                            <th scope="col">Vendor Name</th>
                                            <th scope="col" >Date</time></th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $key => $value) {
                                            $package = mysqli_query($connection, "SELECT * FROM `tbl_package` WHERE `package_id` = '{$value['category_id']}'");
                                            $pkg = mysqli_fetch_assoc($package);
                                            $vendor = mysqli_query($connection, "SELECT * FROM `tbl_vendor` WHERE `vendor_id` = '{$pkg['vendor_id']}'");
                                            $vendor = mysqli_fetch_assoc($vendor);
                                        ?>
                                            <tr>
                                                <td><?php echo $pkg['package_name'] ?></td>
                                                <td><?php echo $vendor['vendor_name'] ?></td>
                                                <td><?php echo $value['booking_date'] ?></td>
                                                <td><?php echo $pkg['package_price'] ?></td>
                                                <td><?php echo $value['booking_status'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "<h3>No Records Found</h3>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.venue-highlights -->
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