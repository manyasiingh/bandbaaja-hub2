<?php
session_start();
include 'admin/class/myclass.php';

if (!isset($_SESSION['id'])) {
    header("location:couple-login.php");
}

if (isset($_POST['change_password'])) {

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email'];
    if ($new_password == $confirm_password) {
        $user = mysqli_query($connection, "select * from tbl_user where user_email='{$email}'") or die(mysqli_error($connection));
        $count_user = mysqli_num_rows($user);
        if ($count_user > 0) {
            mysqli_query($connection, "update tbl_user set user_password='{$confirm_password}' where user_email = '{$email}'") or die(mysqli_error($connection));
            echo "<script>alert('Your Password Change Successfully')</script>;";
        } else {
            $vendor = mysqli_query($connection, "select * from tbl_vendor where vendor_email='{$email}'") or die(mysqli_error($connection));
            $count_vendor = mysqli_num_rows($vendor);
            if ($count_vendor > 0) {
                mysqli_query($connection, "update tbl_vendor set vendor_password='{$confirm_password}' where vendor_email = '{$email}'") or die(mysqli_error($connection));
                echo "<script>alert('Your Password Change Successfully')</script>;";
            } else {
                echo "<script>alert('Wrong Mail ID')</script>;";
            }
        }
    } else {
        echo "<script>alert('New Password & Confirm Password Not Match')</script>;";
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:35 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BandBaaja Hub | Wedding Vendor & Supplier Directory HTML Template - Vendor Form</title>
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
<!-- vendor-form -->

<body class="vendor-bg-image">
    <!-- sign up -->
    <div class=" vendor-form">
        <div class="container">
            <div class="row ">
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12  ">
                    <!-- vendor head -->
                    <div class="vendor-head">
                        <a href="index.php"><img src="images/logo.png" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- /.vendor head -->
                    <div class="st-tab">
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">
                            <li class="nav-item">
                                <h1 class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab-1" aria-selected="true">Change Password</h1>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <form method="post" id="myform">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <input type="text" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" id="inputEmail" placeholder="Enter New Password" data-error="Bruh, that email address is invalid" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="New password and confirm password doesn't match" class="form-control"  placeholder="Confirm your Password" data-error="Bruh, that email address is invalid" required>
                                            </div>
                                        </div>
                                        <!-- buttons -->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button type="submit" name="change_password" class="btn btn-default">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <p class="mt-2"><a href="index.php"> Back To Home</a></p>
                            </div>
                            <!-- vendor-login -->

                            <!-- /.vendor-login -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.vendor-form -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js'></script>
	<script>
		$(document).ready(function() {
			$("#myform").validate();
		});
	</script>
	<style>
		.error {
			color: red;

		}
	</style>



</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:35 GMT -->

</html>