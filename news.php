<?php 
$pageTitle = "Latest News";
include("includes/header.php"); 
?>

<section class="news-hero">
    <div class="container">
        <h1>Stay Updated</h1>
        <p>Latest announcements, batch starts, and IT industry insights.</p>
    </div>
</section>

<section class="news-section">
    <div class="news-container">
        <?php
        require_once("connect.php");
        
        $newsItems = [
            ['id' => 'iot', 'img' => 'Arduino.jpg', 'title' => 'Arduino-Robotic New Batch Starting'],
            ['id' => 'java', 'img' => 'java2.jpg', 'title' => 'Java Programming New Batch Starting'],
            ['id' => 'python', 'img' => 'pyth2.png', 'title' => 'Python Programming New Batch Starting'],
            ['id' => 'web', 'img' => 'web2.jpg', 'title' => 'Web Designing New Batch Starting'],
            ['id' => 'c1', 'img' => 'csharp.png', 'title' => 'C# Desktop New Batch Starting']
        ];

        foreach ($newsItems as $item) {
            $stmt = $con->prepare("SELECT * FROM courses WHERE course_id = ?");
            $stmt->bind_param("s", $item['id']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $colorClass = 'default-news';
                if ($item['id'] == 'java') $colorClass = 'news-java';
                if ($item['id'] == 'python') $colorClass = 'news-python';
                if ($item['id'] == 'web' || $item['id'] == 'c1') $colorClass = 'news-c-web';
                if ($item['id'] == 'iot') $colorClass = 'news-iot';
                ?>
                <article class="news-card <?php echo $colorClass; ?>" id="<?php echo $item['id']; ?>">
                    <div class="news-img-wrapper">
                        <img src="images/<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-category">Batch Start</span>
                            <span class="news-date"><i class="fa fa-calendar"></i> <?php echo htmlspecialchars($row['course_date'] ?? ''); ?></span>
                        </div>
                        <h2><?php echo $item['title']; ?></h2>
                        <p>
                            Great news! A new batch for <strong><?php echo htmlspecialchars($item['title']); ?></strong> is starting on <strong><?php echo htmlspecialchars($row['course_date'] ?? ''); ?></strong> at our Institute. 
                            We have <strong><?php echo htmlspecialchars($row['students'] ?? ''); ?> seats</strong> available for the physical classroom batch. 
                            Classes start at <strong><?php echo htmlspecialchars($row['course_time'] ?? ''); ?> A.M.</strong> 
                            Live streaming is also available for the online batch.
                        </p>
                        <div class="news-actions">
                            <a href="Register.php" class="btn enroll-btn">Enroll Now <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </article>
                <?php
            }
        }
        ?>
    </div>
</section>

<style>
.news-hero {
    padding: 8rem 0 6rem;
    text-align: center;
    background: radial-gradient(circle at top, rgba(99, 102, 241, 0.08) 0%, transparent 70%);
}

.news-hero h1 {
    font-size: clamp(2.5rem, 8vw, 4rem);
    font-weight: 800;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
}

.news-container {
    max-width: 1000px;
    margin: -2rem auto 8rem;
    display: flex;
    flex-direction: column;
    gap: 4rem;
    padding: 0 1.5rem;
}

.news-card {
    background: #1e293b;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 32px;
    display: grid;
    grid-template-columns: 280px 1fr;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 20px 50px -15px rgba(0, 0, 0, 0.4);
}

.news-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.6);
}

.news-img-wrapper {
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem;
}

.news-img-wrapper img {
    width: 100%;
    height: auto;
    max-height: 180px;
    object-fit: contain;
    filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));
}

.news-content {
    padding: 3rem;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 0.5rem;
}

.news-category {
    background: rgba(255, 255, 255, 0.05);
    color: #94a3b8;
    padding: 0.4rem 1rem;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.news-date {
    color: #94a3b8;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.news-content h2 {
    font-size: 2.2rem;
    font-weight: 800;
    line-height: 1.1;
    color: white;
}

.news-content p {
    color: #94a3b8;
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 1.5rem;
}

.news-content p strong {
    color: white;
}

.enroll-btn {
    padding: 1.1rem 2.5rem;
    border-radius: 16px;
    font-weight: 700;
    font-size: 1.1rem;
    color: white;
    border: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 12px;
}

.enroll-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px -10px currentColor;
}

/* Dynamic News Colors */
.news-java .news-category { background: rgba(248, 113, 113, 0.1); color: #f87171; }
.news-java .enroll-btn { background: #ef4444; }
.news-java .news-date i { color: #f87171; }
.news-java:hover { border-color: rgba(248, 113, 113, 0.3); }

.news-python .news-category { background: rgba(251, 146, 60, 0.1); color: #fb923c; }
.news-python .enroll-btn { background: #f97316; }
.news-python .news-date i { color: #fb923c; }
.news-python:hover { border-color: rgba(251, 146, 60, 0.3); }

.news-c-web .news-category { background: rgba(192, 132, 252, 0.1); color: #c084fc; }
.news-c-web .enroll-btn { background: #a855f7; }
.news-c-web .news-date i { color: #c084fc; }
.news-c-web:hover { border-color: rgba(192, 132, 252, 0.3); }

.news-iot .news-category { background: rgba(52, 211, 153, 0.1); color: #34d399; }
.news-iot .enroll-btn { background: linear-gradient(135deg, #10b981, #0ea5e9); }
.news-iot .news-date i { color: #34d399; }
.news-iot:hover { border-color: rgba(52, 211, 153, 0.3); }

@media (max-width: 992px) {
    .news-card {
        grid-template-columns: 1fr;
    }
    .news-img-wrapper {
        padding: 4rem;
    }
}
</style>

<?php include("includes/footer.php"); ?>