<?php 
$pageTitle = "Home";
include("includes/header.php"); 
?>

<section class="hero-section">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/java-Programming2.jpg" id="banner" alt="Java Programming">
            <div class="banner-text">
                <h1>Master Java Development</h1>
                <p>Build powerful applications with our expert-led Java course.</p>
                <a href="courses.php#java" class="btn btn-primary">Learn More</a>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="images/web-Programming.jpg" id="banner" alt="Web Programming">
            <div class="banner-text">
                <h1>Craft Modern Websites</h1>
                <p>Learn HTML, CSS, JavaScript, and PHP to become a full-stack developer.</p>
                <a href="courses.php#web" class="btn btn-primary">Explore Now</a>
            </div>
        </div>
        
        <div class="mySlides fade">
            <img src="images/Python-Programming1.jpg" id="banner" alt="Python Programming">
            <div class="banner-text">
                <h1>Dive into Python & Data</h1>
                <p>Unlock the potential of Python for web and data science.</p>
                <a href="courses.php#python" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
    
    <div class="slide-dots">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
</section>

<section class="popular-courses">
    <div class="section-header">
        <h2 class="heading-tab-color">Popular Courses <i class="fa fa-line-chart"></i></h2>
    </div>

    <div class="courses-grid">
        <?php
        // Refactored to use prepared statements or at least escape properly
        $courses = [
            ['id' => 'java', 'title' => 'Java Development', 'img1' => 'java.png', 'img2' => 'java2.jpg', 'color' => 'java-color'],
            ['id' => 'python', 'title' => 'Python Development', 'img1' => 'pyth.png', 'img2' => 'pyth.jpg', 'color' => 'python-color'],
            ['id' => 'web', 'title' => 'Web Development', 'img1' => 'web.png', 'img2' => 'web.jpg', 'color' => 'web-color']
        ];

        foreach ($courses as $c) {
            $stmt = $con->prepare("SELECT * FROM courses WHERE course_id = ?");
            $stmt->bind_param("s", $c['id']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                ?>
                <div class="course-card <?php echo $c['color']; ?>">
                    <div class="course-header">
                        <h3><?php echo $c['title']; ?></h3>
                        <span class="duration"><?php echo htmlspecialchars($row['duration_months'] ?? '0'); ?> Months</span>
                    </div>
                    
                    <div class="course-images">
                        <img src="images/<?php echo $c['img1']; ?>" alt="<?php echo $c['title']; ?>">
                    </div>

                    <div class="course-body">
                        <p class="course-desc">
                            <?php 
                            if ($c['id'] == 'java') echo "Java is fast, secure, and reliable - used on 5.5 billion devices! Perfect for starting your coding journey.";
                            elseif ($c['id'] == 'python') echo "Power your future with Python! Easy to learn and used in Software, Data Science, and Machine Learning.";
                            else echo "The foundation of modern web. Master HTML, CSS, JavaScript, and PHP to create stunning, responsive websites.";
                            ?>
                        </p>
                        
                        <div class="course-features">
                            <h4>What you'll learn:</h4>
                            <ul>
                                <?php if ($c['id'] == 'web'): ?>
                                    <li><i class="fa fa-check"></i> HTML5 & CSS3</li>
                                    <li><i class="fa fa-check"></i> JavaScript ES6+</li>
                                    <li><i class="fa fa-check"></i> PHP & MySQL</li>
                                <?php else: ?>
                                    <li><i class="fa fa-check"></i> Fundamentals & Syntax</li>
                                    <li><i class="fa fa-check"></i> Data Structures</li>
                                    <li><i class="fa fa-check"></i> Real-world Projects</li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="course-meta">
                            <div class="meta-item"><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($row['duration_hours'] ?? '0'); ?> Hours</div>
                            <div class="meta-item"><i class="fa fa-users"></i> Batch: <?php echo htmlspecialchars($row['students'] ?? '0'); ?> Students</div>
                            <div class="meta-item price"><i class="fa fa-tag"></i> <?php echo htmlspecialchars($row['payments'] ?? '0'); ?></div>
                        </div>

                        <a href="Register.php" class="register-btn">Register Now <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="view-all-container">
        <a href="courses.php" class="view-all-btn">
            Click To View All Courses <i class="fa fa-rss"></i>
        </a>
    </div>
</section>

<script type="text/javascript" src="js/banner.js"></script>

<?php include("includes/footer.php"); ?>