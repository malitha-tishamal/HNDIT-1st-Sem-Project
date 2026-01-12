
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/icon-head.png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/downloads.css">
	<link rel="stylesheet" type="text/css" href="css/log-in-out.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Learninglk - Downloads</title>
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
						if(mysqli_num_rows($result)== 1){
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

	
	<div class="navbar">
		<a  href="index.php">
			<i class="fa fa-home"></i> Home
		</a>
		<a href="Store.php">
 			<i class="fa fa-shopping-cart"></i> Store
 		</a>
 		<a href="news.php">
 			<i class="fa fa-newspaper-o"></i> News
 		</a>
 		<div class="dropdown">
 			<button class="dropdown-btn" style="background-color: red;">
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
    <br><br>


    <div class="main-down-box">
    	<div class="python-download">
    		<h2 class="python-heding">Notes</h2>
    		<div class="down-box">
	            <div class="lable lblcolor3">Semester 1</div>
	    		<div class="content">
	    			<img src="images/course_download/python.png" width="60px">
	    			<a href="documents/zip/python.rar" target="_blank" download="file">
	    				<img src="images/course_download/zip1.png" width="65px">
	    			</a>	    		
	    		</div><br>

	    		<div class="lable lblcolor3">Semester 2</div>
	    		<div class="content">
	    			<img src="images/course_download/python.png" width="60px">
	    			<a href="documents/zip/python.rar" target="_blank" download="file">
	    				<img src="images/course_download/zip1.png" width="65px">
	    			</a>	    			
	    		</div><br>

	    		<div class="lable lblcolor3">Semester 3</div>
	    		<div class="content">
	    			<img src="images/course_download/python.png" width="60px">
	    			<a href="documents/zip/python.rar" target="_blank" download="file">
	    				<img src="images/course_download/zip1.png" width="65px">
	    			</a>	    			
	    		</div><br>

	    		<div class="lable lblcolor3">Semester 4</div>
	    		<div class="content">
	    			<img src="images/course_download/python.png" width="60px">
	    			<a href="documents/zip/python.rar" target="_blank" download="file">
	    				<img src="images/course_download/zip1.png" width="65px">
	    			</a>	    			
	    		</div>
	                
		    </div>
    	</div>

    	<div class="python-download">
    		<h2 class="python-heding">Passpapers</h2>
    		<div class="down-box">
	            <div class="lable lblcolor3">Assignment 1</div>
	    		<div class="content">
	    			<img src="images/course_download/exam.png" width="70px">
	    			<a href="documents/pdf/pdf1.pdf" target="_blank" download="file">
	    				<img src="images/course_download/pdf3.png" width="65px">
	    			</a>	    			
	    		</div><br>

	    		<div class="lable lblcolor3">Assignment 2</div>
	    		<div class="content">
	    			<img src="images/course_download/exam.png" width="70px">
	    			<a href="documents/pdf/pdf1.pdf" target="_blank" download="file">
	    				<img src="images/course_download/pdf3.png" width="65px">
	    			</a>	    			
	    		</div><br>

	    		<div class="lable lblcolor3">Assignment 3</div>
	    		<div class="content">
	    			<img src="images/course_download/exam.png" width="70px">
	    			<a href="documents/pdf/pdf1.pdf" target="_blank" download="file">
	    				<img src="images/course_download/pdf3.png" width="65px">
	    			</a>	    			
	    		</div><br>

	    		<div class="lable lblcolor3">Assignment 4</div>
	    		<div class="content">
	    			<img src="images/course_download/exam.png" width="70px">
	    			<a href="documents/pdf/pdf1.pdf" target="_blank" download="file">
	    				<img src="images/course_download/pdf3.png" width="65px">
	    			</a>	    			
	    		</div>
	                
		    </div>
    	</div>

    	<div class="python-download">
    		<h2 class="python-heding">Software</h2>
    		<div class="lable lblcolor3">Python IDE</div>
	    		<div class="content">	    			
	    			<a href="https://www.apachefriends.org/download.html" target="_blank">
	    				<img src="images/course_download/py.png" width="160px">
	    			</a>
	    		</div>
	    		<div class="lable lblcolor3">How to Install Python Windows</div>
	    		<div class="content">	    			
	    			<a href="https://www.youtube.com/watch?v=yivyNCtVVDk" target="_blank">
	    				<img src="images/course_download/python-win.jpg" width="150px">
	    			</a>
	    		</div>
	    		<div class="lable lblcolor3">How to Install Python Mac</div>
	    		<div class="content">	    			
	    			<a href="https://www.youtube.com/watch?v=nhv82tvFfkM" >
	    				<img src="images/course_download/python-mac.jpg" width="150px">
	    			</a>
	    		</div>
    		</div>
    </div>
    	


    
	<br><br>

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
</html>