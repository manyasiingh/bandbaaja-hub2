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


<!-- Mirrored from jituchauhan.com/real-wed/realwed/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:16 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Forgot Password</title>
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
    
    <!-- /.header -->
    <div class="content" style="background-image: url(../images/couple-bg-img.jpg); height:2000% ;">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="mb30 card">
                        <div class="card-body">
                            <h2><center><u>Forgot Password</u></center></h2></a>
                            <p>Follow these simple steps to reset your account:</p>
                            <ul class="list-unstyled mb30">
                                <li>1. Enter your email address</li>
                                <li>2. Wait for your recovery details to be sent.</li>
                                <li>3. Follow as given instructions in your mail account.</li>
                            </ul>
                            <form method="post">
                                <div class="forgot-form">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input id="email" type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-default btn-block">Get New Password</button>
                                </div>
                            </form>
                            <div class="mt30">
                                <a href="vendor-login.php" class="btn-primary-link mr-3">Login </a> <a href="vendor-register.php" class="btn-primary-link">Register </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social-media-section -->
    
    <!-- /.social-media-section -->
    <!-- footer-section -->
    
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.min.js"></script>
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:16 GMT -->

</html>