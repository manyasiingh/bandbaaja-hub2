<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
	


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="row">
						<h3 class="title1">Variable Forms</h3>
						<div class="form-three widget-shadow">
							<div data-example-id="form-validation-states-with-icons"> <form> <div class="form-group has-success has-feedback"> <label class="control-label" for="inputSuccess2">Input with success</label> <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status"> <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div> <div class="form-group has-warning has-feedback"> <label class="control-label" for="inputWarning2">Input with warning</label> <input type="text" class="form-control" id="inputWarning2" aria-describedby="inputWarning2Status"> <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span> <span id="inputWarning2Status" class="sr-only">(warning)</span> </div> <div class="form-group has-error has-feedback"> <label class="control-label" for="inputError2">Input with error</label> <input type="text" class="form-control" id="inputError2" aria-describedby="inputError2Status"> <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputError2Status" class="sr-only">(error)</span> </div> <div class="form-group has-success has-feedback"> <label class="control-label" for="inputGroupSuccess1">Input group with success</label> <div class="input-group"> <span class="input-group-addon">@</span> <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status"> </div> <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span> <span id="inputGroupSuccess1Status" class="sr-only">(success)</span> </div> </form> </div>
						</div>
						<div class="form-three widget-shadow">
							<div class=" panel-body-inputin">
								<form class="form-horizontal">
									<div class="form-group">
										<label class="col-md-2 control-label">Email Address</label>
										<div class="col-md-8">
											<div class="input-group">							
												<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
												</span>
												<input type="text" class="form-control1" placeholder="Email Address">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Password</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" class="form-control1" id="exampleInputPassword1" placeholder="Password">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Email Address</label>
										<div class="col-md-8">
											<div class="input-group input-icon right">
												<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
												</span>
												<input id="email" class="form-control1" type="text" placeholder="Email Address">
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">With tooltip</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Password</label>
										<div class="col-md-8">
											<div class="input-group input-icon right">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" class="form-control1" placeholder="Password">
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">With tooltip</p>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-2 control-label">Input Addon Success</label>
										<div class="col-md-8">
											<div class="input-group input-icon right">
												<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
												</span>
												<input id="email" class="form-control1" type="text" placeholder="Email Address">
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">Email is valid!</p>
										</div>
									</div>
									<div class="form-group has-error">
										<label class="col-md-2 control-label">Input Addon Error</label>
										<div class="col-md-8">
											<div class="input-group input-icon right">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" class="form-control1" placeholder="Password">
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">Error!</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Checkbox Addon</label>
										<div class="col-md-8">
											<div class="input-group">
												<div class="input-group-addon"><input type="checkbox"></div>
												<input type="text" class="form-control1">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Checkbox Addon</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" class="form-control1">
												<div class="input-group-addon"><input type="checkbox"></div>
												
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">Checkbox on right</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Radio Addon</label>
										<div class="col-md-8">
											<div class="input-group">
												<div class="input-group-addon"><input type="radio"></div>
												<input type="text" class="form-control1">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Radio Addon</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" class="form-control1">
												<div class="input-group-addon"><input type="radio"></div>
												
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">Radio on right</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Input Processing</label>
										<div class="col-md-8">
											<div class="input-icon right spinner">
												<i class="fa fa-fw fa-spin fa-spinner"></i>
												<input id="email" class="form-control1" type="text" placeholder="Processing...">
											</div>
										</div>
										<div class="col-sm-2">
											<p class="help-block">Processing right</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Static Paragraph</label>
										<div class="col-md-8">
											<p class="form-control1 m-n">email@example.com</p>
										</div>
									</div>
									<div class="form-group mb-n">
										<label class="col-md-2 control-label">Readonly</label>
										<div class="col-md-8">
											<input type="text" class="form-control1" placeholder="Readonly" readonly="">
										</div>
									</div>
								</form>
							</div>
						</div>
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
   
</body>
</html>