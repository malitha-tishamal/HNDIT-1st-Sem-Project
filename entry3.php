<?php 
	include("connect.php");

	$email = $_GET["email"];
	$password = $_GET["password"];
	$sd_number = $_GET["sd_number"];
	$first_name = $_GET["first_name"];
	$last_name = $_GET["last_name"];

	$query = "INSERT INTO account VALUES ('$email','$password','$first_name','$last_name')";
	$result = mysqli_query($con,$query);
	if($result){
		//echo "Data Send Successfully";
		header("location:index.php?sign=1");
	}
	else{
		//echo "Data Sending Faild";
		header("location:index.php?sign=0");
	}

?>