<?php
session_start();
?>
<?php include("connect.php");?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/icon-head.png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/admin2.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/forms.css">
	<link rel="stylesheet" type="text/css" href="css/log-in-out.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Learninglk - Admin</title>
	<style type="text/css">
		#admin-user{
			height: 38px;		
		}
		#admin-user:focus{
			border: 2px solid black;
		}
		#ajest-input2{
			width: 180px;
			height: 30px;
			padding: 8px;
			margin: 0px 8px 0px 8px;
		}
		.updatedta{
			font-weight: bold;
			font-size: 12px;
			color: red;
		}
	</style>
</head>
<body>

	<div class="user">
        <div class="top-box align3">&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php"><img src="images/icon.png" width="200px" height="60px"></a></div>

        <div class="top-box"></div>

        <div class="top-box output-align ">             
            
            <?php
                if (isset($_POST["sub12"])) {           
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    if ($username =="admin@elk.com" && $password =="1234") {
                        echo "<div ><img src='images/admin2.jpg' width='55px'></div>";
                        echo "<div class='success'> Log in Successfull! <br> As Admin. Wellcome! </div>";
                        $_SESSION["user"]="Admin";
                    }
                   
                    else{
                        echo "<div ><img src='images/error.png' width='50px'></div>";
                        echo "<div class='error'> Invalid Credentials! <br>  Please Cheak Again! </div>";
                        }
                    }
            ?>

            <?php
                     if(isset($_GET['sign'])){
                        if ($_GET['sign']== 1) {
                        	echo "<div ><img src='images/success.png' width='55px'></div>";
                            echo "<div class='success'>New Account Create Successfull</div>";
                        }
                        if ($_GET['sign']== 0) {
                        	echo "<div ><img src='images/error.png' width='50px'></div>";
                            echo "<div class='error'>New Account Create Unsuccessfull</div>";
                        }
                    }
            ?>
            <?php
                     if(isset($_GET['send'])){
                        if ($_GET['send']== 1) {
                        	echo "<div ><img src='images/success.png' width='55px'></div>";
                            echo "<div class='success'>Update Successfull</div>";
                        }
                        if ($_GET['send']== 0) {
                        	echo "<div ><img src='images/error.png' width='50px'></div>";
                            echo "<div class='error'>Update Unsuccessfull</div>";
                        }
                    }
            ?>


        </div>

        <div class="top-box align4">
	        <button class="main login" onclick="document.getElementById('id01').style.display='block'">
        	<i class="fa fa-fw fa-user"></i>Login
	        </button>
	        <button class="main signup" onclick="document.getElementById('id02').style.display='block'" >
        	<i class="fa fa-sign-in"></i>SignUp
        </button>
        </div>
    </div>


    <!--Log in content -->
    <div id="id01" class="modal">
	  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	  
	  <div class="signup-container modal-content">
	        <h1>Log In</h1>
	        <p>Don't have an Account? <span onclick="signform()">Sign in</span></p>
	       
	        <div class="social-signup">
	            <button class="social-btn">Google
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	            	<img src="images/google.png" width="20px">
	            </button>
	            <button class="social-btn">Facebook
	            	&nbsp;&nbsp;&nbsp;
	            	<img src="images/facebook2.png" width="20px">
	            </button>
	        </div>  
	        <div class="social-signup">
	            <button class="social-btn">Instagram
	            	&nbsp;&nbsp;&nbsp;
	            	<img src="images/ins.jpg" width="20px">
	            </button>
	            <button class="social-btn">Github
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	            	<img src="images/github.png" width="20px">
	            </button>
	        </div>
	        
	        <div class="divid">OR</div>
	        
	        <form class="signup-form" method="post">
	            <input type="text" id="admin-user" name="username" placeholder="email" required>
	            <input type="password" id="ajest-input" name="password" placeholder="password" required>
	            <button class="social-btn">Forgot Password ?</button>
	            <button type="submit" name="sub12" class="signup-btn width-ajest2">Log In</button>
	        </form>
	        
	    </div>
	</div>
	
	<!--sign in content -->
	<div id="id02" class="modal">
	  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
	  
	  <div class="signup-container modal-content">
	        <h1>Sign Up</h1>
	        <p>Already have an account? <span onclick="loginform()">Log in</span></p>
	       
	        <div class="social-signup">
	            <button class="social-btn">Google
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	            	<img src="images/google.png" width="20px">
	            </button>
	            <button class="social-btn">Facebook
	            	&nbsp;&nbsp;&nbsp;
	            	<img src="images/facebook2.png" width="20px">
	            </button>
	        </div>  
	        <div class="social-signup">
	            <button class="social-btn">Instagram
	            	&nbsp;&nbsp;&nbsp;
	            	<img src="images/ins.jpg" width="20px">
	            </button>
	            <button class="social-btn">Github
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	            	<img src="images/github.png" width="20px">
	            </button>
	        </div>
	        
	        <div class="divid">OR</div>
	        
	        <form class="signup-form" method="get" action="entry3.php">
	            <input type="email" id="ajest-input" name="email" placeholder="email" required>
	            <input type="password" id="ajest-input" name="password" placeholder="password" required>
	            <input type="text" id="ajest-input" name="first_name" placeholder="first name" required>
	            <input type="text" id="ajest-input" name="last_name" placeholder="last name" required>
	            <input type="submit" value="SignUp" class="signup-btn width-ajest1">
	        </form>
	        
	        <p class="terms">
	            By signing up you agree to our <a href="#" >
	            <span class="policy">Terms of Service</span><br>
	            </a> and <a href="#" ><span class="policy">Privacy Policy</span></a><br>
	            <br><br>
	            <span class="policy">
	            <input type="checkbox" checked ></span>
	            Email me with news and updates
	        </p>
	    </div>
	</div>

	<script type="text/javascript">
		function signform(){
				document.getElementById('id01').style.display='none';
				document.getElementById('id02').style.display='block';
			}
			function loginform(){
				document.getElementById('id02').style.display='none';
				document.getElementById('id01').style.display='block';
			}
	</script>

	<script type="text/javascript" src="js/user.js"></script>
	
	<div class="navbar">
		<a  href="index.php">
			<i class="fa fa-home"></i> Home
		</a>
		<a href="Store.php">
 			<i class="fa fa-newspaper-o"></i> Store
 		</a>
 		<a href="news.php">
 			<i class="fa fa-newspaper-o"></i> News
 		</a>
 		<div class="dropdown">
 			<button class="dropdown-btn">
 				<i class="fa fa-download"></i> Downloads 
 			</button>
   			<div class="dropdown-contents">
                <a href="java-download.php"><i class='fa fa-coffee' style='color:red'></i> Java Programming</a>
                <a href="python-download.php"><i class="fa fa-code" style="color:orange"></i> Python Programming</a>
                <a href="web-download.php"><i class="fa fa-code" style="color:blue"></i> Web Programming</a>
            </div>
 		</div>
 		<a href="courses.php">
 			<i class="fa fa-clone"></i> Courses
 		</a>
 		<a href="contact.php">
            <i class="fa fa-envelope"></i> Contact
        </a>
 		<a href="#" style="background-color: red;">
 			<i class="fa fa-user-circle-o"></i> Admin
 		</a>
 		<a href="Register.php">
 			<i class="fa fa-user-circle-o"></i> Register
 		</a>
 		<form method="post">
 			<input type="submit" value="Log Out" name="sub13" class="log-out-btn">
 		</form>		
    </div>
 
	<?php
	//remove admin access
		if (isset($_POST["sub13"])) {
			// remove all session 
			session_unset();
			// destroy the session
			//session_destroy();								
		}
	?>

	<?php
	 if (isset($_SESSION["user"])) {
	 	# code...
	?>
				
    <div class="conent-box">
    	<div class="subcontent-box1">
    		<form  method="post">
    			<div class="sidenav">
	    			  <div class="dash-intro">
		    			 <div>
		    			 	<img src="images/admin2.jpg" class="dash-img">
		    			 </div>
		    			 <div class="dash-heading">Admin Dashbord</div>
	    			  </div>
	    			  <div class="dash-btn ajest2" onclick="myFunction()"> <i class="fa fa-line-chart"></i> Status</div>
					  <div>
					  	<button class="dash-btn ajest1" name="sub1"><i class="fa fa-rss"></i> All Register Data</button>
					  </div>
					  <div>
					  	<button class="dash-btn ajest1" name="sub4"><i class='fa fa-coffee'></i> Java Registed</button>
					  </div>
					  <div>
					  	<button class="dash-btn ajest1" name="sub5"><i class="fa fa-file-code-o"></i> Web Registed</button>
					  </div>
					  <div>
					  	<button class="dash-btn ajest1" name="sub6"><i class="fa fa-file-code-o"></i> Python Registed</button>
					  </div>
					  <div>
					  	<button class="dash-btn ajest1" name="sub7"><i class="fa fa-rss"></i> All Contact Us Data </button>
					  </div>
					  <div class="dash-btn ajest2" id="serchbtn"> <i class="fa fa-search"></i> Search Manually</div>
					  <div class="dash-btn ajest2" id="addbtn"> <i class="fa fa-keyboard-o"></i> Add New Course</div>
					  <div class="dash-btn ajest2" id="updatebtn"> <i class="fa fa-wrench"></i> Update Course Data</div>
					  
				</div>
    		</form>
    	</div>

    <div class="subcontent-box2">
    	<div class="subcontent-box3">
    		
    	</div>
    	<div class="subcontent-box3"></div>
    	<div class="subcontent-box3">
    		<?php

	    	if(isset($_POST['sub'])){
	    			$nic_no = $_POST['nic_no'];
	    			$query = "SELECT * FROM students WHERE nic_no ='$nic_no'";
	    			$result = mysqli_query($con,$query);

	    			if(mysqli_num_rows($result)==0){
	    				echo "No Relult ";
	    			}
	    			else{

						echo "<table border='2'>

							<tr>
								<th>Name</th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td>" .$row['java']."</td>";
		    				echo "<td>" .$row['web']."</td>";
		    				echo "<td>" .$row['python']."</td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";
	    				}
	    			}
	    		}

	    		if(isset($_POST['sub1'])){
	    		    if ($con) {
		    			$query = "SELECT * FROM students";
		    			$result = mysqli_query($con,$query);

		    			echo "<table border='2'>

							<tr>
								<th>Name</th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td>" .$row['java']."</td>";
		    				echo "<td>" .$row['web']."</td>";
		    				echo "<td>" .$row['python']."</td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";
		    			}
		    			
		    		}
		    	}

		    	if(isset($_POST['sub2'])){
	    			$city = $_POST['city'];
	    			$query = "SELECT * FROM students WHERE city ='$city'";
	    			$result = mysqli_query($con,$query);

	    			if(mysqli_num_rows($result)==0){
	    				echo "No Relult ";
	    			}
	    			else{
	    				echo "<table border='2'>

							<tr>
								<th>Name</th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td>" .$row['java']."</td>";
		    				echo "<td>" .$row['web']."</td>";
		    				echo "<td>" .$row['python']."</td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";
	    				}
	    			}
	    		}
	    		

		    	if(isset($_POST['sub3'])){
	    			$name = $_POST['name'];
	    			$query = "SELECT * FROM students WHERE name ='$name'";
	    			$result = mysqli_query($con,$query);
	    			if(mysqli_num_rows($result)==0){
	    				echo "No Relult ";
	    			}
	    			else{
	    				echo "<table border='2'>

							<tr>
								<th>Name</th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td>" .$row['java']."</td>";
		    				echo "<td>" .$row['web']."</td>";
		    				echo "<td>" .$row['python']."</td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";
	    				}
	    			}
	    		}


	    		if(isset($_POST['sub4'])){
	    		    if ($con) {
		    			$query = "SELECT * FROM students WHERE java = 15000";
		    			$result = mysqli_query($con,$query);
		    			echo "<table border='2'>

							<tr>
								<th><mark>Name</mark></th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td><mark>" .$row['java']."</mark></td>";
		    				echo "<td>" .$row['web']."</td>";
		    				echo "<td>" .$row['python']."</td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";
		    			}
		    			
		    		}
		    	}
		     
			    if(isset($_POST['sub5'])){
		    		    if ($con) {
			    			$query = "SELECT * FROM students WHERE web = 10000";
			    			$result = mysqli_query($con,$query);
			    			echo "<table border='2'>

							<tr>
								<th><mark>Name<mark></th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td>" .$row['java']."</td>";
		    				echo "<td><mark>" .$row['web']."</mark></td>";
		    				echo "<td>" .$row['python']."</td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";		    			
			    		}
			    	}
			    }

			    if(isset($_POST['sub6'])){
		    		    if ($con) {
			    			$query = "SELECT * FROM students WHERE python = 12000";
			    			$result = mysqli_query($con,$query);
			    			echo "<table border='2'>

							<tr>
								<th><mark>Name<mark></th>
								<th>NIC No</th>
								<th>E-Mail</th>
								<th>Number</th>
								<th>Age</th>
								<th>Gender</th>
								<th>City</th>
								<th>Java</th>
								<th>Web</th>
								<th>Python</th>
								<th>Class</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['name']."</td>";
		    				echo "<td>" .$row['nic_no']."</td>";
		    				echo "<td>" .$row['email']."</td>";
		    				echo "<td>" .$row['number']."</td>";
		    				echo "<td>" .$row['age']."</td>";
		    				echo "<td>" .$row['gender']."</td>";
		    				echo "<td>" .$row['city']."</td>";
		    				echo "<td>" .$row['java']."</td>";
		    				echo "<td>" .$row['web']."</td>";
		    				echo "<td><mark>" .$row['python']."<mark></td>";
		    				echo "<td>" .$row['class']."</td>";
		    				echo "</tr>";		    			
			    		}
			    	}
			    } 

			    if(isset($_POST['sub7'])){
				    if ($con) {
		    			$query = "SELECT * FROM contact";
		    			$result = mysqli_query($con,$query);
		    			echo "
		    			<table border='2'>
							<tr>
								<th>Name</th>
								<th>E-Mail</th>
								<th>Date</th>
								<th>Number</th>
								<th>Message</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['sd_name']."</td>";
		    				echo "<td>" .$row['sd_email']."</td>";
		    				echo "<td>" .$row['sd_date']."</td>";
		    				echo "<td>" .$row['sd_number']."</td>";
		    				echo "<td>" .$row['sd_message']."</td>";
		    				echo "</tr>";	    			
			    		}
			    	}
			    }

			   if(isset($_POST['sub8'])){
		    			$sd_date = $_POST['sd_date'];
		    			$query = "SELECT * FROM contact WHERE sd_date ='$sd_date'";
		    			$result = mysqli_query($con,$query);
		    			if(mysqli_num_rows($result)==0){
		    				echo "No Relult ";
		    			}
		    			else{
		    				echo "<table border='2'>;

							<tr>
								<th>Name</th>
								<th>E-Mail</th>
								<th>Date</th>
								<th>Number</th>
								<th>Message</th>
							</tr>";

		    			while ($row = mysqli_fetch_array($result)) {

		    				echo "<tr>";
		    				echo "<td>" .$row['sd_name']."</td>";
		    				echo "<td>" .$row['sd_email']."</td>";
		    				echo "<td>" .$row['sd_date']."</td>";
		    				echo "<td>" .$row['sd_number']."</td>";
		    				echo "<td>" .$row['sd_message']."</td>";
		    				echo "</tr>";
		    				}
		    			}
		    		}
    		?>
    	</div>
    	<div class="subcontent-box3">
    		<div id="dbscreen">
    		<h2>Total Summery</h2>
    		<div id="dbbox">
    			<div class="db-details">
    				<div class="db-hedding">Total Register</div>
    				<?php
		    			$sql = "SELECT count(*) FROM students "; 
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo '<div class = "db-count">'.$row['count(*)'].'</div>';  
							} 
		    			?>
    			</div>

    			<div class="db-details">
    				<div class="db-hedding">Total Masseages</div>
    				<?php
		    			$sql = "SELECT count(*) FROM contact "; 
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo '<div class = "db-count">'.$row['count(*)'].'</div>'; 
							} 
		    			?>
    			</div>

    			<div class="db-details">
    				<div class="db-hedding">Total Courses</div>
    				<?php
		    			$sql = "SELECT count(*) FROM courses "; 
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo '<div class = "db-count">'.$row['count(*)'].'</div>';  
							} 
		    			?>
    			</div>

    			<div class="db-details">
    				<div class="db-hedding">Total Signups</div>
    				<?php
		    			$sql = "SELECT count(*) FROM account "; 
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo '<div class = "db-count">'.$row['count(*)'].'</div>';  
							} 
		    			?>
    			</div>
    		</div>

    		<h2>Course Register Count</h2>

    		<div id="dbbox">
    			<div class="db-details">
    				<div class="db-hedding">Java Register</div>
    				<?php
		    			$sql = "SELECT count(*) FROM students WHERE java = 15000 "; 
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo '<div class = "db-count">'.$row['count(*)'].'</div>';   
							} 
		    			?>
    			</div>

    			<div class="db-details">
    				<div class="db-hedding">Web Register</div>
    				<?php
		    			$sql = "SELECT count(*) FROM students WHERE web = 10000 "; 
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo '<div class = "db-count">'.$row['count(*)'].'</div>';   
							} 
		    			?>
    			</div>

    			<div class="db-details">
    				<div class="db-hedding">Python Register</div>
    				<?php
		    			$sql = "SELECT count(*) FROM students WHERE python = 12000";
							$result = $con->query($sql); 
							  
							// Display data on web page 
							while($row = mysqli_fetch_array($result)) { 
							    echo "<div class = 'db-count'>".$row['count(*)']."</div>";  
							} 
		    			?>
    			</div>
    			<div class="db-details">
    				<div class="db-hedding">IOT Register</div>
    				<?php
			    			$sql = "SELECT count(*) FROM students WHERE iot = 12000";
								$result = $con->query($sql); 
								  
								//Display data on web page 
								while($row = mysqli_fetch_array($result)) { 
							    echo "<div class = 'db-count'>".$row['count(*)']."</div>";  
							} 
		    			?>
    			</div>
    		</div>

			<div id="dbbox">
    			<div class="db-details">
	    				<div class="db-hedding">C# Register</div>
	    				<?php
			    			$sql = "SELECT count(*) FROM students WHERE c1 = 12000";
								$result = $con->query($sql); 
								  
								// Display data on web page 
								while($row = mysqli_fetch_array($result)) { 
							    echo "<div class = 'db-count'>".$row['count(*)']."</div>";  
							} 
		    			?>
	    		</div>   			
    		</div>
    	</div>
    	</div>
    	<div class="subcontent-box3">
    		<div id="inputdta">
    			<form method="post">
    				<div class="heading-serch">Search Manually</div>
    				<input type="text" style="width: 25%;" placeholder="Search by NIC No" name="nic_no">
		    		<input type="submit" class="dta-btn" value="Search" name="sub">

		    		<select name="city" >
		    			<option >Search by City</option>
		    			<option value="Matara">Matara</option>
		    			<option value="Galle">Galle</option>
		    			<option value="Hambanthot">Hambantota</option>
		    		</select>
		    		<input type="submit" class="dta-btn" value="Search" name="sub2">

		    		<input type="text" style="width: 25%;" placeholder="Search by Students Name" name="name">
		    		<input type="submit" class="dta-btn" value="Search" name="sub3">
		    	</form>
    		</div>

    		<div id="updatecourse">
				<div class="align8"> 
				    <form method="get" action="update-time.php"> 			
				        <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Course Time</div>
					        <div style="padding: 10px;">
						        <lable class="updatedta">Course ID * :</label><br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- java" required>
						        <label>
					            <i class="fa fa-user icon"></i>
					            Class Time :</label>
					            <input type="text" id="apply6" name="course_time" placeholder="e.g: 9.30 P.M." >
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form>
				    <form method="get" action="update-date.php">  
				       <div class="form-container2 ajest-form4">
				       	<div class="heding2">Update Course Date</div>
					       	<div style="padding: 10px;">
					       		<lable class="updatedta">Course ID * :</label><br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- Java" required>
					            <label>
					            <i class="fa fa-user icon"></i>
					            Start Date :</label>
					            <input type="date" id="apply6" name="course_date" placeholder="yyyy/mm/dd">
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					         </div>
				        </div>
				    </form>
				    <form method="get" action="update-month.php">  
				        <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Duration Months</div>
				        	<div style="padding: 10px;">
					        	<lable class="updatedta">Course ID * :</label><br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- Java" required>
					            <label>
					            <i class="fa fa-user icon"></i>
					            Duration Months :</label>
					            <input type="text" id="apply6" name="duration_months" placeholder="e.g.- 8 Months " required>
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form>
				</div>
				<div class="align8"> 
				    <form method="get" action="update-hours.php">  
				        <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Duration Hours</div>
				        	<div style="padding: 10px;">
					        	<lable class="updatedta">Course ID * :</label><br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- java" required>
					            <label>
					            <i class="fa fa-user icon"></i>
					            Class Hours :</label>
					            <input type="text" id="apply6" name="duration_hours" placeholder="e.g.- 120 Hours" >
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form>
				    <form method="get" action="update-type.php">  
				        <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Cours Type</div>
				        	<div style="padding: 10px;">
					        	<lable class="updatedta">Course ID * :</label>
		                        <br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- Java" required>
					             <label>
					            <i class="fa fa-user icon"></i>
					            Course Type :</label>
					            <input type="text" id="apply6" name="course_type" placeholder="e.g.- Online | Instatute" >
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form>
				    <form method="get" action="update-batch.php">  
				        <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Student Sheets</div>
				        	<div style="padding: 10px;">
					        	<lable class="updatedta">Course ID * :</label><br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- Java" required>
					            <label>
					            <i class="fa fa-user icon"></i>
					            Students Batch :</label>
					            <input type="number" id="apply6" name="students" placeholder="e.g.- 20">
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form> 
				</div>
				<div class="align8"> 
				    <form method="get" action="update-payments.php">  
				         <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Course Payments</div>
				        	<div style="padding: 10px;">
					        	<lable class="updatedta">Course ID * :</label>
		                        <br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- Java" required>
					            <label>
					            <i class="fa fa-user icon"></i>
					            Course payments :</label>
					            <input type="text" id="apply6" name="payments" placeholder="e.g.- 15000 (5000x3)">
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form> 
				    <form method="get" action="update-link.php">  
				        <div class="form-container2 ajest-form4">
				        	<div class="heding2">Update Class Link</div>
				        	<div style="padding: 10px;">
					        	<lable class="updatedta">Course ID * :</label><br>
		                        <input type="text" id="apply6" name="course_id" placeholder="e.g.- Java" required>
					            <label>
					            <i class="fa fa-user icon"></i>
					            Class Link :</label>
					            <textarea name="link" style="width: 150px;"></textarea>
					            <input type="submit" class="submitbtn" name="submit" value="Update">
					        </div>
				        </div>
				    </form>
				</div>
    	</div>
    	<div class="subcontent-box3">
    		<div id="addcourse">
    			<div class="form-container ajest-form3">
                <div class="hedding">Add Course</div>
    			<form method="get" action="entry4.php">  
	                <div class="align8">
	                	<div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Course ID <font color="red">*</font> :</label>
	                        <input type="text" id="ajest-input2" name="course_id" placeholder="e.g.- Java" required>
	                    </div>
	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Course Name <font color="red">*</font> :</label>
	                        <input type="text" id="ajest-input2" name="course_name" placeholder="e.g.- Java Programming" required>
	                    </div>

	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Class Time <font color="red">*</font> :</label>
	                        <input type="time" id="ajest-input2" name="course_time"  required>
	                    </div>
	                </div><br>
	                <div class="align8">
	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Start Date <font color="red">*</font> :</label>
	                        <input type="date" id="ajest-input2" name="course_date" required>
	                    </div>
	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                         Duration Months <font color="red">*</font> :</label>
	                        <input type="text" id="ajest-input2" name="duration_months" placeholder="e.g.- 8 Months " required>
	                    </div>

	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                         Duration Hours<font color="red">*</font> :</label>
	                        <input type="text" id="ajest-input2" name="duration_hours" placeholder="e.g.- 120 hours " required>
	                    </div>
	                </div><br>
	                <div class="align8">
	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Course Type <font color="red">*</font> :</label>
	                        <input type="text" id="ajest-input2" name="course_type" placeholder="e.g.- Online | Instatute" required>
	                    </div>
	                
	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Students Batch  <font color="red">*</font> :</label>
	                        <input type="number" id="ajest-input2" name="students" placeholder="e.g.- 20" required>
	                    </div>

	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Course payments <font color="red">*</font> :</label>
	                        <input type="text" id="ajest-input2" name="payments" placeholder="e.g.- 15000 (5000x3)" required>
	                    </div>
	                </div><br>
	                <div class="align8">
	                    <div class="align10">
	                        <label>
	                        <i class="fa fa-user icon"></i>
	                        Class Link <font color="red">*</font> :</label>
	                        <textarea id="ajest-input2" required name="link"></textarea>
	                    </div>
	                </div><br>
	                
	                <div class="align7 sub-btn">
	                    <input type="submit" class="submitbtn" name="submit" value="Submit"> 
	                    <input type="reset" class="submitbtn" name="clear" value="Clear">   
	                </div>
	           </form>
	         </div>
	    	</div>
    	</div>
    	<div class="subcontent-box3"></div>
    </div>

    <script>

		  function myFunction() {
			  var x = document.getElementById("dbscreen");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";;
			  }
			}

        const button = document.getElementById('serchbtn');
        const inputField = document.getElementById('inputdta');

        button.addEventListener('click', () => {
            if (inputField.style.display === 'none' || inputField.style.display === '') {
                inputField.style.display = 'block'; // Show the input field	                
            } else {
                inputField.style.display = 'none'; // Hide the input field	               
            }
        });

        const button2 = document.getElementById('addbtn');
        const inputField3 = document.getElementById('addcourse');

        button2.addEventListener('click', () => {
            if (inputField3.style.display === 'none' || inputField3.style.display === '') {
                inputField3.style.display = 'block'; // Show the input field	                
            } else {
                inputField3.style.display = 'none'; // Hide the input field	               
            }
        });

        const button3 = document.getElementById('updatebtn');
        const inputField2 = document.getElementById('updatecourse');

        button3.addEventListener('click', () => {
            if (inputField2.style.display === 'none' || inputField2.style.display === '') {
                inputField2.style.display = 'block'; // Show the input field	                
            } else {
                inputField2.style.display = 'none'; // Hide the input field	               
            }
        });
	</script>
    	

    		<?php
			}
			else{
				echo "<div class='session-ban'> You Have Not Access This Page...! <br> 
						Please login to As Admin ";

						echo "<div ><img src='images/access.jpg'></div>
						<img src='images/icon.png' width='400px'></div>
					  </div>";
			}
		?>

</body>
</html>