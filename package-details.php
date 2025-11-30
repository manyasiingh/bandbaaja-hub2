<?php
$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();
$q = mysqli_query($connection, "SELECT * FROM `tbl_package` where package_id = '{$_GET['package_id']}'");
$data = mysqli_fetch_assoc($q);
$q1 = mysqli_query($connection, "SELECT * FROM `tbl_vendor` WHERE `vendor_id` = '{$data['vendor_id']}'");
$data1 = mysqli_fetch_assoc($q1);
$q2 = mysqli_query($connection, "SELECT * FROM `tbl_category` WHERE `category_id` = '{$data['category_id']}'");
$data2 = mysqli_fetch_assoc($q2);
if (isset($_POST['book'])) {
    $category_id = $_GET['package_id'];
    $booking_name = $_SESSION['name'];
    $booking_status = "Pending";
    $user_id = $_SESSION['id'];
    $booking_date = $_POST['booking_date'];
    $count = mysqli_query($connection, "SELECT * FROM `tbl_booking` WHERE `user_id` = '{$user_id}' and `category_id` = '{$category_id}' and `booking_date` = '{$booking_date}'");
    $row = mysqli_num_rows($count);
    if ($row == 0) {
        $insert = mysqli_query($connection, "INSERT INTO `tbl_booking`(`booking_name`, `booking_status`, `user_id`, `category_id`, `booking_date`) VALUES ('{$booking_name}','{$booking_status}','{$user_id}','{$category_id}','{$booking_date}')");
        if ($insert) {
            echo "<script>alert('Booking Successfully');window.location='bookings.php'</script>";
        } else {
            echo "<script>alert('Booking Faild');window.location='package-details.php?package_id=$category_id'</script>";
        }
    } else {
        echo "<script>alert('You Have already Book this package');window.location='bookings.php'</script>";
    }
}
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
                        <h1 class="page-title">Package Details</h1>
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
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Package</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About Package</li>
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
                <h3 class="card-header bg-white">About <?php echo $data['package_name'] ?> Package</h3>
                <div class="card-body">
                    <!--/.vendor-details -->
                    <!--vendor-description -->
                    <p>
                        <?php echo $data['package_details'] ?>
                    </p>
                    <div class="venue-highlights">
                        <div class=" table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo $data['package_name'] ?> Highlights</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Price</td>
                                        <td class="venue-highlight-meta"><?php echo $data['package_price'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td class="venue-highlight-meta"><?php echo $data2['category_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Vendor</td>
                                        <td class="venue-highlight-meta"><?php echo $data1['vendor_name'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <h2 class="mt-5">Book Now</h2>
                                <form method="get" action="payment-gatway.php">
                                    <input type="hidden" value="<?php echo $_GET['package_id']; ?>" class="form-control required" name="package_id">
                                    <input type="hidden" value="<?php echo $data['package_price'] ?>" class="form-control required" name="package_price">
                                    
                                    <input type="date" class="form-control required" name="booking_date" required>
                                    <input class="btn btn-primary mt-2" type="submit" name="book" value="Book Package Now">
                                </form>
                            <?php
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