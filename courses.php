<?php 
$pageTitle = "All Courses";
include("includes/header.php"); 
?>

<section class="courses-hero">
    <div class="container">
        <h1>Our Expert-Led Courses</h1>
        <p>Choose from a variety of IT courses designed to jumpstart your career.</p>
    </div>
</section>

<section class="all-courses-section">
    <div class="courses-container">
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM courses";
        $result = mysqli_query($con, $query);

        $courseMeta = [
            'java' => ['icon' => 'fa-coffee', 'color' => 'java-color', 'title' => 'Java Development'],
            'python' => ['icon' => 'fa-code', 'color' => 'python-color', 'title' => 'Python Development'],
            'web' => ['icon' => 'fa-globe', 'color' => 'web-color', 'title' => 'Web Development'],
            'iot' => ['icon' => 'fa-microchip', 'color' => 'iot-color', 'title' => 'IOT Robotics'],
            'c01' => ['icon' => 'fa-terminal', 'color' => 'csharp-color', 'title' => 'C# Development'],
        ];

        while($row = mysqli_fetch_array($result)) {
            $cid = $row['course_id'];
            $meta = isset($courseMeta[$cid]) ? $courseMeta[$cid] : ['icon' => 'fa-book', 'color' => 'default-color', 'title' => $cid];
            ?>
            <div class="course-detail-card <?php echo $meta['color']; ?>" id="<?php echo $cid; ?>">
                <div class="card-header">
                    <div class="header-main">
                        <i class="fa <?php echo $meta['icon']; ?> course-icon"></i>
                        <div>
                        <h2><?php echo $meta['title']; ?></h2>
                        <span class="badge"><?php echo htmlspecialchars($row['duration_months'] ?? '0'); ?> Months</span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="course-info">
                        <h3>About this course</h3>
                        <p><?php
                            if ($cid == 'java') echo "Java is fast, secure, and reliable. Used worldwide for developing applications for computers, laptops, data centers, games consoles, cell phones and more.";
                            elseif ($cid == 'python') echo "Easy to learn and incredibly powerful. Python is used in Software/Web development, Data Science, Machine Learning, and more.";
                            elseif ($cid == 'web') echo "The foundation of modern websites. Master HTML, CSS, and JavaScript to build interactive and responsive web pages.";
                            elseif ($cid == 'iot') echo "Learn to build and program robots using the Arduino platform, covering both hardware and software aspects.";
                            elseif ($cid == 'c01') echo "A powerful language used by large organizations. Perfect for those with no coding experience looking to enter the industry.";
                            else echo "A comprehensive course designed to give you industry-ready skills in " . htmlspecialchars($meta['title']) . ".";
                        ?></p>
                    </div>

                    <div class="course-stats">
                        <div class="stat">
                            <span class="label">Total Hours</span>
                            <span class="value"><?php echo htmlspecialchars($row['duration_hours'] ?? '0'); ?> hrs</span>
                        </div>
                        <div class="stat">
                            <span class="label">Start Date</span>
                            <span class="value"><?php echo htmlspecialchars($row['course_date'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="stat">
                            <span class="label">Batch Size</span>
                            <span class="value"><?php echo htmlspecialchars($row['students'] ?? '0'); ?> Students</span>
                        </div>
                        <div class="stat">
                            <span class="label">Course Fee</span>
                            <span class="value price"><?php echo htmlspecialchars($row['payments'] ?? '0'); ?></span>
                        </div>
                    </div>

                    <div class="card-actions">
                        <?php if (in_array($cid, ['java', 'python', 'web'])): ?>
                            <a href="Register.php" class="btn btn-primary">Enroll Now</a>
                        <?php else: ?>
                            <button class="btn btn-disabled" disabled>Coming Soon</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>

<style>
.courses-hero {
    padding: 6rem 0;
    text-align: center;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
}

.courses-hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
}

.courses-container {
    max-width: 1000px;
    margin: -4rem auto 6rem;
    display: flex;
    flex-direction: column;
    gap: 3rem;
    padding: 0 1.5rem;
}

.course-detail-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 24px;
    overflow: hidden;
    transition: var(--transition);
}

.course-detail-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5);
    border-color: rgba(99, 102, 241, 0.3);
}

.card-header {
    padding: 2.5rem;
    border-bottom: 1px solid var(--border-color);
}

.header-main {
    display: flex;
    align-items: center;
    gap: 2rem;
}

.course-icon {
    font-size: 3rem;
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-header h2 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.badge {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
    padding: 0.3rem 1rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
}

.card-body {
    padding: 2.5rem;
}

.course-info h3 {
    font-size: 1.1rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 1rem;
}

.course-info p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #e2e8f0;
    margin-bottom: 2.5rem;
}

.course-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 2rem;
    background: rgba(15, 23, 42, 0.4);
    padding: 2rem;
    border-radius: 20px;
    margin-bottom: 2.5rem;
}

.stat {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.stat .label {
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

.stat .value {
    font-size: 1.2rem;
    font-weight: 700;
}

.stat .value.price {
    color: var(--accent);
}

.card-actions {
    display: flex;
    justify-content: flex-end;
}

.btn-disabled {
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-muted);
    cursor: not-allowed;
}

/* Course colors */
.java-color .course-icon { color: #f87171; background: rgba(248, 113, 113, 0.1); }
.python-color .course-icon { color: #60a5fa; background: rgba(96, 165, 250, 0.1); }
.web-color .course-icon { color: #c084fc; background: rgba(192, 132, 252, 0.1); }
.iot-color .course-icon { color: #fbbf24; background: rgba(251, 191, 36, 0.1); }
.csharp-color .course-icon { color: #34d399; background: rgba(52, 211, 153, 0.1); }

@media (max-width: 600px) {
    .header-main { flex-direction: column; text-align: center; gap: 1rem; }
    .card-actions { justify-content: center; }
}
</style>

<?php include("includes/footer.php"); ?>