<?php
session_start();
include 'admin/class/myclass.php';

if (!isset($_SESSION['id'])) {
    header("location:couple-login.php");
}

if (isset($_POST['btn1'])) {

    $details = $_POST['details'];
    $date = date('Y-m-d');
    $u_id = $_SESSION['id'];

    $q = mysqli_query($connection, "insert into tbl_feedback(feedback_details,feedback_date,user_id) values('{$details}','{$date}','{$u_id}')") or die("error in query" . mysqli_error($connection));

    if ($q) {
        echo "<script>alert('Feedback Sent')</script>;";
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
    <title>Feedback</title>
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
                        <a href="index.php"><img src="images/logo.png" alt="Wedding Vendor & Supplier Directory HTML Template " style="padding-top:30px"></a>
                    </div>
                    <!-- /.vendor head -->
                    <div class="st-tab">
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">
                            <li class="nav-item">
                                
                            </li>

                        </ul>
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">

                            <li class="nav-item">
                                <h2> <a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab-2" aria-selected="false">Feedback</a></h2>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- vendor title -->
                                    <div class="vendor-form-title">

                                    </div>
                                    <!-- /.vendor title -->
                                    <form method="post" id="myform">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="bussinessname"></label>
                                                    <input type="text" name="details" class="form-control" id="inputEmail" placeholder="Enter feedback details" data-error="Bruh, that email address is invalid" required>

                                                </div>
                                            </div>




                                            <!-- buttons -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button type="submit" name="btn1" class="btn btn-default">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="mt-2"> View Feedback ?<a href="./feedback-view.php"> <u>View</a></u></p>
                                    <p class="mt-2"></p><a href="index.php" class="wizard-form-small-text">
                                        <u> Back to homepage</u></a></p>
                                </div>
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