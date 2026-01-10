<?php 
$pageTitle = "Python Downloads";
include("includes/header.php"); 
?>

<section class="download-hero">
    <div class="container">
        <h1>Python Learning Resources</h1>
        <p>Master Python with our curated collection of notes, scripts, and software tools.</p>
    </div>
</section>

<section class="download-section">
    <div class="download-grid">
        <!-- Notes Section -->
        <div class="download-card card">
            <h2><i class="fa fa-book"></i> Python Notes</h2>
            <div class="resource-list">
                <?php for($i=1; $i<=4; $i++): ?>
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/icon1.png" alt="Notes">
                        <div>
                            <h4>Semester <?php echo $i; ?> Notes</h4>
                            <p>Complete Python guide for Semester <?php echo $i; ?></p>
                        </div>
                    </div>
                    <a href="documents/rar/python.rar" class="download-btn" download>
                        <i class="fa fa-download"></i> ZIP
                    </a>
                </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Papers Section -->
        <div class="download-card card">
            <h2><i class="fa fa-file-text-o"></i> Practice Papers</h2>
            <div class="resource-list">
                <?php for($i=1; $i<=4; $i++): ?>
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/exam.png" alt="Exam">
                        <div>
                            <h4>Python Lab Assignment <?php echo $i; ?></h4>
                            <p>Challenge yourself with these practice sets</p>
                        </div>
                    </div>
                    <a href="documents/pdf/pdf1.pdf" class="download-btn pdf" target="_blank">
                        <i class="fa fa-file-pdf-o"></i> PDF
                    </a>
                </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Software Section -->
        <div class="download-card card software-card">
            <h2><i class="fa fa-laptop"></i> Tools & IDEs</h2>
            <div class="software-grid">
                <a href="https://www.python.org/downloads/" target="_blank" class="soft-item">
                    <img src="images/course_download/py.png" alt="Python">
                    <span>Python 3.x</span>
                </a>
                <a href="https://code.visualstudio.com/" target="_blank" class="soft-item">
                    <img src="images/course_download/vs.png" alt="VS Code">
                    <span>VS Code</span>
                </a>
            </div>
            
            <div class="tutorials-section">
                <h3>Getting Started</h3>
                <div class="video-links">
                    <a href="https://www.youtube.com/watch?v=rfscVS0vtbw" target="_blank" class="vid-link">
                        <i class="fa fa-youtube-play"></i> Setup Python & VS Code
                    </a>
                    <a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank" class="vid-link">
                        <i class="fa fa-youtube-play"></i> First Python Program
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.download-hero {
    padding: 6rem 0;
    text-align: center;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
}

.download-grid {
    max-width: 1200px;
    margin: -4rem auto 6rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    padding: 0 1.5rem;
}

.download-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 24px;
    padding: 2.5rem;
}

.download-card h2 {
    font-size: 1.5rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.resource-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.resource-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(15, 23, 42, 0.3);
    padding: 1.25rem;
    border-radius: 16px;
    border: 1px solid var(--border-color);
    transition: var(--transition);
}

.resource-item:hover {
    border-color: #0ea5e9;
    background: rgba(15, 23, 42, 0.5);
}

.resource-main {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.resource-main img {
    height: 40px;
}

.resource-main h4 {
    font-size: 0.95rem;
    margin-bottom: 0.2rem;
}

.resource-main p {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.download-btn {
    padding: 0.6rem 1.2rem;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.8rem;
    text-decoration: none;
    transition: var(--transition);
    background: rgba(14, 165, 233, 0.1);
    color: #0ea5e9;
}

.download-btn:hover {
    background: #0ea5e9;
    color: white;
}

.download-btn.pdf {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.download-btn.pdf:hover {
    background: #ef4444;
    color: white;
}

.software-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 2rem;
}

.soft-item {
    background: rgba(15, 23, 42, 0.3);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    text-decoration: none;
    color: white;
    transition: var(--transition);
}

.soft-item:hover {
    border-color: #0ea5e9;
    transform: translateY(-5px);
}

.soft-item img {
    height: 60px;
    object-fit: contain;
}

.soft-item span {
    font-weight: 600;
    font-size: 0.9rem;
}

.tutorials-section h3 {
    font-size: 1rem;
    margin-bottom: 1rem;
    color: var(--text-muted);
}

.video-links {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.vid-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #cbd5e1;
    text-decoration: none;
    font-size: 0.95rem;
    transition: var(--transition);
}

.vid-link:hover {
    color: #0ea5e9;
}
</style>

<?php include("includes/footer.php"); ?>