    </main>

    <footer class="main-footer">
        <div class="footer-grid">
            <div class="footer-section reach-us">
                <h3><i class="fa fa-thumbs-o-up"></i> Reach Us</h3>
                <div class="contact-info">
                    <p><i class="fa fa-map-marker"></i> Siridhamma Mawatha, Akmeemana</p>
                    <p><i class="fa fa-phone"></i> <a href="tel:+94412225554">041 222 5554</a></p>
                </div>
                <div class="social-links">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-youtube"></a>
                        <a href="#" class="fa fa-github"></a>
                    </div>
                </div>
            </div>

            <div class="footer-section popular-news">
                <h3 class="modern-footer-title"><i class="fa fa-newspaper-o"></i> Popular News</h3>
                <?php
                require_once("connect.php");
                $footerNewsQuery = "SELECT * FROM courses ORDER BY course_date DESC LIMIT 3";
                $footerNewsResult = $con->query($footerNewsQuery);
                
                if ($footerNewsResult && $footerNewsResult->num_rows > 0) {
                    while($fRow = $footerNewsResult->fetch_assoc()) {
                        $fId = $fRow['course_id'];
                        $fTag = ucfirst($fId);
                        if ($fId == 'iot') $fTag = "Robotics";
                        if ($fId == 'web') $fTag = "Web Design";
                        if ($fId == 'c1' || $fId == 'c01') $fTag = "C#";
                        
                        $fDesc = "New Course Starting " . date('M jS', strtotime($fRow['course_date']));
                        if ($fId == 'java') $fDesc = "New 6th Batch Starting " . date('M jS', strtotime($fRow['course_date']));
                        if ($fId == 'python') $fDesc = "New 5th Batch Starting " . date('M jS', strtotime($fRow['course_date']));
                        ?>
                        <?php
                        $colorClass = 'default-color';
                        if ($fId == 'java') $colorClass = 'java-red';
                        if ($fId == 'python') $colorClass = 'python-orange';
                        if ($fId == 'c1' || $fId == 'c01' || $fId == 'c2') $colorClass = 'c-purple';
                        if ($fId == 'iot' || $fId == 'arduino') $colorClass = 'iot-robotic-gradient';
                        ?>
                        <div class="news-item-minimal <?php echo $colorClass; ?> mb-3">
                            <div class="news-header-line">
                                <span class="news-category-text"><?php echo $fTag; ?></span>
                                <span class="news-date-text"><?php echo str_replace('-', '.', $fRow['course_date']); ?></span>
                            </div>
                            <a href="news.php#<?php echo $fId; ?>" class="news-desc-link">
                                <?php echo $fDesc; ?>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="footer-section categories">
                <h3><i class="fa fa-puzzle-piece"></i> Categories</h3>
                <div class="category-tags">
                    <a href="courses.php#java" class="tag tag-java">Java</a>
                    <a href="courses.php#web" class="tag tag-web">Web Design</a>
                    <a href="courses.php#python" class="tag tag-python">Python</a>
                    <a href="courses.php#arduino" class="tag tag-iot">Robotics</a>
                    <a href="courses.php#c1" class="tag tag-c">C#</a>
                    <a href="courses.php#c2" class="tag tag-c">C++</a>
                </div>
            </div>

            <div class="footer-section find-us">
                <h3><i class="fa fa-map-marker"></i> Find Us</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.4184450925177!2d80.23076517546636!3d6.074174528220766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae17182cf82c5bf%3A0xcabc61ef94f1ad0e!2sAdvanced%20Technological%20Institute%20-%20Galle!5e0!3m2!1sen!2slk!4v1725649661855!5m2!1sen!2slk" width="100%" height="150" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Malitha Tishamal. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/user.js"></script>
    <script src="js/modern.js"></script>
</body>
</html>
