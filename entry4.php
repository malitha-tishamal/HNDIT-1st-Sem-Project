<?php 
	include("connect.php");

	$course_id = $_GET["course_id"];
	$course_name = $_GET["course_name"];
	$course_time = $_GET["course_time"];
	$course_date = $_GET["course_date"];
	$duration_months = $_GET["duration_months"];
	$duration_hours = $_GET["duration_hours"];
	$course_type = $_GET["course_type"];
	$students = $_GET["students"];
	$payments = $_GET["payments"];
	$link = $_GET["link"];


	$query = "INSERT INTO courses VALUES ('$course_id','$course_name','$course_time','$course_date','$duration_months','$duration_hours','$course_type','$students','$payments','$link')";
	$result = mysqli_query($con,$query);
	if($result){
		//echo "Data Send Successfully";
		header("location:admin.php?send=1");
	}
	else{
		//echo "Data Sending Faild";
		header("location:admin.php?send=0");
	}

?>