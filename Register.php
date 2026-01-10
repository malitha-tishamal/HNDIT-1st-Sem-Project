<?php 
$pageTitle = "Course Registration";
include("includes/header.php"); 
?>

<section class="register-hero">
    <div class="container">
        <h1>Enroll in a Course</h1>
        <p>Take the first step towards your future in technology.</p>
    </div>
</section>

<section class="register-section">
    <div class="register-container">
        <div class="register-card card glass-card">
            <?php
            if(isset($_GET['success'])){
                if ($_GET['success']== 1) {
                    echo "<div class='alert alert-success'>Registration Successful! We will contact you soon.</div>";
                } else {
                    echo "<div class='alert alert-error'>Registration Unsuccessful. Please check your details and try again.</div>";
                }
            }
            ?>
            <form method="get" action="entry.php" class="modern-form">
                <div class="form-grid">
                    <div class="input-group">
                        <label for="name"><i class="fa fa-user"></i> Full Name *</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                    </div>

                    <div class="input-group">
                        <label for="nic_no"><i class="fa fa-id-card-o"></i> NIC Number *</label>
                        <input type="text" id="nic_no" name="nic_no" placeholder="987654321V" required>
                    </div>

                    <div class="input-group">
                        <label for="email"><i class="fa fa-envelope"></i> Email Address *</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required>
                    </div>

                    <div class="input-group">
                        <label for="phone"><i class="fa fa-phone"></i> Mobile Number *</label>
                        <input type="tel" id="phone" name="number" placeholder="071 234 5678" required>
                    </div>

                    <div class="input-group">
                        <label for="age"><i class="fa fa-calendar-check-o"></i> Age *</label>
                        <input type="number" id="age" name="age" placeholder="22" required>
                    </div>

                    <div class="input-group">
                        <label><i class="fa fa-venus-mars"></i> Gender</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="gender" value="male" checked>
                                <span>Male</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="gender" value="female">
                                <span>Female</span>
                            </label>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="city"><i class="fa fa-map-marker"></i> City</label>
                        <select id="city" name="city" class="modern-select">
                            <option value="Galle">Galle</option>
                            <option value="Matara">Matara</option>
                            <option value="Hambanthota">Hambanthota</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label><i class="fa fa-university"></i> Class Type</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="class" value="online" checked>
                                <span>Online</span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="class" value="physical">
                                <span>Physical</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="course-selection">
                    <label><i class="fa fa-book"></i> Select Courses</label>
                    <div class="course-options">
                        <label class="checkbox-card">
                            <input type="checkbox" name="java" value="15000">
                            <div class="checkbox-content">
                                <i class="fa fa-coffee"></i>
                                <span>Java (Rs.15,000)</span>
                            </div>
                        </label>
                        <label class="checkbox-card">
                            <input type="checkbox" name="web" value="10000">
                            <div class="checkbox-content">
                                <i class="fa fa-globe"></i>
                                <span>Web (Rs.10,000)</span>
                            </div>
                        </label>
                        <label class="checkbox-card">
                            <input type="checkbox" name="python" value="12000">
                            <div class="checkbox-content">
                                <i class="fa fa-code"></i>
                                <span>Python (Rs.12,000)</span>
                            </div>
                        </label>
                        <label class="checkbox-card">
                            <input type="checkbox" name="iot" value="12000">
                            <div class="checkbox-content">
                                <i class="fa fa-microchip"></i>
                                <span>IOT (Rs.12,000)</span>
                            </div>
                        </label>
                        <label class="checkbox-card">
                            <input type="checkbox" name="c1" value="12000">
                            <div class="checkbox-content">
                                <i class="fa fa-window-maximize"></i>
                                <span>C# (Rs.12,000)</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="reset" class="btn btn-secondary">Clear All</button>
                    <button type="submit" class="btn btn-primary">Submit Registration</button>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
.register-hero {
    padding: 6rem 0;
    text-align: center;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
}

.register-container {
    max-width: 900px;
    margin: -4rem auto 6rem;
    padding: 0 1.5rem;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.radio-group {
    display: flex;
    gap: 1.5rem;
    padding: 0.8rem 0;
}

.radio-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.radio-label input {
    width: auto;
}

.modern-select {
    width: 100%;
    background: rgba(15, 23, 42, 0.5);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 0.8rem 1.2rem;
    color: white;
    cursor: pointer;
}

.course-selection {
    margin-top: 3rem;
}

.course-selection > label {
    display: block;
    margin-bottom: 1.5rem;
    color: var(--text-muted);
    font-size: 0.95rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.course-options {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 1.25rem;
}

.checkbox-card {
    cursor: pointer;
    position: relative;
}

.checkbox-card input {
    position: absolute;
    opacity: 0;
}

.checkbox-content {
    background: rgba(15, 23, 42, 0.4);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
    text-align: center;
}

.checkbox-card input:checked + .checkbox-content {
    background: rgba(99, 102, 241, 0.1);
    border-color: var(--primary);
    box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
}

.checkbox-content i {
    font-size: 1.5rem;
    color: var(--primary);
}

.checkbox-content span {
    font-size: 0.85rem;
    font-weight: 600;
}

.form-footer {
    display: flex;
    justify-content: flex-end;
    gap: 1.25rem;
    margin-top: 3rem;
    padding-top: 2.5rem;
    border-top: 1px solid var(--border-color);
}

@media (max-width: 600px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-footer {
        flex-direction: column-reverse;
    }
}
</style>

<?php include("includes/footer.php"); ?>