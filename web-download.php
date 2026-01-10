<?php 
$pageTitle = "Web Development Downloads";
include("includes/header.php"); 
?>

<section class="download-hero">
    <div class="container">
        <h1>Web Development Assets</h1>
        <p>Build the modern web with our collection of templates, notes, and development tools.</p>
    </div>
</section>

<section class="download-section">
    <div class="download-grid">
        <!-- Notes Section -->
        <div class="download-card card">
            <h2><i class="fa fa-book"></i> Web Notes</h2>
            <div class="resource-list">
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/icon1.png" alt="Notes">
                        <div>
                            <h4>HTML5 & CSS3 Basics</h4>
                            <p>Foundation of web design and layout</p>
                        </div>
                    </div>
                    <a href="#" class="download-btn">
                        <i class="fa fa-download"></i> ZIP
                    </a>
                </div>
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/icon1.png" alt="Notes">
                        <div>
                            <h4>JavaScript & DOM</h4>
                            <p>Making websites interactive and dynamic</p>
                        </div>
                    </div>
                    <a href="#" class="download-btn">
                        <i class="fa fa-download"></i> ZIP
                    </a>
                </div>
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/icon1.png" alt="Notes">
                        <div>
                            <h4>PHP & MySQL</h4>
                            <p>Server-side programming and databases</p>
                        </div>
                    </div>
                    <a href="#" class="download-btn">
                        <i class="fa fa-download"></i> ZIP
                    </a>
                </div>
            </div>
        </div>

        <!-- Templates Section -->
        <div class="download-card card">
            <h2><i class="fa fa-code"></i> Project Templates</h2>
            <div class="resource-list">
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/icon1.png" alt="Exam">
                        <div>
                            <h4>Portfolio Template</h4>
                            <p>Premium responsive portfolio starter</p>
                        </div>
                    </div>
                    <a href="#" class="download-btn pdf">
                        <i class="fa fa-eye"></i> LIVE
                    </a>
                </div>
                <div class="resource-item">
                    <div class="resource-main">
                        <img src="images/course_download/icon1.png" alt="Exam">
                        <div>
                            <h4>E-commerce UI Kit</h4>
                            <p>Modern shop layout components</p>
                        </div>
                    </div>
                    <a href="#" class="download-btn pdf">
                        <i class="fa fa-eye"></i> LIVE
                    </a>
                </div>
            </div>
        </div>

        <!-- Software Section -->
        <div class="download-card card software-card">
            <h2><i class="fa fa-laptop"></i> Dev Environment</h2>
            <div class="software-grid">
                <a href="https://code.visualstudio.com/" target="_blank" class="soft-item">
                    <img src="images/course_download/vs.png" alt="VS Code">
                    <span>VS Code</span>
                </a>
                <a href="https://www.apachefriends.org/" target="_blank" class="soft-item">
                    <img src="images/course_download/xampp.png" alt="XAMPP">
                    <span>XAMPP Server</span>
                </a>
            </div>
            
            <div class="tutorials-section">
                <h3>Recommended Extensions</h3>
                <ul class="vid-link" style="list-style: none; padding:0; display:flex; flex-direction:column; gap:0.5rem">
                    <li><i class="fa fa-check-circle" style="color:#22c55e"></i> Live Server</li>
                    <li><i class="fa fa-check-circle" style="color:#22c55e"></i> Prettier - Code Formatter</li>
                    <li><i class="fa fa-check-circle" style="color:#22c55e"></i> Auto Close Tag</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
.download-hero {
    padding: 6rem 0;
    text-align: center;
    background: linear-gradient(135deg, rgba(168, 85, 247, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
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
    border-color: #a855f7;
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
    background: rgba(168, 85, 247, 0.1);
    color: #a855f7;
}

.download-btn:hover {
    background: #a855f7;
    color: white;
}

.download-btn.pdf {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
}

.download-btn.pdf:hover {
    background: var(--primary);
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
    border-color: #a855f7;
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
</style>

<?php include("includes/footer.php"); ?>