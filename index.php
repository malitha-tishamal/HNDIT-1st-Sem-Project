<?php include("connect.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/icon-head.png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/banner.css">
	<link rel="stylesheet" type="text/css" href="css/log-in-out.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Learninglk - Inspire your IT knowledge</title>
</head>
<body>

	<div class="user">
        <div class="top-box align3">&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php"><img src="images/icon.png" width="200px" height="60px"></a></div>

        <div class="top-box"></div>

        <div class="top-box output-align "> 

        	

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
                if (isset($_POST["sub12"])) {    
                require("connect.php");       
                    $email=$_POST['email'];
                    $password = $_POST['password'];

                   $query = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
		    			$result = mysqli_query($con,$query);

					while($row=mysqli_fetch_array($result)){
						if(mysqli_num_rows($result)=== 1){
		    				echo "<div class='success'> Log in Successfull! <br> $row[2] Wellcome! </div>";
		    				$_SESSION["user"]="$row[2]";
		    			}
		    			else{
		    				 echo "<div class='error'> Invalid Credentials! <br>  Please Cheak Again! </div>";
		    			}
						
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
	            <input type="text" id="ajest-input" name="email" placeholder="email" required>
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
		
	<div class="navbar" id="nvg">
		<a style="background-color: red;" href="#">
			<i class="fa fa-home"></i> Home
		</a>
		<a href="Store.php">
 			<i class="fa fa-shopping-cart"></i> Store
 		</a>
 		<a href="news.php">
 			<i class="fa fa-newspaper-o"></i> News
 		</a>
 		<div class="dropdown">
 			<button class="dropdown-btn">
 				<i class="fa fa-download"></i> Downloads <i class="fa fa-caret-down"></i>
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
 		<a href="Admin.php">
 			<i class="fa fa-user-secret"></i> Admin
 		</a>
 		<a href="Register.php">
 			<i class="fa fa-user-circle-o"></i> Register
 		</a>

	 	<input type="submit" value="Log Out" name="sub" class="log-out-btn">

    </div>

    <div class="slideshow-container">
		<div class="mySlides fade">
  			<img src="images/java-Programming2.jpg" id="banner">
		</div>

		<div class="mySlides fade">
  			<img src="images/web-Programming.jpg" id="banner">
		</div>
		<div class="mySlides fade">
  			<img src="images/Python-Programming1.jpg" id="banner">
		</div>
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
	<script type="text/javascript" src="js/banner.js"></script>
	

	<div>
		<div class="heding-box">
			<div class="heding1 heading-tab-color">Populer Courses <i class="fa fa-line-chart"></i></div>
		</div>
		<div class="content">
			 <div class="content-box hed-color3">
			 	<?php
					require("connect.php");
					$query="SELECT * FROM courses WHERE course_id = 'java'";
					$result = mysqli_query($con,$query);

					while($row=mysqli_fetch_array($result)){
						echo '
	

	                <h2 class="java courses">Java Development &nbsp;&nbsp;<br>('.$row[4].' Months)</h2>
	                <div>
	                	<div class="course-banner">
		                    <img src="images/java.png" width="150px" alt="java">
		                    <img src="images/java2.jpg" width="90px" alt="java" >
	                	</div>
	                    <div class="intro">
	                        Java is popular, fast, secure, and reliable - and it’s used on over 5.5 billion devices worldwide! It’s used for developing applications for computers, laptops, data centres, games consoles, cell phones and more.This course is perfect for people who are just starting out on their Java coding journey.
	                    </div>
	                
	                    <div class="detail"><div class="inside">Course Content</div>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> Variables <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> Data Types <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> User inputs <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> Conditional Statements<br>
		                </div>

	                    <div class="dates">
	                    	Duration : '.$row[4].' Months ('.$row[5].' Hours) <br>
	                    	Start &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[3].' <br>
	                    	Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[6].'<br>
	                    	Batch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[7].' Students	<br>
	                    	Payment : '.$row[8].'	<br>
	                    	';
	               			 }
	                    ?>
	                    	<div class="btn-align3">
	                    		<a href="Register.php"><button class="link-btn btncolor1">Register Now..</button></a>
	                    	</div>
	                    </div>
	                </div>
	            </div>

	            <div class="content-box hed-color2">
	            	<?php
					require("connect.php");
					$query="SELECT * FROM courses WHERE course_id = 'python'";
					$result = mysqli_query($con,$query);

					while($row=mysqli_fetch_array($result)){
						echo '
	
	                <h2 class="pyth courses">Python Development <br>('.$row[4].' Month) </h2>
	                <div>
	                	<div class="course-banner">
		                    <img src="images/pyth.png" width="150px" alt="pyth">
		                    <img src="images/pyth.jpg" width="150px" alt="pyth">
	                    </div>
	                    <div class="intro">
	                        It’s popular. It’s powerful. It’s Python! Python is easy to learn and is used in a huge range of fields, including Software and Web development, Data science, Machine learning, Data visualisation and more. If you’re just starting out on your coding journey this course is a great choice;
	                    </div>
	                     <div class="detail"><div class="inside">Course Content</div>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> Variables <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> Data Types <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> User inputs <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> Conditional Statements<br>
		                </div>
	                    <div class="dates">
	                    	Duration : '.$row[4].' Months ('.$row[5].' Hours) <br>
	                    	Start &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[3].' <br>
	                    	Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[6].'<br>
	                    	Batch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[7].' Students	<br>
	                    	Payment : '.$row[8].'	<br>
	                    	<div class="btn-align3">
	                    	';
	               			 }
	                    ?>
	                    		<a href="Register.php"><button class="link-btn btncolor2"> Register Now..</button></a>
	                    	</div>
	                    </div>
	            	</div>
	            </div>

	            <div class="content-box hed-color1">
	            	<?php
					require("connect.php");
					$query="SELECT * FROM courses WHERE course_id = 'web'";
					$result = mysqli_query($con,$query);

					while($row=mysqli_fetch_array($result)){
						echo '
	
	                <h2 class="web courses">Web Development <br> ('.$row[4].' Month)</h2>
	                <div>
	                	<div class="course-banner">
		                    <img src="images/web.png" width="160px" alt="web">
		                    <img src="images/web.jpg" width="160px" alt="web">
	                    </div>
	                    <div class="intro">
	                        Web Development is the foundation of modern websites and applications. This course covers HTML, CSS, and JavaScript, the core technologies for building interactive and responsive web pages.Perfect for beginners, this course will give you the skills needed to create stunning websites.
	                    </div>
	                     <div class="detail"><div class="inside">Course Content</div>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> HTML <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> CSS <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> PHP <br>
		                    <i class="fa fa-circle" style="font-size: 12px"></i> JavaScript<br>
		                </div>
	                    <div class="dates">
	                    	Duration : '.$row[4].' Months ('.$row[5].' Hours) <br>
	                    	Start &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[3].'<br>
	                    	Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[6].'<br>
	                    	Batch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row[7].' Students	<br>
	                    	Payment : '.$row[8].'	<br>
	                    	<div class="btn-align3">
	                    	';
	               			 }
	                    ?>
	                    		<a href="Register.php"><button class="link-btn btncolor3">Register Now..</button></a>
	                    		
	                    	</div>
	                    </div>
	            	</div>
	            </div>
	        </div>
	        <br>
	        <a href="courses.php">
	        	<div class="link-btn2 link-btn2-color">Click To View All Courses <i class="fa fa-rss"></i></div>
	    	</a>
	</div>
	

      <div class="footer apply1">
      	<div class="box1 apply">
 
      		<i class="fa fa-thumbs-o-up"></i>
      		REACH US
      		<div class="font-apply2">
      			<i class="fa fa-map-marker" style="font-size:20px; "></i>
      			Siridhamma Mawatha, 
      			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Akmeemana
      		</div>
      		<div style="font-size: 18px;">
      			<i class="fa fa-rss"></i>
      			FOLLOW US
      		</div>
      		<div>
      			<a href="#" class="fa fa-instagram apply4"></a>
				<a href="#" class="fa fa-facebook apply4"></a>
				<a href="#" class="fa fa-linkedin apply4"></a>
				<a href="#" class="fa fa-twitter apply4"></a>
				<a href="#" class="fa fa-youtube apply4"></a>
				<a href="#" class="fa fa-google apply4"></a>
				<a href="#" class="fa fa-pinterest apply4"></a>
				<a href="#" class="fa fa-snapchat-ghost apply4"></a>
      		</div>
      		<div class="font-apply2">
      			<i class="fa fa-phone" style="font-size:20px;"></i>
      			<a href="tel:+94412225554">0412225554</a>
      		</div>
      	</div>
      	<div class="box1">
      		<div style="font-size: 20px; padding:0px 0px 10px 0px;">
      			<i class="fa fa-newspaper-o"></i>
      			POPULAR NEWS
      		</div>
      		<a href="news.php#robotic1">
      			<div class="footer-news" >
      				<mark class="color4">Robotics</mark> 
      				<span class="date">2024.09.10</span>
      				<br>
      				NEW COURSE STARTING NOV 18 <sup>th</sup></a>
      			</div>
      		
      		<a href="news.php#java6">
      			<div class="footer-news">
      				<mark class="color4">Java</mark>
      				<span class="date"> 2024.09.08 </span>
      				<br>
      				NEW 6<sup>th</sup> BATCH STARTING NOV 12</a>
      			</div>
      		
      		<a href="news.php#python5">
      			<div class="footer-news">
      				<mark class="color4">Python</mark>
      				 <span class="date">2024.06.06 </span>
      				<br>
      				NEW 5<sup>th</sup> BATCH STARTING OCT 6</a>
      				<br>
      			</div>
      		
      	</div>
      	<div class="box1">
      		<div style="font-size: 20px;padding-bottom:10px;">
      			<i class="fa fa-puzzle-piece"></i> 
      			CATEGORIES
      		</div>
      			<a href="courses.php#java"><mark class="color5">Java</mark></a>
      			<a href="courses.php#web"><mark class="color5">Web Design</mark></a>
      			<br><br>
      			<a href="courses.php#python"><mark class="color5">Python</mark></a>
      			<a href="courses.php#arduino"><mark class="color5">Robotics</mark></a>
      			<br><br>
      			<a href="courses.php#c1"><mark class="color5">C#</mark></a>
      			<a href="courses.php#c2"><mark class="color5">C++</mark></a>
      	</div>
      	<div class="box1">
      		<div style="font-size: 20px;padding-bottom:10px;">
      			<i class="fa fa-map-marker"></i>
      			FIND US
      		</div>
      		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.4184450925177!2d80.23076517546636!3d6.074174528220766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae17182cf82c5bf%3A0xcabc61ef94f1ad0e!2sAdvanced%20Technological%20Institute%20-%20Galle!5e0!3m2!1sen!2slk!4v1725649661855!5m2!1sen!2slk" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      		</iframe>
      	</div>
      </div>
      <div class="copyright-cont">
      	<hr>
      	Copyright © 2024 Malitha Tishamal. All Rights Reserved.
      	<hr>
      </div>
  </body>
</body>
</html>