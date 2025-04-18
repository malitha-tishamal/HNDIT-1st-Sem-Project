<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-head.png">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/log-in-out.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Learninglk - Student Register</title>
</head>
<body>

    <div class="user">
        <div class="top-box align3">&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="images/icon.png" width="200px" height="60px"></div>

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
            <p>Already have an account? <a href="#">Sign in</a></p>
           
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
                <input type="text" id="ajest-input" name="username" placeholder="username" required>
                <input type="password" id="ajest-input" name="password" placeholder="password" required>
                <button class="social-btn">Forgot Password ?</button>
                <button type="submit" name="sub12" class="signup-btn width-ajest2">Log In</button>
            </form>
            
        </div>
    </div>


    <!--Log out content -->
    <div id="id02" class="modal">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
      <div class="signup-container modal-content">
            <h1>Sign Up</h1>
            <p>Already have an account? <a href="#">Log in</a></p>
           
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
                By signing up you agree to our <a href="#">Terms of Service
                    <br>
                </a> and <a href="#">Privacy Policy</a>
                <br><br>
                <input type="checkbox" checked>
                Email me with news and updates
            </p>
        </div>
    </div>


    
    <div class="navig-bar">
        <a  href="index.php">
            <i class="fa fa-home"></i> Home
        </a>
        <a href="news.php">
            <i class="fa fa-newspaper-o"></i> News
        </a>
        <div class="dropdown">
            <button class="dropdown-btn">
                <i class="fa fa-download"></i> Downloads 
            </button>
            <div class="dropdown-contents">
                <a href="#"><i class='fa fa-coffee' style='color:red'></i> Java Programming</a>
                <a href="#"><i class="fa fa-code" style="color:orange"></i> Python Programming</a>
                <a href="#"><i class="fa fa-code" style="color:blue"></i> Web Programming</a>
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
        <a href="#" style="background-color: red;">
            <i class="fa fa-user-secret"></i> Register
        </a>
    </div>


   <div class="form-content">
    <div>
        <div class="align8"> 
            <form method="get" action="update-time.php"> 
                <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Class Time :</label>
                    <br>
                    <input type="text" class="apply5" name="course_time" placeholder="E.g: 9.30 P.M." >
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form>
            <form method="get" action="update-date.php">  
               <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Start Date :</label>
                    <br>
                    <input type="text" class="apply5" name="course_date" placeholder="yyyy/mm/dd">
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form>
            <form method="get" action="update-month.php">  
                <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Duration Months :</label>
                    <br>
                    <input type="text" class="apply5" name="duration_months" placeholder="E.g.- 8 Months " required>
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form>
        </div>
        <div class="align8"> 
            <form method="get" action="update-hours.php">  
                <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Class Hours :</label>
                    <br>
                    <input type="text" class="apply5" name="duration_hours" placeholder="E.g.- 120 Hours" >
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form>
            <form method="get" action="update-type.php">  
                <div class="align7">
                     <label>
                    <i class="fa fa-user icon"></i>
                    Course Type :</label>
                    <br>
                    <input type="text" class="apply5" name="course_type" placeholder="E.g.- Online | Instatute" >
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form>
            <form method="get" action="update-batch.php">  
                <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Students Batch :</label>
                    <br>
                    <input type="number" class="apply5" name="students" placeholder="E.g.- 20">
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form> 
        </div>
        <div class="align8"> 
            <form method="get" action="update-payments.php">  
                <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Course payments :</label>
                    <br>
                    <input type="text" class="apply5" name="payments" placeholder="E.g.- 15000 (5000x3)" >
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form> 
            <form method="get" action="update-link.php">  
                <div class="align7">
                    <label>
                    <i class="fa fa-user icon"></i>
                    Class Link :</label>
                    <br>
                    <textarea name="link"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="Submit" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
    </div>

    <br>

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
            <div >
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-pinterest"></a>
                <a href="#" class="fa fa-snapchat-ghost"></a>
            </div>
            <div class="font-apply2">
                <i class="fa fa-phone" style="font-size:20px;"></i>
                0412225554
            </div>
        </div>

        <div class="box1">
            <div style="font-size: 20px; padding:0px 0px 10px 0px;">
                <i class="fa fa-newspaper-o"></i>
                POPULAR NEWS
            </div>
            <a href="news.php">
                <div class="footer-news">
                    <mark class="color4">Robotics</mark> 2024.09.10
                    <br>
                    NEW COURSE STARTING NOV 18 <sup>th</sup>
                </div>
            </a>
            <a href="news.php">
                <div class="footer-news">
                    <mark class="color4">Java</mark> 2024.09.08 
                    <br>
                    NEW 6<sup>th</sup> BATCH STARTING NOV 9
                </div>
            </a>
            <a href="news.php">
                <div class="footer-news">
                    <mark class="color4">Python</mark> 2024.06.06 
                    <br>
                    NEW 5<sup>th</sup> BATCH STARTING OCT 6
                    <br>
                </div>
            </a>
        </div>
        
        <div class="box1">
            <div style="font-size: 20px;padding-bottom:10px;">
                <i class="fa fa-puzzle-piece"></i> 
                CATEGORIES
            </div>
                <mark class="color5">Java</mark>
                <mark class="color5">Web Design</mark>
                <br><br>
                <mark class="color5">Python</mark>
                <mark class="color5">Robotics</mark>
                <br><br>
                <mark class="color5">C#</mark>
                <mark class="color5">C++</mark>
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