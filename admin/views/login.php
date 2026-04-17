<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Management | Culinary Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #fdfcfc;
            --surface-card: #ffffff;
            --brand-red: #d32f2f;         
            --brand-red-dark: #b71c1c;    
            --brand-red-light: #ffebee;   
            --text-dark: #202124;
            --text-muted: #5f6368;
            --border-color: #e0e0e0;
            --input-bg: #fafafa;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Outfit', sans-serif; 
            background-color: var(--bg-body);
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh;
            color: var(--text-dark);
            overflow: hidden;
            position: relative;
        }
        .bg-icon {
            position: absolute;
            color: var(--brand-red);
            opacity: 0.03;
            z-index: -1;
            pointer-events: none;
        }
        .icon-1 { top: -5%; left: -5%; font-size: 28rem; transform: rotate(-15deg); }
        .icon-2 { bottom: -10%; right: -5%; font-size: 32rem; transform: rotate(10deg); }
        .icon-3 { top: 15%; right: 15%; font-size: 12rem; transform: rotate(25deg); opacity: 0.02; }
        .login-container {
            width: 100%;
            max-width: 460px;
            padding: 20px;
            animation: fadeIn 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .login-card {
            background: var(--surface-card);
            padding: 48px 44px;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(211, 47, 47, 0.08),
                        0 0 0 1px rgba(0, 0, 0, 0.02);
            position: relative;
        }
        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--brand-red-dark), var(--brand-red));
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .logo-icon {
            width: 68px; height: 68px;
            background: var(--brand-red-light);
            color: var(--brand-red);
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
            margin: 0 auto 20px;
            font-size: 1.8rem;
            box-shadow: 0 10px 20px rgba(211, 47, 47, 0.1);
        }

        .login-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .login-header p {
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 400;
        }

        .error-banner {
            background: #fff5f5;
            border-left: 4px solid var(--brand-red);
            color: #c62828;
            padding: 14px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 24px;
            display: flex; align-items: center; gap: 10px;
        }

        .form-group { margin-bottom: 22px; }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-group label i {
            color: var(--brand-red);
            font-size: 0.8rem;
        }

        .input-wrapper { position: relative; }

        .form-control {
            width: 100%;
            padding: 15px 16px 15px 46px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            color: var(--text-dark);
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-control::placeholder { color: #aaa; }

        .form-control:focus {
            background: #ffffff;
            border-color: var(--brand-red);
            outline: none;
            box-shadow: 0 0 0 4px var(--brand-red-light);
        }

        .input-wrapper i.field-icon {
            position: absolute;
            left: 18px; top: 50%;
            transform: translateY(-50%);
            color: #9aa0a6;
            font-size: 1.1rem;
            transition: color 0.2s;
        }

        .form-control:focus + i.field-icon { color: var(--brand-red); }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: var(--brand-red);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex; align-items: center; justify-content: center; gap: 10px;
            margin-top: 14px;
        }

        .btn-login:hover {
            background: var(--brand-red-dark);
            box-shadow: 0 8px 25px rgba(211, 47, 47, 0.3);
            transform: translateY(-2px);
        }

        .btn-login:active { 
            transform: translateY(0); 
            box-shadow: 0 4px 10px rgba(211, 47, 47, 0.2);
        }

        .footer-links {
            text-align: center;
            margin-top: 32px;
        }

        .back-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link:hover { color: var(--brand-red); }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<i class="fa-solid fa-utensils bg-icon icon-1"></i>
<i class="fa-solid fa-mug-hot bg-icon icon-2"></i>
<i class="fa-solid fa-bowl-rice bg-icon icon-3"></i>
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">
                <i class="fa fa-cutlery"></i>
            </div>
            <h2>Smart Mess</h2>
            <p>Administer menus, staff, and mess logistics</p>
        </div>

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
                <label><i class="fa-solid fa-id-badge"></i> Usernanme</label>
                <div class="input-wrapper">
                    <input type="text" name="username" class="form-control" placeholder="chef_admin_01" required autofocus>
                    <i class="fa-solid fa-user-tie field-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-shield-halved"></i> Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    <i class="fa-solid fa-lock field-icon"></i>
                </div>
            </div>

            <button type="submit" class="btn-login">
                Access Mess Dashboard
                <i class="fa-solid fa-fire-burner"></i>
            </button>
        </form>
        <div class="footer-links">
            <a href="index.php" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Return to student Portal
            </a>
        </div>
    </div>
</div>

</body>
</html>