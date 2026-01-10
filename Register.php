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

<section class="register-hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold text-white mb-3">Enroll in a Course</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">Take the first step towards your future in technology with our industry-leading certification programs.</p>
    </div>
</section>

<section class="register-section">
    <div class="register-container">
        <div class="register-card card custom-card-modern">
            <?php
            if(isset($_GET['success'])){
                if ($_GET['success']== 1) {
                    echo "<div class='alert alert-success animate-zoom'>Registration Successful! We will contact you soon.</div>";
                } else {
                    echo "<div class='alert alert-error animate-zoom'>Registration Unsuccessful. Please check your details and try again.</div>";
                }
            }
            ?>
            <form method="get" action="entry.php" class="modern-form">
                <div class="form-header-modern mb-5">
                    <h3>Personal Information</h3>
                    <p>Tell us a bit about yourself</p>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                    </div>

                    <div class="input-group">
                        <label for="nic_no">NIC Number</label>
                        <input type="text" id="nic_no" name="nic_no" placeholder="987654321V" required>
                    </div>

                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required>
                    </div>

                    <div class="input-group">
                        <label for="phone">Mobile Number</label>
                        <input type="tel" id="phone" name="number" placeholder="071 234 5678" required>
                    </div>

                    <div class="input-group">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" placeholder="22" required>
                    </div>

                    <div class="input-group">
                        <label>Gender</label>
                        <div class="custom-radio-group">
                            <label class="radio-tab">
                                <input type="radio" name="gender" value="male" checked>
                                <span class="tab-btn">Male</span>
                            </label>
                            <label class="radio-tab">
                                <input type="radio" name="gender" value="female">
                                <span class="tab-btn">Female</span>
                            </label>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="city">City</label>
                        <select id="city" name="city" class="modern-select">
                            <option value="Galle">Galle</option>
                            <option value="Matara">Matara</option>
                            <option value="Hambanthota">Hambanthota</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Class Type</label>
                        <div class="custom-radio-group">
                            <label class="radio-tab">
                                <input type="radio" name="class" value="online" checked>
                                <span class="tab-btn">Online</span>
                            </label>
                            <label class="radio-tab">
                                <input type="radio" name="class" value="physical">
                                <span class="tab-btn">Physical</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="course-selection-modern">
                    <div class="form-header-modern mt-5 mb-4">
                        <h3>Select Courses</h3>
                        <p>Choose one or more courses to enroll in</p>
                    </div>
                    
                    <div class="course-options-grid">
                        <label class="course-check-card">
                            <input type="checkbox" name="java" value="15000">
                            <div class="check-card-inner">
                                <i class="fa fa-coffee java-icon"></i>
                                <div class="course-info-mini">
                                    <span class="course-name">Java Programming</span>
                                    <span class="course-price">Rs.15,000</span>
                                </div>
                            </div>
                        </label>
                        <label class="course-check-card">
                            <input type="checkbox" name="web" value="10000">
                            <div class="check-card-inner">
                                <i class="fa fa-globe web-icon"></i>
                                <div class="course-info-mini">
                                    <span class="course-name">Web Development</span>
                                    <span class="course-price">Rs.10,000</span>
                                </div>
                            </div>
                        </label>
                        <label class="course-check-card">
                            <input type="checkbox" name="python" value="12000">
                            <div class="check-card-inner">
                                <i class="fa fa-code python-icon"></i>
                                <div class="course-info-mini">
                                    <span class="course-name">Python Data Science</span>
                                    <span class="course-price">Rs.12,000</span>
                                </div>
                            </div>
                        </label>
                        <label class="course-check-card">
                            <input type="checkbox" name="iot" value="12000">
                            <div class="check-card-inner">
                                <i class="fa fa-microchip iot-icon"></i>
                                <div class="course-info-mini">
                                    <span class="course-name">IoT & Robotics</span>
                                    <span class="course-price">Rs.12,000</span>
                                </div>
                            </div>
                        </label>
                        <label class="course-check-card">
                            <input type="checkbox" name="c1" value="12000">
                            <div class="check-card-inner">
                                <i class="fa fa-terminal cs-icon"></i>
                                <div class="course-info-mini">
                                    <span class="course-name">C# .NET Development</span>
                                    <span class="course-price">Rs.12,000</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-submit-footer">
                    <button type="reset" class="btn-clear">Reset All</button>
                    <button type="submit" class="btn-submit">Confirm Registration <i class="fa fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
.register-hero {
    padding: 8rem 0 6rem;
    background: radial-gradient(circle at top, rgba(99, 102, 241, 0.08) 0%, transparent 70%);
}

.register-container {
    max-width: 1000px;
    margin: -4rem auto 10rem;
    padding: 0 1.5rem;
}

.custom-card-modern {
    background: #1e293b;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 40px;
    padding: 4rem;
    box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.6);
}

.form-header-modern h3 {
    font-size: 1.8rem;
    font-weight: 800;
    color: white;
    margin-bottom: 0.5rem;
}

.form-header-modern p {
    color: #94a3b8;
    font-size: 1.1rem;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

/* Custom Radio Styling */
.custom-radio-group {
    display: flex;
    background: #111827;
    padding: 0.4rem;
    border-radius: 14px;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.radio-tab {
    flex: 1;
    position: relative;
    cursor: pointer;
}

.radio-tab input {
    position: absolute;
    opacity: 0;
}

.tab-btn {
    display: block;
    text-align: center;
    padding: 0.8rem;
    border-radius: 10px;
    color: #94a3b8;
    font-weight: 700;
    transition: all 0.3s ease;
}

.radio-tab input:checked + .tab-btn {
    background: #6366f1;
    color: white;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
}

.modern-select {
    width: 100%;
    background: #111827;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 1.1rem 1.25rem;
    color: white;
    font-weight: 600;
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1.25rem center;
    background-size: 1.25rem;
}

/* Course Selection Grid */
.course-options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.course-check-card {
    cursor: pointer;
    position: relative;
}

.course-check-card input {
    position: absolute;
    opacity: 0;
}

.check-card-inner {
    background: #111827;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.check-card-inner i {
    font-size: 1.8rem;
    transition: transform 0.3s ease;
}

.course-info-mini {
    display: flex;
    flex-direction: column;
}

.course-name {
    font-size: 1rem;
    font-weight: 700;
    color: white;
}

.course-price {
    font-size: 0.9rem;
    color: #94a3b8;
    font-weight: 600;
}

.course-check-card input:checked + .check-card-inner {
    background: rgba(99, 102, 241, 0.08);
    border-color: #6366f1;
    transform: scale(1.02);
}

.course-check-card input:checked + .check-card-inner i {
    transform: scale(1.1);
}

/* Course Icons */
.java-icon { color: #f87171; }
.web-icon { color: #818cf8; }
.python-icon { color: #fb923c; }
.iot-icon { color: #10b981; }
.cs-icon { color: #c084fc; }

/* Form Footer */
.form-submit-footer {
    margin-top: 5rem;
    padding-top: 3rem;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 2rem;
}

.btn-clear {
    background: transparent;
    border: none;
    color: #64748b;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: color 0.3s ease;
}

.btn-clear:hover {
    color: white;
}

.btn-submit {
    background: #6366f1;
    color: white;
    border: none;
    padding: 1.25rem 3.5rem;
    border-radius: 18px;
    font-weight: 800;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 15px 30px -8px rgba(99, 102, 241, 0.4);
}

.btn-submit:hover {
    background: #4f46e5;
    transform: translateY(-4px);
    box-shadow: 0 25px 40px -10px rgba(99, 102, 241, 0.5);
}

@media (max-width: 850px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .custom-card-modern {
        padding: 2.5rem;
    }
}
</style>

<?php include("includes/footer.php"); ?>