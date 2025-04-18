<?php 
	include("connect.php");

	$name = $_GET["name"];
	$nic_no = $_GET["nic_no"];
	$email = $_GET["email"];
	$number = $_GET["number"];
	$age = $_GET["age"];
	$gender = $_GET["gender"];
	$city = $_GET["city"];
	$java = $_GET["java"];
	$web = $_GET["web"];
	$python = $_GET["python"];
	$iot = $_GET["iot"];
	$c1 = $_GET["c1"];
	$class = $_GET["class"];

	$query = "INSERT INTO students VALUES ('$name','$nic_no','$email'
		,$number,$age,'$gender','$city','$java','$web','$python','$iot','$c1','$class')";

	$result = mysqli_query($con,$query);
	if($result){
		//echo "Data Send Successfully";
		header("location:Register.php?success=1");
	}
	else{
		//echo "Data Sending Faild";
		header("location:Register.php?success=0");
	}

?>