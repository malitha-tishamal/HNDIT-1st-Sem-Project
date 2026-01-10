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
            ['id' => 'web', 'img' => 'web2.jpg', 'title' => 'Web Designing New Batch Starting']
        ];

        foreach ($newsItems as $item) {
            $stmt = $con->prepare("SELECT * FROM courses WHERE course_id = ?");
            $stmt->bind_param("s", $item['id']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                ?>
                <article class="news-card" id="<?php echo $item['id']; ?>">
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
                            <a href="Register.php" class="btn btn-primary">Enroll Now <i class="fa fa-arrow-right"></i></a>
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
    padding: 6rem 0;
    text-align: center;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
}

.news-hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
}

.news-container {
    max-width: 900px;
    margin: -4rem auto 6rem;
    display: flex;
    flex-direction: column;
    gap: 3rem;
    padding: 0 1.5rem;
}

.news-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 24px;
    display: grid;
    grid-template-columns: 250px 1fr;
    overflow: hidden;
    transition: var(--transition);
}

.news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5);
    border-color: rgba(99, 102, 241, 0.3);
}

.news-img-wrapper {
    height: 100%;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}

.news-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: var(--transition);
}

.news-card:hover .news-img-wrapper img {
    transform: scale(1.05);
}

.news-content {
    padding: 2.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.news-category {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
    padding: 0.3rem 0.8rem;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 700;
}

.news-date {
    color: var(--text-muted);
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.news-content h2 {
    font-size: 1.8rem;
    line-height: 1.2;
}

.news-content p {
    color: #cbd5e1;
    font-size: 1.05rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.news-actions {
    margin-top: auto;
}

@media (max-width: 768px) {
    .news-card {
        grid-template-columns: 1fr;
    }
    .news-img-wrapper {
        height: 200px;
    }
}
</style>

<?php include("includes/footer.php"); ?>