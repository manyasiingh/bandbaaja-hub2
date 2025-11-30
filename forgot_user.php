<?php

$connection = new mysqli("localhost", "root", "", "wedding_old");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $selectquery = mysqli_query($connection, "select * from tbl_user where user_email ='{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);

    if ($count > 0) {
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'weddingvendor01@gmail.com';                     //SMTP username
            $mail->Password   = 'ewhyacvvbkezlvnc';                            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('weddingvendor01@gmail.com', 'sakshii');
            $mail->addAddress($email, $email);     //Add a recipient


            //Content+-
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot password';
            $mail->Body    = "hi $email your password is {$row['user_password']}";
            $mail->AltBody = "hi $email your password is {$row['user_password']}";

            $mail->send();
            echo "<script>alert('your password has been sent on your email id')</script>";
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Email not found')</script>";
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
    <title>Forgot Password</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
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
                        <a href="index.php"><img src="images/logo.png"
                                alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- /.vendor head -->
                    <div class="st-tab">
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">
                            <li class="nav-item">
                                <h2>

                                    <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">Forgot Password</a>
                                </h2>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <!-- vendor-login -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="vendor-form-title">
                                    <!--vendor-title -->
                                    <p>Follow these simple steps to reset your account:</p>
                            <ul class="list-unstyled mb30">
                                <li>1. Enter your email address</li>
                                <li>2. Wait for your recovery details to be sent.</li>
                                <li>3. Follow as given instructions in your mail account.</li>
                            </ul>
                                    </div>
                                <!--/.vendor-title -->
                                <form method="post" id="myform">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="username"></label>
                                                <input id="username" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter valid email" name="email" placeholder="Enter Your Email"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <!--buttons -->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button type="submit" name="login" class="btn btn-default">Get New Password</button>
                                        </div>
                                    </div>
                                </form>
                                        <p class="mt-2"></p><a href="index.php"
                                                class="wizard-form-small-text">
                                               <u> Back to homepage</u></a></p>
      
                            </div>

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


















</div>