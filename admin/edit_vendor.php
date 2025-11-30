<?php
session_start();
if (!isset($_SESSION['id'])) {
	echo "<script>alert('login first');window.location='login.php';</script>";
}
$connection = mysqli_connect("localhost","root","","wedding_old");
$eid = $_GET['eid']; 


$eq = mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$eid}'") or die (mysqli_error($connection));
$editdata = mysqli_fetch_array($eq);


if(isset($_POST['submit']))
{
    $v_id = $_POST['txt1'];
    $v_name = $_POST['txt2'];
    $v_no = $_POST['txt3'];
    $v_email = $_POST['txt4'];
    $c_id = $_POST['txt5'];
    $v_pass = $_POST['txt6'];
	$v_img = $_FILES['txt7']['name'];
	$filepath = $_FILES['txt7']['tmp_name'];


    $q = mysqli_query($connection, "update tbl_vendor set vendor_name='{$v_name}',vendor_contact_no='{$v_no}',vendor_email='{$v_email}',category_id='{$c_id}',vendor_password='{$v_pass}',vendor_image='{$v_img}' where vendor_id = '{$v_id}'") or die (mysqli_error($connection));
	

    if($q)
    {
        echo "<script>alert('Package updated');window.location ='vendor_tbl.php';</script>";
		move_uploaded_file($filepath,"uploads/" .$v_img);
    }
}
?>



<!DOCTYPE HTML>
<html>
<head>
<title>Wedding Vendor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	
        <body>
    <form method="post" style="margin:150px 300px 300px 300px" enctype="multipart/form-data">

    <h2>Vendor Edit Form</h2><br><br>
    Vendor Id :<input type="text" style="" value="<?php echo $editdata['vendor_id'];?>" name="txt1" required><br><br>
    Vendor Name : <input type="text" value="<?php echo $editdata['vendor_name'];?>" name="txt2" required><br><br>
    Category Name : <input type="text" value="<?php echo $editdata['category_id'];?>" name="txt5" required><br><br>
    Vendor Contact No : <input type="text" value="<?php echo $editdata['vendor_contact_no'];?>" name="txt3" required><br><br>
    Vendor Email : <input type="text" value="<?php echo $editdata['vendor_email'];?>" name="txt4" required><br><br>
    Vendor Password: <input type="text" value="<?php echo $editdata['vendor_password'];?>" name="txt6" required><br><br>
	Vendor Image : <input type="file" style="margin: -20px 24px 3px 135px;" value="<?php echo $editdata['vendor_image'];?>" name="txt7" required><br>



    <br/>

    <input type = "submit" name="submit" value = "Update"> 

    </form>
</body>

		
		<!-- main content start-->
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
	
</body>
</html>