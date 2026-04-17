<style>
    :root {
        --primary: #e11d48;
        --primary-hover: #be123c;
        --primary-light: #ffe4e6;
        --success: #10b981;
        --success-light: #d1fae5;
        --warning: #f59e0b;
        --warning-light: #fef3c7;
        --text-dark: #1f2937;
        --text-gray: #4b5563;
        --text-muted: #9ca3af;
        --bg-page: #f4f7f9;
        --card-bg: #ffffff;
        --border: #e5e7eb;
        --radius: 12px;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: var(--bg-page);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        color: var(--text-dark);
        line-height: 1.5;
        padding-bottom: 50px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .welcome-title {
        font-size: 1.8rem;
        margin-bottom: 25px;
        font-weight: 800;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--card-bg);
        padding: 20px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .icon-balance {
        background: #e0e7ff;
        color: #4f46e5;
    }

    .icon-skip {
        background: #fee2e2;
        color: #ef4444;
    }

    .icon-paid {
        background: #dcfce7;
        color: #16a34a;
    }

    .icon-saved {
        background: #fef3c7;
        color: #d97706;
    }

    .stat-info h3 {
        font-size: 0.9rem;
        color: var(--text-gray);
        font-weight: 600;
        margin-bottom: 2px;
    }

    .stat-info p {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--text-dark);
    }

    .main-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 25px;
    }

    @media (max-width: 900px) {
        .main-grid {
            grid-template-columns: 1fr;
        }
    }

    .dashboard-card {
        background: var(--card-bg);
        padding: 25px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border);
    }

    .card-header i {
        color: var(--primary);
    }

    .meal-box {
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 20px;
        margin-bottom: 20px;
        background: #f9fafb;
        transition: all 0.3s ease;
    }

    .meal-box.closed {
        opacity: 0.65;
        background: #f3f4f6;
        pointer-events: none;
        filter: grayscale(50%);
    }

    .meal-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .meal-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
    }

    .meal-time {
        font-size: 0.85rem;
        color: var(--text-gray);
        font-weight: 600;
        display: block;
        margin-top: 2px;
    }

    .meal-food {
        font-size: 1rem;
        color: var(--text-gray);
        margin-bottom: 15px;
    }

    .badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .badge-danger {
        background: #fee2e2;
        color: #ef4444;
    }

    .badge-success {
        background: #dcfce7;
        color: #16a34a;
    }

    .radio-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .custom-radio {
        display: block;
        position: relative;
        cursor: pointer;
    }

    .custom-radio input[type="radio"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .radio-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px;
        border: 2px solid var(--border);
        border-radius: 8px;
        font-weight: 600;
        color: var(--text-gray);
        transition: all 0.2s ease;
        background: var(--card-bg);
    }

    .custom-radio input[type="radio"][value="default"]:checked~.radio-content {
        border-color: var(--success);
        background: var(--success-light);
        color: var(--success);
    }

    .custom-radio input[type="radio"][value="skip"]:checked~.radio-content {
        border-color: var(--primary);
        background: var(--primary-light);
        color: var(--primary);
    }

    .btn-submit {
        width: 100%;
        padding: 16px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.3s ease;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: var(--primary-hover);
    }

    .status-item {
        padding: 15px;
        border: 1px solid var(--border);
        border-radius: 10px;
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .status-info h4 {
        margin-bottom: 2px;
        font-size: 1.05rem;
    }

    .status-info p {
        font-size: 0.9rem;
        color: var(--text-gray);
    }

    .status-pill {
        font-size: 0.85rem;
        font-weight: 700;
        background: #f3f4f6;
        padding: 6px 12px;
        border-radius: 20px;
        color: var(--text-dark);
    }
</style>

<div class="container">
    <h2 class="welcome-title">Welcome back, <?= htmlspecialchars($user['full_name']) ?> 👋</h2>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon icon-balance"><i class="fa-solid fa-wallet"></i></div>
            <div class="stat-info">
                <h3>Current Balance</h3>
                <p>₹<?= number_format($balance, 2) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-skip"><i class="fa-solid fa-ban"></i></div>
            <div class="stat-info">
                <h3>Skipped Meals</h3>
                <p><?= $skipped ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-paid"><i class="fa-solid fa-credit-card"></i></div>
            <div class="stat-info">
                <h3>Total Paid</h3>
                <p>₹<?= number_format($total_paid, 2) ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-saved"><i class="fa-solid fa-leaf"></i></div>
            <div class="stat-info">
                <h3>Food Saved (Units)</h3>
                <p><?= $food_saved ?></p>
            </div>
        </div>
    </div>

    <div class="main-grid">

        <div class="dashboard-card">
            <div class="card-header"><i class="fa-solid fa-clipboard-list"></i> Select Your Meals</div>

            <form method="POST">
                <?php if (empty($meals)): ?>
                    <p style="text-align:center; padding: 20px; color: var(--text-muted);">No menu available for today.</p>
                <?php else: ?>
                    <?php foreach ($meals as $type => $data):
                        $current = $user_intents[$type] ?? 'default';
                        $closed = isClosed($data[2], $current_time);
                    ?>
                        <div class="meal-box <?= $closed ? 'closed' : '' ?>">
                            <div class="meal-top">
                                <div>
                                    <div class="meal-title"><?= $type ?></div>
                                    <span class="meal-time"><i class="fa-regular fa-clock"></i> <?= ftime($data[1]) ?> - <?= ftime($data[2]) ?></span>
                                </div>
                                <?php if ($closed): ?>
                                    <span class="badge badge-danger">Closed</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Active</span>
                                <?php endif; ?>
                            </div>
                            <p class="meal-food"><?= htmlspecialchars($data[0]) ?></p>
                            <?php if ($closed): ?>
                                <div style="color: #ef4444; font-size: 0.85rem; font-weight: 600; margin-bottom: 10px;">
                                    <i class="fa-solid fa-lock"></i> Meal time has ended. Selection locked.
                                </div>
                            <?php endif; ?>
                            <div class="radio-group">
                                <label class="custom-radio">
                                    <input type="radio" name="meal[<?= $type ?>]" value="default" <?= $current == 'default' ? 'checked' : '' ?> <?= $closed ? 'disabled' : '' ?>>
                                    <span class="radio-content"><i class="fa-solid fa-utensils"></i> Eat</span>
                                </label>

                                <label class="custom-radio">
                                    <input type="radio" name="meal[<?= $type ?>]" value="skip" <?= $current == 'skip' ? 'checked' : '' ?> <?= $closed ? 'disabled' : '' ?>>
                                    <span class="radio-content"><i class="fa-solid fa-scissors"></i> Skip (Cut)</span>
                                </label>
                            </div>

                        </div>
                    <?php endforeach; ?>
                    <button type="submit" name="save" class="btn-submit"><i class="fa-solid fa-floppy-disk"></i> Save Preferences</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="dashboard-card">
            <div class="card-header"><i class="fa-solid fa-bell-concierge"></i> Today's Status</div>
            <?php if (empty($meals)): ?>
                <p style="text-align:center; padding: 20px; color: var(--text-muted);">No meals scheduled.</p>
            <?php else: ?>
                <?php foreach ($meals as $type => $data):
                    $skip = ($user_intents[$type] ?? '') == 'skip';
                    $status_text = status($data[1], $data[2], $current_time, $skip);
                ?>
                    <div class="status-item">
                        <div class="status-info">
                            <h4><?= $type ?></h4>
                            <p><?= htmlspecialchars($data[0]) ?></p>
                        </div>
                        <div class="status-pill">
                            <?= $status_text ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>