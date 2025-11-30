<?php

$connection = mysqli_connect("localhost", "root", "", "wedding_old");

$id = $_GET['id'];
$eq = mysqli_query($connection,"select * from tbl_package where package_id ='{$id}'");
$data = mysqli_fetch_array($eq);

if (isset($_POST['btn1'])) {
    $name = $_POST['name'];
    $details = $_POST['details'];
    $amt = $_POST['amt'];
    $img = $_FILES['image']['name'];
    $filepath = $_FILES['image']['tmp_name'];
    $c_id = $_POST['c_id'];
    $v_id = $_SESSION['id'];


    $q = mysqli_query($connection, "update  tbl_package set package_name ='{$name}',package_details ='{$details}',package_price = '{$amt}',package_image ='{$img}',category_id = '{$c_id}',vendor_id='{$v_id}' where package_id ='{$_GET['id']}'") or die("error in query" . mysqli_error($connection));

    if ($q) {
        move_uploaded_file($filepath, "uploads/" . $img);
        echo "<script>alert('Package Updated');</script>;";
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
    <style>
        .nice-select {
            width: 100%;
        }
    </style>

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
                                <h1 class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab-1" aria-selected="true">Package Edit</h1>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- vendor title -->
                                    <div class="vendor-form-title">

                                    </div>
                                    <!-- /.vendor title -->
                                    <form method="post" id="myform" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="bussinessname"></label>
                                                    <input  type="text" name="name" placeholder="Enter Your Package Name" value="<?php echo $data['package_name'] ?>" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- select -->
                                                <div class="form-group service-form-group">
                                                    <label class="control-label sr-only" for="category"></label>
                                                    <select name="c_id" class="form-control" placeholder="Category" required>
                                                        <option>Category</option>
                                                        <?php

                                                        $q = mysqli_query($connection, "select * from tbl_category");

                                                        while ($row = mysqli_fetch_array($q)) {
                                                            echo "<option value = {$row['category_id']} > {$row['category_name']} </option>";
                                                        }
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="name"></label>
                                                    <input  type="text" name="details"  value="<?php echo $data['package_details'] ?>" placeholder="Enter Your Package Details" class="form-control" required>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="name"></label>
                                                    <input  type="text" name="amt" pattern="[0-9]{10}" title="please enter only numbers"   value="<?php echo $data['package_price'] ?>" placeholder="Enter Your Package Price" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- Text input-->
                                                <div class="form-group service-form-group">
                                                    <label class="control-label sr-only" for="email"></label>
                                                    <input id="image" type="file" name="image" placeholder="Enter Your Image" class="form-control" required>
                                                </div>
                                            </div>

                                            <!-- buttons -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button type="submit" name="btn1" class="btn btn-default">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="mt-2"><a href="index.php"> back To Home</a></p>
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