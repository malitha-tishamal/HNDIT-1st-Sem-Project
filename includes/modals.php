<!-- Log in Content -->
<div id="id01" class="modal modern-modal">
    <div class="modal-content animate-zoom">
        <div class="modal-header">
            <span onclick="document.getElementById('id01').style.display='none'" class="close-btn" title="Close Modal">&times;</span>
            <h2 class="modal-title">Welcome Back</h2>
            <p class="modal-subtitle">Don't have an account? <span class="toggle-link" onclick="toggleModals('id01', 'id02')">Sign Up</span></p>
        </div>
        
        <div class="modal-body">
            <div class="social-auth">
                <button class="social-btn google-btn" onclick="alert('Coming soon')">
                    <img src="images/google.png" alt="Google"> Google
                </button>
                <button class="social-btn fb-btn" onclick="alert('Coming soon')">
                    <img src="images/facebook2.png" alt="Facebook"> Facebook
                </button>
            </div>
            
            <div class="divider"><span>OR</span></div>
            
            <form class="auth-form" method="post" action="login_process.php">
                <div class="input-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
                </div>
                
                <div class="form-options">
                    <a href="#" class="forgot-pass">Forgot Password?</a>
                </div>

                <button type="submit" name="login_sub" class="submit-btn main-action-btn">Log In</button>
            </form>
        </div>
    </div>
</div>

<!-- Sign Up Content -->
<div id="id02" class="modal modern-modal">
    <div class="modal-content animate-zoom">
        <div class="modal-header">
            <span onclick="document.getElementById('id02').style.display='none'" class="close-btn" title="Close Modal">&times;</span>
            <h2 class="modal-title">Create Account</h2>
            <p class="modal-subtitle">Already have an account? <span class="toggle-link" onclick="toggleModals('id02', 'id01')">Log In</span></p>
        </div>
        
        <div class="modal-body">
            <div class="social-auth">
                <button class="social-btn google-btn" onclick="alert('Coming soon')">
                    <img src="images/google.png" alt="Google"> Google
                </button>
                <button class="social-btn fb-btn" onclick="alert('Coming soon')">
                    <img src="images/facebook2.png" alt="Facebook"> Facebook
                </button>
            </div>
            
            <div class="divider"><span>OR</span></div>
            
            <form class="auth-form" method="post" action="register_process.php">
                <div class="input-row">
                    <div class="input-group">
                        <label for="reg-fname">First Name</label>
                        <input type="text" id="reg-fname" name="first_name" placeholder="John" required>
                    </div>
                    <div class="input-group">
                        <label for="reg-lname">Last Name</label>
                        <input type="text" id="reg-lname" name="last_name" placeholder="Doe" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="input-group">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="password" placeholder="Create a password" required>
                </div>
                
                <div class="terms-group">
                    <input type="checkbox" id="terms" required checked>
                    <label for="terms" class="small-text">I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a></label>
                </div>
                
                <button type="submit" name="register_sub" class="submit-btn main-action-btn full-width">Create Account</button>
            </form>
        </div>
    </div>
</div>

<script>
function toggleModals(hideId, showId) {
    document.getElementById(hideId).style.display = 'none';
    document.getElementById(showId).style.display = 'block';
}
</script>
