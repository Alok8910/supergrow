<section id="home" class="hero-section bg-light">
    <div class="hero-bg-elements">
        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80" class="floating-food food-1" alt="Healthy bowl">
        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80" class="floating-food food-2" alt="Pizza plate">
        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=600&q=80" class="floating-food food-3" alt="BBQ food">
    </div>
    <div class="ambient-orb"></div>
    <div class="hero-container">
        <div class="hero-text animate-load">
            <h1>Manage Your Meals.<br>
                <span class="live-gradient">Apply for Mess Cuts.</span>
            </h1>
            <p>Going home for the weekend or eating outside today? Just log it on the app. Don't pay for meals you don't eat, and help the hostel stop wasting cooked food.</p>
            <div class="cta-wrapper">
                <a href="#features" class="btn btn-primary btn-xl">
                    <i class="fa-solid fa-compass"></i> See How It Works
                </a>
            </div>
        </div>
        <div class="hero-card-wrapper reveal delay-1">
            <div class="card-base login-card">
                <h2><i class="fa-solid fa-right-to-bracket text-primary mr-2"></i> Student Login</h2>
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
                    <div class="form-group">
                        <div class="form-input-wrapper">
                            <i class="fa-solid fa-id-card"></i>
                            <input name="username" type="text" id="userId" class="form-input" placeholder="Registration No. / Roll No." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <input name="password" type="password" id="password" class="form-input" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="auth-actions">
                        <label class="auth-checkbox">
                            <input type="checkbox" name="remember" id="rememberMe" value="1">
                            <span>Remember me</span>
                        </label>
                        <a href="/forgot" class="auth-link">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-large mt-3">
                        Login <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <div class="signup-link">
                        Don't have an account? <a href="/signup" class="auth-link">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="shape-divider-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill-white"></path>
        </svg>
    </div>
</section>

<section id="features" class="bg-white">
    <div class="section-header reveal">
        <h2><i class="fa-solid fa-bolt"></i> Made for Hostel Life</h2>
        <p>No more running to the warden for paper slips. Manage your daily meals right from your phone.</p>
    </div>
    <div class="features-grid">
        <div class="card-base feature-card reveal delay-1">
            <div class="feature-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
            <h3>Easy Mess Cuts</h3>
            <p>Going home for holidays or eating out? Just open the app and skip your meal for the day so you don't get charged.</p>
        </div>
        <div class="card-base feature-card reveal delay-2">
            <div class="feature-icon"><i class="fa-solid fa-users"></i></div>
            <h3>Exact Headcount</h3>
            <p>The kitchen checks the app everyday to see exactly how many students are eating. This means hot, fresh food for everyone and a lot less waste.</p>
        </div>
        <div class="card-base feature-card reveal delay-3">
            <div class="feature-icon"><i class="fa-solid fa-bell-concierge"></i></div>
            <h3>Today's Menu</h3>
            <p>Check what's cooking for dinner tonight. You'll also get instant alerts if the mess timings change or if there's a special feast.</p>
        </div>
        <div class="card-base feature-card reveal delay-4">
            <div class="feature-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
            <h3>Track Your Bill</h3>
            <p>Keep a clear check on your monthly hostel dues. See exactly how many meals you've eaten and how much money you've saved using mess cuts.</p>
        </div>
    </div>
    <div class="shape-divider-bottom" style="transform: rotate(180deg) scaleX(-1);">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill-light"></path>
        </svg>
    </div>
</section>

<section id="steps" class="bg-light">
    <div class="section-header reveal">
        <h2><i class="fa-solid fa-shoe-prints"></i> How to Start</h2>
        <p>Setting up your Smart Mess profile takes less than two minutes.</p>
    </div>
    <div class="features-grid">
        <div class="card-base feature-card reveal delay-1">
            <div class="feature-icon"><i class="fa-solid fa-1"></i></div>
            <h3>Register ID</h3>
            <p>Sign up using your assigned college registration number to verify you live in the hostel.</p>
        </div>
        <div class="card-base feature-card reveal delay-2">
            <div class="feature-icon"><i class="fa-solid fa-2"></i></div>
            <h3>Set Schedule</h3>
            <p>Log into your dashboard and toggle off any meals you plan to skip for the upcoming week.</p>
        </div>
        <div class="card-base feature-card reveal delay-3">
            <div class="feature-icon"><i class="fa-solid fa-3"></i></div>
            <h3>Scan & Eat</h3>
            <p>Just show your digital ID in the app at the dining hall entrance to grab your hot meal.</p>
        </div>
    </div>
    <div class="shape-divider-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill-white"></path>
        </svg>
    </div>
</section>

<section id="about" class="bg-white">
    <div class="section-header reveal">
        <h2><i class="fa-solid fa-bullseye"></i> Why We Need This</h2>
        <p>Helping students save money and helping the hostel save food.</p>
    </div>
    <div class="card-base about-content reveal delay-1">
        <p class="about-text">
            We all know the frustration of paying full mess fees even when we are visiting home or eating out with friends. On top of that, because the kitchen staff just guesses how much to cook, huge amounts of leftover food get thrown in the dustbin every single day. <strong style="color: var(--primary-red);">Smart Mess</strong> fixes this. Just update your app when you are skipping a meal. The staff cooks exactly what is needed, the hostel stops wasting food, and your monthly mess bill stays fair.
        </p>
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">Fair</div>
                <div class="stat-label">Mess Bills</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Zero</div>
                <div class="stat-label">Paper Cards</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Less</div>
                <div class="stat-label">Food Wasted</div>
            </div>
        </div>
    </div>
    <div class="shape-divider-bottom" style="transform: rotate(180deg) scaleX(-1);">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill-light"></path>
        </svg>
    </div>
</section>
<section id="faq" class="bg-light">
    <div class="section-header reveal">
        <h2><i class="fa-solid fa-circle-question"></i> Common Questions</h2>
        <p>Everything you need to know about your mess account.</p>
    </div>
    <div class="faq-grid">
        <div class="card-base faq-card reveal delay-1">
            <h3>What is the cutoff time for a mess cut?</h3>
            <p>You must apply for a mess cut at least 12 hours before the scheduled meal time. This gives the kitchen enough notice to adjust their cooking quantities.</p>
        </div>
        <div class="card-base faq-card reveal delay-2">
            <h3>Can I cancel a mess cut if my plans change?</h3>
            <p>Yes, as long as it is done before the 12-hour cutoff window. Once the cutoff passes, the kitchen has already started prep and the cut is locked.</p>
        </div>
        <div class="card-base faq-card reveal delay-3">
            <h3>How are the savings calculated in my bill?</h3>
            <p>At the end of every month, the total cost of all your approved "skipped meals" is automatically deducted from your final hostel invoice.</p>
        </div>
    </div>
    <div class="shape-divider-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill-white"></path>
        </svg>
    </div>
</section>
<section id="contact" class="bg-white">
    <div class="section-header reveal">
        <h2><i class="fa-solid fa-headset"></i> Hostel Helpdesk</h2>
        <p>Is your account locked? Need to fix an error in your monthly bill? Reach out to the team.</p>
    </div>
    <div class="contact-container">
        <div class="contact-info">
            <div class="card-base contact-card reveal delay-1">
                <i class="fa-solid fa-location-dot"></i>
                <div class="contact-details">
                    <h4>Chief Warden's Office</h4>
                    <p>Admin Block, Ground Floor</p>
                </div>
            </div>
            <div class="card-base contact-card reveal delay-2">
                <i class="fa-solid fa-envelope-open-text"></i>
                <div class="contact-details">
                    <h4>Mess Committee</h4>
                    <p>mess-support@college.edu</p>
                </div>
            </div>
            <div class="card-base contact-card reveal delay-3">
                <i class="fa-solid fa-phone"></i>
                <div class="contact-details">
                    <h4>Student Helpline</h4>
                    <p>+91 1800-123-4567</p>
                </div>
            </div>
        </div>
        <div class="card-base contact-form reveal delay-4">
            <form action="#" method="POST">
                <div class="form-group">
                    <label class="form-label" for="name">Your Name & Roll No.</label>
                    <input type="text" id="name" class="form-input input-standard" placeholder="e.g. Rahul Kumar - CS102" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="subject">What's the issue?</label>
                    <input type="text" id="subject" class="form-input input-standard" placeholder="e.g. Login problem, Mess cut not working" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="message">Explain the problem</label>
                    <textarea id="message" class="form-input textarea-standard" placeholder="Please type your issue here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-large mt-3">
                    <i class="fa-solid fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>
</section>
<footer>
    Made by Supergrow team with <i class="fa-solid fa-heart"></i>
</footer>