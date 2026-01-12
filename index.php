<?php 
$pageTitle = "Home";
include("includes/header.php"); 
?>

<!-- Logic for Success/Error Messages from URL -->
<div class="container" style="margin-top: 20px;">
    <?php
    if(isset($_GET['sign'])){
        if ($_GET['sign']== 1) {
            echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> New Account Created Successfully</div>";
        }
        if ($_GET['sign']== 0) {
            echo "<div class='alert alert-error'><i class='fa fa-exclamation-circle'></i> New Account Creation Unsuccessful</div>";
        }
    }
    ?>
</div>

    <div class="slideshow-container" style="margin-top: 0px;">
		<div class="mySlides fade">
  			<img src="images/java-Programming2.jpg" id="banner" style="width:100%">
		</div>

		<div class="mySlides fade">
  			<img src="images/web-Programming.jpg" id="banner" style="width:100%">
		</div>
		<div class="mySlides fade">
  			<img src="images/Python-Programming1.jpg" id="banner" style="width:100%">
		</div>
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
	<script type="text/javascript" src="js/banner.js"></script>

<!-- Popular Courses Section -->
<section class="popular-courses">
    <div class="section-header">
        <h2 class="heading-tab-color">Popular Courses <i class="fa fa-line-chart"></i></h2>
    </div>

    <div class="courses-grid">
        
        <!-- Java Course Block -->
        <?php
        $query = "SELECT * FROM courses WHERE course_id = 'java'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
        ?>
        <div class="course-card java-color">
            <div class="course-header">
                <h3>Java Development</h3>
                <span class="duration"><?php echo htmlspecialchars($row[4]); ?> Months</span>
            </div>
            <div class="course-images">
                <img src="images/java.png" alt="java">
            </div>
            <div class="course-body">
                <p class="course-desc">
                    Java is popular, fast, secure, and reliable - used on 5.5 billion devices! Perfect for starting your coding journey.
                </p>
                <div class="course-features">
                    <h4>Course Content:</h4>
                    <ul>
                        <li><i class="fa fa-circle"></i> Variables & Data Types</li>
                        <li><i class="fa fa-circle"></i> User Inputs</li>
                        <li><i class="fa fa-circle"></i> Conditional Statements</li>
                        <li><i class="fa fa-circle"></i> OOP Concepts</li>
                    </ul>
                </div>
                <!-- Details from DB -->
                <div class="course-meta">
                    <div class="meta-item"><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($row[5]); ?> Hours</div>
                    <div class="meta-item"><i class="fa fa-calendar"></i> Start: <?php echo htmlspecialchars($row[3]); ?></div>
                    <div class="meta-item"><i class="fa fa-users"></i> Batch: <?php echo htmlspecialchars($row[7]); ?></div>
                    <div class="meta-item price"><i class="fa fa-tag"></i> <?php echo htmlspecialchars($row[8]); ?></div>
                </div>
                <a href="Register.php" class="register-btn">Register Now <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } ?>

        <!-- Python Course Block -->
        <?php
        $query = "SELECT * FROM courses WHERE course_id = 'python'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
        ?>
        <div class="course-card python-color">
            <div class="course-header">
                <h3>Python Development</h3>
                <span class="duration"><?php echo htmlspecialchars($row[4]); ?> Month</span>
            </div>
            <div class="course-images">
                <img src="images/pyth.png" alt="python">
            </div>
            <div class="course-body">
                <p class="course-desc">
                    Powerful and easy to learn! Used in Software, Web development, Data Science, and Machine Learning.
                </p>
                <div class="course-features">
                    <h4>Course Content:</h4>
                    <ul>
                        <li><i class="fa fa-circle"></i> Core Syntax</li>
                        <li><i class="fa fa-circle"></i> Data Structures</li>
                        <li><i class="fa fa-circle"></i> Web Frameworks</li>
                        <li><i class="fa fa-circle"></i> Automation</li>
                    </ul>
                </div>
                <div class="course-meta">
                    <div class="meta-item"><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($row[5]); ?> Hours</div>
                    <div class="meta-item"><i class="fa fa-calendar"></i> Start: <?php echo htmlspecialchars($row[3]); ?></div>
                    <div class="meta-item"><i class="fa fa-users"></i> Batch: <?php echo htmlspecialchars($row[7]); ?></div>
                    <div class="meta-item price"><i class="fa fa-tag"></i> <?php echo htmlspecialchars($row[8]); ?></div>
                </div>
                <a href="Register.php" class="register-btn">Register Now <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } ?>

        <!-- Web Course Block -->
        <?php
        $query = "SELECT * FROM courses WHERE course_id = 'web'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
        ?>
        <div class="course-card web-color">
            <div class="course-header">
                <h3>Web Development</h3>
                <span class="duration"><?php echo htmlspecialchars($row[4]); ?> Month</span>
            </div>
            <div class="course-images">
                <img src="images/web.png" alt="web">
            </div>
            <div class="course-body">
                <p class="course-desc">
                    Master the foundation of modern web. HTML, CSS, JavaScript, and PHP to create stunning websites.
                </p>
                <div class="course-features">
                    <h4>Course Content:</h4>
                    <ul>
                        <li><i class="fa fa-circle"></i> HTML5 & CSS3</li>
                        <li><i class="fa fa-circle"></i> JavaScript</li>
                        <li><i class="fa fa-circle"></i> PHP Backend</li>
                        <li><i class="fa fa-circle"></i> Database Design</li>
                    </ul>
                </div>
                <div class="course-meta">
                    <div class="meta-item"><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($row[5]); ?> Hours</div>
                    <div class="meta-item"><i class="fa fa-calendar"></i> Start: <?php echo htmlspecialchars($row[3]); ?></div>
                    <div class="meta-item"><i class="fa fa-users"></i> Batch: <?php echo htmlspecialchars($row[7]); ?></div>
                    <div class="meta-item price"><i class="fa fa-tag"></i> <?php echo htmlspecialchars($row[8]); ?></div>
                </div>
                <a href="Register.php" class="register-btn">Register Now <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } ?>

    </div>

    <div class="view-all-container">
        <a href="courses.php" class="view-all-btn">
            Click To View All Courses <i class="fa fa-rss"></i>
        </a>
    </div>
</section>

<!-- Original Footer Content Structure, Modernized -->
<footer class="main-footer">
    <div class="footer-grid">
        
        <!-- Reach Us -->
        <div class="footer-section">
            <h3><i class="fa fa-thumbs-o-up"></i> REACH US</h3>
            <div class="contact-info">
                <p><i class="fa fa-map-marker"></i> Siridhamma Mawatha, Akmeemana</p>
                <p><i class="fa fa-phone"></i> <a href="tel:+94412225554">0412225554</a></p>
            </div>
            <div style="margin-top: 1.5rem;">
                <h3 style="font-size: 0.9rem; margin-bottom: 1rem;"><i class="fa fa-rss"></i> FOLLOW US</h3>
                <div class="social-icons" style="display: flex; gap: 10px;">
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>

        <!-- Popular News -->
        <div class="footer-section">
            <h3><i class="fa fa-newspaper-o"></i> POPULAR NEWS</h3>
            <div class="news-item">
                <a href="news.php#robotic1" class="news-desc-link">
                    <span style="color: #6366f1;">Robotics</span> - <span class="text-white">2024.09.10</span><br>
                    NEW COURSE STARTING NOV 18th
                </a>
            </div>
            <div class="news-item">
                <a href="news.php#java6" class="news-desc-link">
                    <span style="color: #f87171;">Java</span> - <span class="text-white">2024.09.08</span><br>
                    NEW 6th BATCH STARTING NOV 12
                </a>
            </div>
            <div class="news-item">
                <a href="news.php#python5" class="news-desc-link">
                    <span style="color: #fb923c;">Python</span> - <span class="text-white">2024.06.06</span><br>
                    NEW 5th BATCH STARTING OCT 6
                </a>
            </div>
        </div>

        <!-- Categories -->
        <div class="footer-section">
            <h3><i class="fa fa-puzzle-piece"></i> CATEGORIES</h3>
            <div class="category-tags">
                <a href="courses.php#java" class="tag tag-java">Java</a>
                <a href="courses.php#web" class="tag tag-web">Web Design</a>
                <a href="courses.php#python" class="tag tag-python">Python</a>
                <a href="courses.php#arduino" class="tag tag-iot">Robotics</a>
                <a href="courses.php#c1" class="tag">C#</a>
                <a href="courses.php#c2" class="tag">C++</a>
            </div>
        </div>

        <!-- Find Us -->
        <div class="footer-section">
            <h3><i class="fa fa-map-marker"></i> FIND US</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.4184450925177!2d80.23076517546636!3d6.074174528220766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae17182cf82c5bf%3A0xcabc61ef94f1ad0e!2sAdvanced%20Technological%20Institute%20-%20Galle!5e0!3m2!1sen!2slk!4v1725649661855!5m2!1sen!2slk" width="100%" height="200" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
    
    <div class="footer-bottom">
        Copyright © 2024 Malitha Tishamal. All Rights Reserved.
    </div>
</footer>

</body>
</html>