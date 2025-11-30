<?php
$connection = new mysqli("localhost", "root", "", "wedding_old");
session_start();
	$id = $_GET['id'];
	$q = mysqli_query($connection,"delete from tbl_package where package_id = '{$_GET['id']}'")or die("error in query" . mysqli_error($connection));;
	if($q)
	{
		echo "<script>alert('Package deleted');window.location='your-packages.php';</script>";
	}

?>
