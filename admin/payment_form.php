<?php
session_start();
if (!isset($_SESSION['id'])) {
	echo "<script>alert('login first');window.location='login.php';</script>";
}
$connection = mysqli_connect("localhost","root","","wedding_old");

if(isset($_POST['submit']))
{
    $details = $_POST['details'];
    $amt = $_POST['amt'];
    $b_id = $_POST['b_id'];
    $mode = $_POST['mode'];
   

    $q = mysqli_query($connection,"insert into tbl_payment(booking_id,payment_amount,payment_mode,payment_details) values('{$b_id}','{$amt}','{$mode}','{$details}')") or die("error in query" .mysqli_error($connection));

    if($q)
    {
       echo "<script>alert('Record inserted')</script>;";
    }
}

?>



<!DOCTYPE HTML>
<html>
<head>
<title>Wedding Vendor</title>
s<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	
<div class="main-content">

	<?php

		include './themepart/sidebar.php';

    ?>
		</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<?php

			include './themepart/header.php';

		?>
		<!-- //header-ends -->

		
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">
					
					<div class="row">
						<div class="col-md-6 validation-grids widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Payment Form</h4>
							</div>
							<div class="form-body">
								<form data-toggle="validator" id="myform" method="post">
							
								<div class="form-group">
										Booking
										<select name = "b_id" class = "form-control" required>

										<?php
										
										$q = mysqli_query($connection,"select * from tbl_booking");

										while($row = mysqli_fetch_array($q))
										{
											echo "<option value = {$row['booking_id']} > {$row['booking_name']} </option>";
										}
										?>

									  </select>


									</div>
									
									<div class="form-group">
										Payment Amount <input type="text" name="amt" pattern="[0-9]{10}" title="Please enter only numbers" class="form-control" id="inputName" placeholder="Enter amount" required>
									</div>
                                    <div class="form-group">
										Payment Mode <input type="text" name="mode" class="form-control" id="inputName" placeholder="Enter payment mode" required>
									</div>
									<div class="form-group">
										Payment Details <input type="text" name="details" class="form-control" id="inputName" placeholder="Enter payment details" required>
									</div>
									
				
									<div class="form-group">
										<button type="submit" name="submit" class="btn btn-primary disabled">Submit</button>
									</div>
								</form>
							</div>
						</div>
						
						<div class="clearfix"> </div>	
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<?php
				include './themepart/footer.php';
		?>		
		<!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
	<!--validator js-->
	<script src="js/validator.min.js"></script>
	<!--//validator js-->

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
</html>
	
