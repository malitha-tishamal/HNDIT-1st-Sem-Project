<?php 
	include("connect.php");

	$course_id = $_GET["course_id"];
	$duration_months = $_GET["course_type"];

	$query = "UPDATE courses SET course_type = '$course_type' WHERE course_id ='$course_id'";
; 
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