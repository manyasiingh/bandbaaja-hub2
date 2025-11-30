<?php

$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectquery = mysqli_query($connection, "select * from tbl_user where user_email='{$email}' and user_password='{$password}'") or die(mysqli_error($connection));

    $count = mysqli_num_rows($selectquery);

    $row = mysqli_fetch_array($selectquery);



    if ($count > 0) {
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['email'] = $row['user_email'];

        header("location:index.php");
    } else {
        echo "<script>alert('email and password doesn't match')</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/couple-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:16 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Couple Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <!--jquery-ui  -->
    <link href="css/jquery-ui.css" rel="stylesheet">
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
<!-- couple-sign up -->

<body class="couple-bg-image">
    <div class="couple-form">
        <div class="container">
            <div class="row ">
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12  ">
                    <!-- couple-head -->
                    <div class="couple-head">
                        <a href="index.php"><img src="images/logo.png" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- /.couple-head -->
                    <!-- st-tab -->
                    <div class="st-tab">
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">

                            <li class="nav-item">
                                <h2> <a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab-2" aria-selected="false">Couple Login</a></h2>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="container">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                        <!-- /.form-heading-title -->
                                        <!-- register-form -->
                                        <form method="post" id="myform">
                                            <!-- form -->
                                            <div class=" container">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- login-form-heading-title  -->
                                                <h3>Sign In to Your Account</h3>
                                                <!-- /.login-form-heading-title  -->
                                                <!-- login-form-->
                                                <form method="post" id="myform">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="control-label sr-only" for="username"></label>
                                                                <input  type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter valid email" name="email" placeholder="Email" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <!-- Text input-->
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                            <div class="form-group service-form-group">
                                                                <label class="control-label sr-only" for="passwordlogin"></label>
                                                                <input  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Password" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <!--  Buttons -->
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                            <button type="submit" name="login" class="btn btn-default">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- /.login-form -->
                                                <p class="mt-2"> Are you new user? Create a New Account.<a href="couple-register.php"> <u>Click here</u></a></p>
                                                <p class="mt-2"></p><a href="index.php" class="wizard-form-small-text">
                                                    <u> Back to homepage</u></a></p>
                                            </div>
                                    </div>
                                    </form>
                                    <!--/.form -->

                                </div>
                            </div>
                        </div>
                        <!-- /.register-form -->

                        <!-- /.login-form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.couple-sign up -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jquery-ui -->
    <script src="js/jquery-ui.js"></script>
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


<!-- Mirrored from jituchauhan.com/real-wed/realwed/couple-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:16 GMT -->

</html>