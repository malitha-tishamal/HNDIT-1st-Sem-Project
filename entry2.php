<?php 
	include("connect.php");

	$sd_name = $_GET["sd_name"];
	$sd_email = $_GET["sd_email"];
	$sd_date = $_GET["sd_date"];
	$sd_number = $_GET["sd_number"];
	$sd_message = $_GET["sd_message"];

	$query = "INSERT INTO contact VALUES ('$sd_name','$sd_email','$sd_date','$sd_number','$sd_message')";
	$result = mysqli_query($con,$query);
	if($result){
		//echo "Data Send Successfully";
		header("location:contact.php?datasend=1");
	}
	else{
		//echo "Data Sending Faild";
		header("location:contact.php?datasend=0");
	}

?>