<?php
session_start();
require_once("connect.php");

// Admin Login Logic
if (isset($_POST["admin_login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "admin@elk.com" && $password == "1234") {
        $_SESSION["admin"] = "Admin";
    } else {
        $login_error = "Invalid Administrative Credentials";
    }
}

// Admin Logout
if (isset($_POST["admin_logout"])) {
    unset($_SESSION["admin"]);
    header("Location: Admin.php");
    exit();
}

$pageTitle = "Admin Dashboard";
include("includes/header.php");
?>

<div class="admin-wrapper">
    <?php if (!isset($_SESSION["admin"])): ?>
        <section class="admin-login-section">
            <div class="login-card card glass-card">
                <h2>Admin Access</h2>
                <form method="post" class="modern-form">
                    <?php if (isset($login_error)): ?>
                        <div class="alert alert-error"><?php echo $login_error; ?></div>
                    <?php endif; ?>
                    <div class="input-group">
                        <label>Admin Email</label>
                        <input type="email" name="username" required placeholder="admin@elk.com">
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" required placeholder="••••">
                    </div>
                    <button type="submit" name="admin_login" class="btn btn-primary full-width">Login to Dashboard</button>
                </form>
            </div>
        </section>
    <?php else: ?>
        <div class="dashboard-layout">
            <aside class="admin-sidebar">
                <div class="admin-profile">
                    <img src="images/admin2.jpg" alt="Admin" class="dash-img">
                    <h3>Administrator</h3>
                    <p>System Control</p>
                </div>
                <nav class="admin-nav">
                    <button class="nav-item active" onclick="showTab('stats')"><i class="fa fa-line-chart"></i> Overview</button>
                    <button class="nav-item" onclick="showTab('registers')"><i class="fa fa-users"></i> Course Registrations</button>
                    <button class="nav-item" onclick="showTab('courses')"><i class="fa fa-book"></i> Course Management</button>
                </nav>
                <form method="post" class="logout-form">
                    <button type="submit" name="admin_logout" class="btn btn-secondary full-width">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </aside>

            <main class="admin-main">
                <div id="stats" class="tab-content active">
                    <div class="dashboard-header">
                        <h1>System Status</h1>
                        <p>Real-time analytics for Learninglk</p>
                    </div>

                    <?php if (isset($_GET['send'])): ?>
                        <div class="alert <?php echo $_GET['send'] == '1' ? 'alert-success' : 'alert-error'; ?>">
                            <?php echo $_GET['send'] == '1' ? 'Course updated successfully!' : 'Failed to update course.'; ?>
                        </div>
                    <?php endif; ?>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa fa-user-plus"></i></div>
                            <div class="stat-info">
                                <h4>Total Students</h4>
                                <span class="count"><?php echo $con->query("SELECT count(*) FROM students")->fetch_row()[0]; ?></span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa fa-book"></i></div>
                            <div class="stat-info">
                                <h4>Courses</h4>
                                <span class="count"><?php echo $con->query("SELECT count(*) FROM courses")->fetch_row()[0]; ?></span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa fa-user-circle"></i></div>
                            <div class="stat-info">
                                <h4>User Accounts</h4>
                                <span class="count"><?php echo $con->query("SELECT count(*) FROM account")->fetch_row()[0]; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="courses-detailed-stats card mt-2">
                        <h3>Registration Breakdown</h3>
                        <div class="mini-stats">
                            <div class="mini-stat">Java: <span><?php echo $con->query("SELECT count(*) FROM students WHERE java > 0")->fetch_row()[0]; ?></span></div>
                            <div class="mini-stat">Web: <span><?php echo $con->query("SELECT count(*) FROM students WHERE web > 0")->fetch_row()[0]; ?></span></div>
                            <div class="mini-stat">Python: <span><?php echo $con->query("SELECT count(*) FROM students WHERE python > 0")->fetch_row()[0]; ?></span></div>
                            <div class="mini-stat">IOT: <span><?php echo $con->query("SELECT count(*) FROM students WHERE iot > 0")->fetch_row()[0]; ?></span></div>
                            <div class="mini-stat">C#: <span><?php echo $con->query("SELECT count(*) FROM students WHERE c1 > 0 OR c1 = '12000'")->fetch_row()[0]; ?></span></div>
                        </div>
                    </div>
                </div>

                <div id="registers" class="tab-content">
                    <div class="dashboard-header">
                        <h1>Student Registrations</h1>
                    </div>

                    <div class="search-filters-container card mb-2">
                        <h3>Search & Filter</h3>
                        <form method="get" class="search-form mt-1">
                            <div class="search-grid">
                                <div class="input-group">
                                    <label>NIC No</label>
                                    <input type="text" name="nic_no" placeholder="Search NIC..." value="<?php echo $_GET['nic_no'] ?? ''; ?>">
                                </div>
                                <div class="input-group">
                                    <label>Student Name</label>
                                    <input type="text" name="student_name" placeholder="Search Name..." value="<?php echo $_GET['student_name'] ?? ''; ?>">
                                </div>
                                <div class="input-group">
                                    <label>City</label>
                                    <select name="city" class="modern-select">
                                        <option value="">All Cities</option>
                                        <option value="Matara" <?php echo ($_GET['city'] ?? '') == 'Matara' ? 'selected' : ''; ?>>Matara</option>
                                        <option value="Galle" <?php echo ($_GET['city'] ?? '') == 'Galle' ? 'selected' : ''; ?>>Galle</option>
                                        <option value="Hambantota" <?php echo ($_GET['city'] ?? '') == 'Hambantota' ? 'selected' : ''; ?>>Hambantota</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label>Course Filter</label>
                                    <select name="course_filter" class="modern-select">
                                        <option value="">All Courses</option>
                                        <option value="java" <?php echo ($_GET['course_filter'] ?? '') == 'java' ? 'selected' : ''; ?>>Java (Registered)</option>
                                        <option value="web" <?php echo ($_GET['course_filter'] ?? '') == 'web' ? 'selected' : ''; ?>>Web (Registered)</option>
                                        <option value="python" <?php echo ($_GET['course_filter'] ?? '') == 'python' ? 'selected' : ''; ?>>Python (Registered)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-actions mt-1">
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                                <a href="Admin.php?tab=registers" class="btn btn-secondary">Clear</a>
                            </div>
                        </form>
                    </div>

                    <div class="table-container card">
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Courses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $where = ["1=1"];
                                if (!empty($_GET['nic_no'])) $where[] = "nic_no LIKE '%" . $con->real_escape_string($_GET['nic_no']) . "%'";
                                if (!empty($_GET['student_name'])) $where[] = "name LIKE '%" . $con->real_escape_string($_GET['student_name']) . "%'";
                                if (!empty($_GET['city'])) $where[] = "city = '" . $con->real_escape_string($_GET['city']) . "'";
                                if (!empty($_GET['course_filter'])) {
                                    if ($_GET['course_filter'] == 'java') $where[] = "java > 0";
                                    elseif ($_GET['course_filter'] == 'web') $where[] = "web > 0";
                                    elseif ($_GET['course_filter'] == 'python') $where[] = "python > 0";
                                }

                                $query = "SELECT * FROM students WHERE " . implode(" AND ", $where) . " ORDER BY nic_no DESC LIMIT 50";
                                $res = $con->query($query);
                                
                                if ($res->num_rows > 0) {
                                    while($row = $res->fetch_assoc()) {
                                        $courses = [];
                                        if ($row['java'] > 0) $courses[] = "Java";
                                        if ($row['web'] > 0) $courses[] = "Web";
                                        if ($row['python'] > 0) $courses[] = "Python";
                                        
                                        echo "<tr>
                                            <td>".htmlspecialchars($row['name'])."</td>
                                            <td>".htmlspecialchars($row['nic_no'])."</td>
                                            <td>".htmlspecialchars($row['email'])."</td>
                                            <td>".htmlspecialchars($row['city'])."</td>
                                            <td><span class='badge'>".implode(", ", $courses)."</span></td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No matching records found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="courses" class="tab-content">
                    <div class="dashboard-header">
                        <h1>Course Management</h1>
                    </div>

                    <div class="management-top card mb-2">
                        <div class="tabs-sub">
                            <button class="sub-tab-btn active" onclick="showSubTab('update-course')">Update Existing</button>
                            <button class="sub-tab-btn" onclick="showSubTab('add-course')">Add New Course</button>
                        </div>
                    </div>

                    <div id="update-course-section" class="sub-tab-content active">
                        <div class="card mb-2">
                            <h3>Select Course to Edit</h3>
                            <form method="get" id="course_selector_form" style="margin-top: 1rem;">
                                <input type="hidden" name="tab" value="courses">
                                <div class="input-group">
                                    <select name="selected_course" id="selected_course" class="modern-select" onchange="this.form.submit()">
                                        <option value="">-- Select a Course --</option>
                                        <?php
                                        $course_list = $con->query("SELECT course_id, course_id as name FROM courses");
                                        $current_selection = $_GET['selected_course'] ?? '';
                                        while($c = $course_list->fetch_assoc()) {
                                            $sel = ($current_selection == $c['course_id']) ? 'selected' : '';
                                            echo "<option value='".htmlspecialchars($c['course_id'])."' $sel>".htmlspecialchars($c['course_id'])."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <?php if ($current_selection): ?>
                        <div class="management-grid">
                            <div class="card">
                                <h3>Basic Information</h3>
                                <form action="update-batch.php" method="get" class="modern-form inline-form mt-1">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Batch Size</label>
                                    <input type="number" name="students" placeholder="Seats">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <form action="update-date.php" method="get" class="modern-form inline-form mt-2">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Start Date</label>
                                    <input type="text" name="course_date" placeholder="yyyy/mm/dd">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <form action="update-month.php" method="get" class="modern-form inline-form mt-2">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Duration</label>
                                    <input type="text" name="duration_months" placeholder="Months">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>

                            <div class="card">
                                <h3>Class & Delivery</h3>
                                <form action="update-time.php" method="get" class="modern-form inline-form mt-1">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Class Time</label>
                                    <input type="text" name="course_time" placeholder="Time">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <form action="update-hours.php" method="get" class="modern-form inline-form mt-2">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Total Hours</label>
                                    <input type="text" name="duration_hours" placeholder="Hours">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <form action="update-type.php" method="get" class="modern-form inline-form mt-2">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Course Type</label>
                                    <input type="text" name="course_type" placeholder="Type">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>

                            <div class="card">
                                <h3>Fees & Links</h3>
                                <form action="update-payments.php" method="get" class="modern-form inline-form mt-1">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <label>Course Fee</label>
                                    <input type="text" name="payments" placeholder="Fee">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <form action="update-link.php" method="get" class="modern-form mt-2">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($current_selection); ?>">
                                    <div class="input-group">
                                        <label>Class Link</label>
                                        <textarea name="link" class="modern-select" style="min-height: 80px;" placeholder="Zoom/Meet Link"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary full-width">Update Link</button>
                                </form>
                            </div>
                        </div>
                        <?php else: ?>
                            <div class="card text-center">
                                <p>Please select a course to access management tools.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="add-course-section" class="sub-tab-content">
                        <div class="card">
                            <h3>Create New Course</h3>
                            <form action="entry4.php" method="get" class="modern-form mt-1">
                                <div class="management-grid">
                                    <div class="col">
                                        <div class="input-group">
                                            <label>Course ID <font color="red">*</font></label>
                                            <input type="text" name="course_id" placeholder="e.g. iot" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Course Name <font color="red">*</font></label>
                                            <input type="text" name="course_name" placeholder="e.g. Arduino Robotics" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Class Time <font color="red">*</font></label>
                                            <input type="time" name="course_time" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Start Date <font color="red">*</font></label>
                                            <input type="date" name="course_date" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <label>Duration Months <font color="red">*</font></label>
                                            <input type="text" name="duration_months" placeholder="e.g. 6 Months" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Duration Hours <font color="red">*</font></label>
                                            <input type="text" name="duration_hours" placeholder="e.g. 120 Hours" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Course Type <font color="red">*</font></label>
                                            <input type="text" name="course_type" placeholder="Online | Institute" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Batch Size <font color="red">*</font></label>
                                            <input type="number" name="students" placeholder="e.g. 20" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <label>Course Payments <font color="red">*</font></label>
                                            <input type="text" name="payments" placeholder="e.g. 15000" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Class Link <font color="red">*</font></label>
                                            <textarea name="link" class="modern-select" style="min-height: 100px;" required placeholder="Meeting Link"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-actions mt-2" style="justify-content: flex-end;">
                                    <button type="reset" class="btn btn-secondary">Clear Form</button>
                                    <button type="submit" class="btn btn-primary">Create Course</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    <?php endif; ?>
</div>

<style>
.admin-wrapper {
    min-height: 90vh;
    padding: 3rem 0;
    background: radial-gradient(circle at top right, rgba(99, 102, 241, 0.05), transparent),
                radial-gradient(circle at bottom left, rgba(16, 185, 129, 0.05), transparent);
}

.admin-login-section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 6rem 1.5rem;
}

.login-card {
    max-width: 450px !important;
    width: 100%;
    padding: 3.5rem !important;
    border-radius: 32px !important;
}

.dashboard-layout {
    max-width: 1500px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 3rem;
    padding: 0 2rem;
}

.admin-sidebar {
    background: #1e293b;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 32px;
    padding: 3rem 2rem;
    height: fit-content;
    position: sticky;
    top: 100px;
    box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.4);
}

.admin-profile {
    text-align: center;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.dash-img {
    width: 100px;
    height: 100px;
    border-radius: 28px;
    margin-bottom: 1.25rem;
    border: 3px solid var(--primary);
    padding: 4px;
    object-fit: cover;
}

.admin-profile h3 {
    font-size: 1.25rem;
    font-weight: 800;
    color: white;
}

.admin-profile p {
    color: var(--primary);
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.admin-nav {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 2.5rem;
}

.nav-item {
    background: transparent;
    border: none;
    color: #94a3b8;
    padding: 1.1rem 1.5rem;
    text-align: left;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 1.25rem;
    font-weight: 700;
    font-size: 1rem;
}

.nav-item i {
    font-size: 1.2rem;
    width: 20px;
    text-align: center;
}

.nav-item:hover {
    background: rgba(255, 255, 255, 0.03);
    color: white;
    transform: translateX(5px);
}

.nav-item.active {
    background: var(--primary);
    color: white;
    box-shadow: 0 15px 30px -8px rgba(99, 102, 241, 0.4);
}

.admin-main {
    min-height: 800px;
}

.tab-content {
    display: none;
    animation: fadeIn 0.4s ease-out;
}

.tab-content.active {
    display: block;
}

.dashboard-header {
    margin-bottom: 3rem;
}

.dashboard-header h1 {
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: -0.02em;
    margin-bottom: 0.5rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: #1e293b;
    border: 1px solid rgba(255, 255, 255, 0.05);
    padding: 2rem;
    border-radius: 28px;
    display: flex;
    align-items: center;
    gap: 1.75rem;
    transition: all 0.3s ease;
    box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.3);
}

.stat-card:hover {
    transform: translateY(-8px);
    border-color: rgba(99, 102, 241, 0.3);
}

.stat-icon {
    width: 64px;
    height: 64px;
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
}

.stat-info h4 {
    font-size: 0.9rem;
    color: #94a3b8;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.stat-info .count {
    font-size: 2.2rem;
    font-weight: 800;
    color: white;
    line-height: 1;
}

.mini-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.mini-stat {
    background: rgba(255, 255, 255, 0.03);
    padding: 0.75rem 1.25rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.95rem;
    color: #cbd5e1;
}

.mini-stat span {
    color: var(--primary);
    font-weight: 800;
    margin-left: 0.5rem;
}

/* Tables */
.table-container {
    background: #1e293b;
    border-radius: 28px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    overflow: hidden;
    padding: 1rem;
}

.modern-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.modern-table th {
    padding: 1.5rem;
    text-align: left;
    color: #94a3b8;
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid rgba(255, 255, 255, 0.05);
}

.modern-table td {
    padding: 1.5rem;
    color: #cbd5e1;
    border-bottom: 1px solid rgba(255, 255, 255, 0.03);
    font-weight: 500;
}

.modern-table tr:hover td {
    background: rgba(255, 255, 255, 0.02);
    color: white;
}

.badge {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
    padding: 0.4rem 1rem;
    border-radius: 10px;
    font-size: 0.85rem;
    font-weight: 700;
}

.modern-select {
    background-color: #111827 !important;
    border-radius: 16px !important;
    padding: 1rem 1.25rem !important;
    color: white !important;
}

@media (max-width: 1100px) {
    .dashboard-layout { grid-template-columns: 1fr; gap: 2rem; }
    .admin-sidebar { position: static; width: 100%; }
}
</style>

<script>
function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    
    const content = document.getElementById(tabId);
    if (content) content.classList.add('active');
    
    const navItem = Array.from(document.querySelectorAll('.nav-item')).find(n => 
        n.getAttribute('onclick') && n.getAttribute('onclick').includes(tabId)
    );
    if (navItem) navItem.classList.add('active');
}

function showSubTab(subId) {
    document.querySelectorAll('.sub-tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.sub-tab-btn').forEach(b => b.classList.remove('active'));
    
    const content = document.getElementById(subId + '-section');
    if (content) content.classList.add('active');
    
    if (event && event.target) {
        event.target.classList.add('active');
    }
}

// Auto-open tab based on URL or session
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('selected_course')) {
        showTab('courses');
    } else if (urlParams.has('send')) {
        showTab('courses');
    } else if (urlParams.has('nic_no') || urlParams.has('student_name') || urlParams.has('city') || urlParams.has('course_filter') || urlParams.get('tab') === 'registers') {
        showTab('registers');
    }
}
</script>

<?php include("includes/footer.php"); ?>