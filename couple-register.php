<?php

$connection = mysqli_connect("localhost", "root", "", "wedding_old");

if(isset($_POST['btn1'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $dob = $_POST['dob'];
    $add = $_POST['add'];
    $gender = $_POST['gender'];
    //$area = $_POST['area'];
    //$city = $_POST['city'];


    $q = mysqli_query($connection, "insert into tbl_user(user_name,user_gender,user_date_of_birth,user_email,user_password,user_address) values('{$name}','{$gender}','{$dob}','{$email}','{$pass}','{$add}')") or die("error in query" . mysqli_error($connection));

    if ($q) {
        echo "<script>alert('Record inserted')</script>;";
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
    <title>Couple Register</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
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
        <div class="container" style="max-width: 1436px">
            <div class="row ">
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12  ">
                    <!-- couple-head -->
                    <div class="couple-head">
                        <a href="index.php"><img src="images/logo.png"
                                alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- /.couple-head -->
                    <!-- st-tab -->
                    <div class="st-tab">
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">

                            <li class="nav-item">
                               <h2>

                                   <a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab"
                                   aria-controls="tab-2" aria-selected="false">Couple Register</a>
                                </h2> 
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="container">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!-- form-heading-title -->
                                        <h3>Browse 50+ vendors profile and reviews.</h3>
                                        <p>We don't post anything without your permission.</p>
                                        <!-- /.form-heading-title -->
                                        <!-- register-form -->
                                        <form method="post" id="myform">
                                            <!-- form -->
                                            <div class="container">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="control-label sr-only" for="name"></label>
                                                        <input id="name" type="text" name="name" pattern="^[A-Za-z -]+$" title="Please Enter Only Characters" placeholder="Enter Your Name"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group service-form-group">
                                                        <label class="control-label sr-only" for="email"></label>
                                                        <input id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter valid email" type="email" placeholder="Enter Your Email"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group service-form-group">
                                                        <label class="control-label sr-only"
                                                            for="passwordregister"></label>
                                                        <input id="passwordregister" type="password"  name="pass"
                                                            placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="control-label sr-only">Date Of
                                                            Birth</label>
                                                        <input id="weddingdate" name="dob" type="date"
                                                            placeholder="Enter Your Date Of Birth"
                                                            class="form-control input-md" required>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    
                                                <div class="form-group">
                                                    
                                                    <div class="form-control input-md">
                                                        <label>
                                                            Gender
                                                            <input type="radio" name="gender" value="Female" required>
                                                            Female
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="gender" value="Male" required>
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <textarea name="add" placeholder="Enter Your Address"
                                                            class="form-control input-md" required></textarea>
                                                    </div>
                                                </div>
                                                
                                                    <!-- Button -->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                        <button type="submit" name="btn1"
                                                            class="btn btn-default">Sign up</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/.form -->
                                        <p class="mt-2"> Have you subscribed? <a href="couple-login.php"
                                                class="wizard-form-small-text">
                                                <u>Login</u></a></p>
                                                <p class="mt-2"></p><a href="index.php"
                                                class="wizard-form-small-text">
                                                <u>Back to homepage</u></a></p>
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