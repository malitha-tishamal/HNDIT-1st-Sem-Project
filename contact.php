<?php 
$pageTitle = "Contact Us";
include("includes/header.php"); 
?>

<section class="contact-hero">
    <div class="container">
        <h1>Get in Touch</h1>
        <p>Have questions? We're here to help you on your IT journey.</p>
    </div>
</section>

<section class="contact-section">
    <div class="contact-container">
        <div class="contact-form-wrapper">
            <div class="card glass-card">
                <h2>Send us a Message</h2>
                <?php
                if(isset($_GET['datasend'])){
                    if ($_GET['datasend']== 1) {
                        echo "<div class='alert alert-success'>Message sent successfully! We'll get back to you soon.</div>";
                    } else {
                        echo "<div class='alert alert-error'>Message failed to send. Please try again or call us.</div>";
                    }
                }
                ?>
                <form method="get" action="entry2.php" class="modern-form">
                    <div class="input-grid">
                        <div class="input-group">
                            <label for="sd_name"><i class="fa fa-user"></i> Full Name *</label>
                            <input type="text" id="sd_name" name="sd_name" placeholder="John Doe" required>
                        </div>
                        <div class="input-group">
                            <label for="sd_email"><i class="fa fa-envelope"></i> Email Address *</label>
                            <input type="email" id="sd_email" name="sd_email" placeholder="john@example.com" required>
                        </div>
                        <div class="input-group">
                            <label for="sd_number"><i class="fa fa-phone"></i> Mobile Number</label>
                            <input type="tel" id="sd_number" name="sd_number" placeholder="071 234 5678">
                        </div>
                        <div class="input-group">
                            <label for="sd_date"><i class="fa fa-calendar"></i> Preferred Date</label>
                            <input type="date" id="sd_date" name="sd_date">
                        </div>
                    </div>
                    
                    <div class="input-group full-width">
                        <label for="sd_message"><i class="fa fa-comments"></i> Your Message *</label>
                        <textarea id="sd_message" name="sd_message" rows="5" placeholder="How can we help you?" required></textarea>
                    </div>

                    <div class="input-group full-width">
                        <label for="file"><i class="fa fa-upload"></i> Attach File (Optional)</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="file" name="file">
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="reset" class="btn btn-secondary">Clear</button>
                        <button type="submit" class="btn btn-primary">Submit Message</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="contact-info-wrapper">
            <div class="card info-card">
                <h3>Contact Information</h3>
                <div class="info-items">
                    <div class="info-item">
                        <i class="fa fa-user-secret"></i>
                        <div>
                            <h4>Admin</h4>
                            <p>For urgent inquiries</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>admin.learninglk@outlook.com</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <h4>Location</h4>
                            <p>Siridhamma Mawatha, Akmeemana</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <div>
                            <h4>Phone</h4>
                            <p>041 222 5554 / 078 558 9789</p>
                        </div>
                    </div>
                </div>

                <div class="social-connect">
                    <h4>Connect with Us</h4>
                    <div class="social-icons-large">
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-youtube"></a>
                        <a href="#" class="fa fa-github"></a>
                    </div>
                </div>
            </div>

            <div class="card map-card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.4184450925177!2d80.23076517546636!3d6.074174528220766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae17182cf82c5bf%3A0xcabc61ef94f1ad0e!2sAdvanced%20Technological%20Institute%20-%20Galle!5e0!3m2!1sen!2slk!4v1725649661855!5m2!1sen!2slk" width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
.contact-hero {
    padding: 6rem 0;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
    text-align: center;
}

.contact-hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(to right, #fff, var(--primary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.contact-container {
    max-width: 1200px;
    margin: -4rem auto 6rem;
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 2rem;
    padding: 0 1.5rem;
}

.card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 24px;
    padding: 2.5rem;
}

.glass-card {
    background: rgba(30, 41, 59, 0.7);
    backdrop-filter: blur(12px);
}

.info-card {
    background: linear-gradient(135deg, var(--primary) 0%, #4f46e5 100%);
    color: white;
    border: none;
}

.info-card h3 {
    margin-bottom: 2rem;
    font-size: 1.8rem;
}

.info-items {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.info-item {
    display: flex;
    gap: 1.5rem;
    align-items: center;
}

.info-item i {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.info-item h4 {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-bottom: 0.2rem;
}

.info-item p {
    font-weight: 600;
}

.social-connect {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.social-icons-large {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.social-icons-large a {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: var(--transition);
}

.social-icons-large a:hover {
    background: white;
    color: var(--primary);
    transform: translateY(-3px);
}

.input-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.input-group.full-width {
    grid-column: span 2;
    margin-top: 1.5rem;
}

.modern-form .input-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--text-muted);
}

.modern-form input, .modern-form textarea {
    width: 100%;
    background: rgba(15, 23, 42, 0.5);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 0.8rem 1.2rem;
    color: white;
    font-family: inherit;
    transition: var(--transition);
}

.modern-form input:focus, .modern-form textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
}

.file-upload-wrapper {
    position: relative;
    width: 100%;
}

.file-upload-wrapper input[type="file"] {
    background: rgba(15, 23, 42, 0.5);
    border: 1px solid var(--border-color);
    padding: 0.6rem 1rem;
    cursor: pointer;
}

.file-upload-wrapper input[type="file"]::file-selector-button {
    background: var(--primary);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    margin-right: 1rem;
    cursor: pointer;
    transition: var(--transition);
    font-weight: 600;
}

.file-upload-wrapper input[type="file"]::file-selector-button:hover {
    background: var(--primary-hover);
}

.form-footer {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
}

.btn {
    padding: 0.8rem 2rem;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: var(--transition);
    border: none;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.05);
    color: white;
}

.alert {
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    font-weight: 600;
}

.alert-success { background: rgba(16, 185, 129, 0.1); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.2); }
.alert-error { background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); }

@media (max-width: 992px) {
    .contact-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {
    .input-grid {
        grid-template-columns: 1fr;
    }
    .input-group.full-width {
        grid-column: span 1;
    }
}
</style>

<?php include("includes/footer.php"); ?>