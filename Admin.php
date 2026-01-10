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
    min-height: 80vh;
    padding: 2rem 0;
}

.admin-login-section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 4rem 1.5rem;
}

.dashboard-layout {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 2rem;
    padding: 0 1.5rem;
}

.admin-sidebar {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 24px;
    padding: 2.5em;
    height: fit-content;
    position: sticky;
    top: 100px;
}

.admin-profile {
    text-align: center;
    margin-bottom: 2.5rem;
}

.dash-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 1rem;
    border: 3px solid var(--primary);
}

.admin-nav {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 2rem;
}

.nav-item {
    background: transparent;
    border: none;
    color: var(--text-muted);
    padding: 1rem;
    text-align: left;
    border-radius: 12px;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 1rem;
    font-weight: 500;
}

.nav-item:hover, .nav-item.active {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
}

.admin-main {
    min-height: 600px;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
    animation: fadeIn 0.3s ease;
}

.dashboard-header {
    margin-bottom: 2.5rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

.stat-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    padding: 1.5rem;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.stat-icon {
    width: 48px;
    height: 48px;
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-info h4 {
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

.stat-info .count {
    font-size: 1.5rem;
    font-weight: 700;
}

.mini-stats {
    display: flex;
    gap: 2rem;
    margin-top: 1rem;
}

.mini-stat span {
    color: var(--primary);
    font-weight: 700;
}

/* Tables */
.table-container {
    overflow-x: auto;
}

.modern-table {
    width: 100%;
    border-collapse: collapse;
}

.modern-table th, .modern-table td {
    padding: 1.2rem;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.modern-table th {
    color: var(--text-muted);
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
}

/* Messages */
.messages-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.message-card .msg-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.msg-date {
    color: var(--text-muted);
    font-size: 0.8rem;
}

.msg-footer {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
}

.msg-footer a {
    color: var(--primary);
    text-decoration: none;
    font-size: 0.9rem;
}

@media (max-width: 900px) {
    .dashboard-layout { grid-template-columns: 1fr; }
    .admin-sidebar { position: static; }
    .management-grid { grid-template-columns: 1fr; }
}

.modern-select {
    width: 100%;
    padding: 0.8rem 1rem;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    color: var(--text-main);
    font-family: inherit;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1.5em;
}

.modern-select option {
    background-color: #0f172a; /* Force dark background for options */
    color: #f8fafc;
}

/* Chrome/Safari specific fix for options */
.modern-select:focus option {
    background-color: #1e293b;
}

.modern-table tr:hover {
    background: rgba(255, 255, 255, 0.05);
}

.modern-table td {
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    color: var(--text-main);
    vertical-align: middle;
}

.input-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--text-muted);
    font-size: 0.9rem;
    font-weight: 500;
}

.modern-form input[type="text"], 
.modern-form input[type="email"], 
.modern-form input[type="password"], 
.modern-form input[type="number"], 
.modern-form input[type="date"], 
.modern-form input[type="time"],
.modern-form textarea {
    width: 100%;
    padding: 0.8rem 1rem;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    color: var(--text-main);
    font-family: inherit;
    transition: var(--transition);
}

.modern-form input:focus {
    outline: none;
    border-color: var(--primary);
    background: rgba(255, 255, 255, 0.08);
}

.inline-form {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: nowrap;
}

.inline-form label {
    min-width: 100px;
    margin-bottom: 0;
    font-size: 0.85rem;
    color: var(--text-muted);
}

.inline-form input {
    flex: 1;
    min-width: 0;
}

.inline-form .btn {
    padding: 0.8rem 1.2rem;
    white-space: nowrap;
}

.search-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.search-actions {
    display: flex;
    gap: 1rem;
}

.tabs-sub {
    display: flex;
    gap: 1.5rem;
}

.sub-tab-btn {
    background: transparent;
    border: none;
    color: var(--text-muted);
    font-weight: 600;
    cursor: pointer;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid transparent;
    transition: var(--transition);
}

.sub-tab-btn.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
}

.sub-tab-content {
    display: none;
}

.sub-tab-content.active {
    display: block;
    animation: fadeIn 0.3s ease;
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