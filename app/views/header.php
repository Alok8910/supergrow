<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $page = route(0);if (!$page) {$page = "login";}echo "<title>" . ucfirst($page) . " - Smart Mess Student Portal</title>";?>
    <link rel="stylesheet" href="/assets/css/userstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php if (!$auth){ ?>
    <nav class="navbar">
        <?php if ($page == "login") { ?>
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <i class="fa fa-cutlery"></i>
                <span>Smart Mess</span>
            </a>
            <div class="nav-menu">
                <a href="#home" class="nav-link nav-item active"><i class="fa-solid fa-house"></i> Home</a>
                <a href="#features" class="nav-link nav-item"><i class="fa-solid fa-bolt"></i> Features</a>
                <a href="#steps" class="nav-link nav-item"><i class="fa-solid fa-shoe-prints"></i> Steps</a>
                <a href="#about" class="nav-link nav-item"><i class="fa-solid fa-bullseye"></i> Impact</a>
                <a href="#contact" class="nav-link nav-item"><i class="fa-solid fa-envelope"></i> Help</a>
            </div>
            <div class="desktop-cta">
                <a href="/signup" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> New Student</a>
            </div>
            <button id="menu-btn" class="mobile-toggle" aria-expanded="false" aria-label="Toggle navigation">
                <i id="icon-menu" class="fa-solid fa-bars"></i>
                <i id="icon-close" class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <?php } else { ?>
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <i class="fa fa-cutlery"></i>
                <span>Smart Mess</span>
            </a>
            <div class="desktop-cta">
                <a href="/" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back to Login</a>
            </div>
            <div class="mobile-toggle">
                <a href="/" class="auth-link"><i class="fa-solid fa-arrow-left"></i> Login</a>
            </div>
        </div>
        <?php } ?>
        <div id="mobile-menu" class="mobile-menu">
            <div class="mobile-links-container">
                <a href="#home" class="mobile-link nav-item active"><i class="fa-solid fa-house"></i> Home</a>
                <a href="#features" class="mobile-link nav-item"><i class="fa-solid fa-bolt"></i> Features</a>
                <a href="#steps" class="mobile-link nav-item"><i class="fa-solid fa-shoe-prints"></i> Steps</a>
                <a href="#about" class="mobile-link nav-item"><i class="fa-solid fa-bullseye"></i> Impact</a>
                <a href="#contact" class="mobile-link nav-item"><i class="fa-solid fa-envelope"></i> Help</a>
            </div>
            <div class="mobile-cta-container">
                <a href="/signup" class="btn btn-primary btn-large"><i class="fa-solid fa-user-plus"></i> New Student</a>
            </div>
        </div>
    </nav>
    
    <?php } else { ?>
    <nav class="navbar">
        <div class="nav-container">
            <a href="/dashboard" class="nav-brand">
                <i class="fa fa-cutlery"></i>
                <span>Smart Mess</span>
            </a>
            <div class="nav-menu desktop-only">
                <a href="/" class="nav-link nav-item <?php if(route(0) == ""){echo "active";} ?>"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a href="/menu" class="nav-link nav-item <?php if(route(0) == "menu"){echo "active";} ?>"><i class="fa-solid fa-calendar-days"></i> Meal Menu</a>
                <a href="/payments" class="nav-link nav-item <?php if(route(0) == "payments"){echo "active";} ?>"><i class="fa-solid fa-qrcode"></i> payments</a>
                <a href="/history" class="nav-link nav-item <?php if(route(0) == "history"){echo "active";} ?>"><i class="fa-solid fa-clock-rotate-left"></i> History</a>
                <a href="/profile" class="nav-link nav-item <?php if(route(0) == "profile"){echo "active";} ?>"><i class="fa-solid fa-user"></i> Profile</a>
            </div>
            <div class="desktop-cta">
                <a href="/logout" class="btn btn-primary" >
                    <i class="fa fa-power-off"></i> Logout
                </a>
            </div>
            <div class="mobile-toggle">
                <a href="/logout" class="auth-link" style="text-primary">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </div>
    </nav>
    <div class="mobile-bottom-nav">
    <a href="/" class="bottom-link <?php if(route(0) == ""){echo "active";} ?>">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
    </a>
    <a href="/menu" class="bottom-link <?php if(route(0) == "menu"){echo "active";} ?>">
        <i class="fa-solid fa-calendar-days"></i>
        <span>Menu</span>
    </a>
    <div class="bottom-center-wrapper <?php if(route(0) == "payments"){echo "active";} ?>">
        <a href="/payments" class="bottom-center-btn">
            <i class="fa-solid fa-qrcode"></i>
        </a>
    </div>
    <a href="/history" class="bottom-link <?php if(route(0) == "history"){echo "active";} ?>">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <span>History</span>
    </a>
    <a href="/profile" class="bottom-link <?php if(route(0) == "profile"){echo "active";} ?>">
        <i class="fa-solid fa-user"></i>
        <span>Profile</span>
    </a>
</div>
    <?php } ?>
    
