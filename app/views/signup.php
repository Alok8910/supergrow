<section>
    <div class="hero-bg-layer">
        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80" class="food-img food-1" alt="Healthy bowl">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80" class="food-img food-2" alt="Pizza plate">
    </div>
    <div class="container text-center">
        <div class="max-w-lg mb-6">
            <h1 class="display-2 cascade-1">Join <span class="live-gradient">Smart Mess.</span></h1>
            <p class="text-lead cascade-2">Register your student ID to start managing your meals, applying for mess cuts, and tracking your monthly hostel bills.</p>
        </div>
        <div class="card card-glass cascade-3 max-w-lg" style="margin: 0 auto;">
            <h2 class="heading-3 text-center mb-6" style="margin-bottom: 24px;">Create Student Account</h2>
            <?php if (!empty($success)): ?>
                <div class="auth-alert auth-alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <div><?php echo $successText; ?></div>
                </div>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
                <div class="auth-alert auth-alert-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div><?php echo $errorText; ?></div>
                </div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-user"></i>
                            <input name="name" type="text" class="form-input" placeholder="Alok kumar mandal" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Id</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-envelope"></i>
                            <input name="email" type="text" class="form-input" placeholder="example@gamil.com" required>
                        </div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">College Roll No.</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-id-card"></i>
                            <input name="roll_no" type="text" class="form-input" placeholder="24/CSE/312" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Registration No.</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-building"></i>
                            <input name="reg_no" type="number" class="form-input" placeholder="24050440012" required>
                        </div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Phone No.</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-id-card"></i>
                            <input name="phone" type="number" class="form-input" placeholder="9905575369" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address.</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-building"></i>
                            <input name="address" type="text" class="form-input" placeholder="Ranchi,tataisilwai" required>
                        </div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Create Password</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-lock"></i>
                            <input name="password" type="password" class="form-input" placeholder="Min. 8 characters" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-check-double"></i>
                            <input name="password_confirm" type="password" class="form-input" placeholder="Repeat password" required>
                        </div>
                    </div>
                </div>
                <div style="text-align: left; margin-bottom: 20px; margin-top: 5px; font-size: 0.9rem;">
                    <label style="display: inline-flex; align-items: center; gap: 8px; color: var(--text-gray); cursor: pointer;">
                        <input type="checkbox" name="check" value="1" required style="accent-color: var(--primary-red); width: 14px; height: 14px; border-radius: 3px;">
                        <span>I agree to <a href="/policy" class="auth-link">rules and regulations</a>.</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-large">
                    Register Now <i class="fa-solid fa-arrow-right"></i>
                </button>
                <div class="text-center text-sm signup-link">
                    Already registered? <a href="/" class="auth-link">Login Here</a>
                </div>
            </form>
        </div>

    </div>
</section>