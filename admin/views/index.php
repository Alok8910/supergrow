<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Mess Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-red: #dc2626;
            --primary-red-light: #fef2f2;
            --text-dark: #111827;
            --text-muted: #6b7280;
            --bg-body: #f3f4f6;
            --bg-card: #ffffff;
            --border-color: #e5e7eb;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            background-color: var(--bg-body);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }


        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--bg-card);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand i {
            font-size: 1.5rem;
            color: var(--primary-red);
        }

        .sidebar-brand h2 {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .close-sidebar {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .nav-links {
            list-style: none;
            padding: 20px 0;
            flex: 1;
        }

        .nav-links li {
            padding: 4px 20px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            padding: 12px 16px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background-color: var(--primary-red-light);
            color: var(--primary-red);
        }


        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 30px;
            transition: margin-left 0.3s ease;
            width: calc(100% - var(--sidebar-width));
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-toggle {
            display: none;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 1.2rem;
            cursor: pointer;
            color: var(--text-dark);
        }

        .top-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--bg-card);
            padding: 24px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-info h3 {
            font-size: 0.9rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .stat-info .value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background-color: var(--primary-red-light);
            color: var(--primary-red);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }


        .waste-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 24px;
        }

        .card h3 {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 12px;
        }

        .metrics-row {
            display: flex;
            justify-content: space-between;
            text-align: center;
            margin-bottom: 20px;
        }

        .metric-item {
            flex: 1;
        }

        .metric-item:not(:last-child) {
            border-right: 1px solid var(--border-color);
        }

        .metric-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .metric-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            text-transform: uppercase;
            font-weight: 600;
        }

        .metric-loss {
            color: var(--primary-red);
        }


        .progress-wrapper {
            margin-bottom: 20px;
        }

        .progress-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .progress-bar {
            width: 100%;
            height: 12px;
            background: var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
        }

        .progress-consumed {
            height: 100%;
            background: #10b981;
        }

        .progress-wasted {
            height: 100%;
            background: var(--primary-red);
        }

        .staff-suggestion {
            padding: 16px;
            border-radius: 8px;
            border-left: 4px solid;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .staff-suggestion i {
            font-size: 1.2rem;
            margin-top: 2px;
        }

        .suggestion-content h4 {
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .suggestion-content p {
            font-size: 0.85rem;
            line-height: 1.5;
            color: var(--text-dark);
        }

        .alert-success {
            background: #ecfdf5;
            border-color: #10b981;
            color: #065f46;
        }

        .alert-warning {
            background: #fffbeb;
            border-color: #f59e0b;
            color: #92400e;
        }

        .alert-critical {
            background: var(--primary-red-light);
            border-color: var(--primary-red);
            color: #991b1b;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background: var(--primary-red);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-submit:hover {
            background: #b91c1c;
        }

        .success-toast {
            background: #ecfdf5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-card {
            background-color: var(--bg-card);
            padding: 24px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .chart-card h3 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .canvas-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .table-container {
            background-color: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 24px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-container h3 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 700px;
        }

        th {
            padding: 12px 16px;
            border-bottom: 2px solid var(--border-color);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.95rem;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-1 {
            background: #ecfdf5;
            color: #065f46;
        }

        .status-0 {
            background: var(--primary-red-light);
            color: var(--primary-red);
        }

        @media (max-width: 1024px) {

            .waste-grid,
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
                box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            }

            .close-sidebar {
                display: block;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .top-header h1 {
                font-size: 1.4rem;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .metrics-row {
                flex-direction: column;
                gap: 15px;
            }

            .metric-item:not(:last-child) {
                border-right: none;
                border-bottom: 1px solid var(--border-color);
                padding-bottom: 15px;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <i class="fa-solid fa-utensils"></i>
                <h2>MessAdmin</h2>
            </div>
            <button class="close-sidebar" id="closeSidebar"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <ul class="nav-links">
            <li><a href="#" class="active"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa-solid fa-users"></i> Students</a></li>
            <li><a href="#"><i class="fa-solid fa-clipboard-list"></i> Mess Menu</a></li>
            <li><a href="#"><i class="fa-solid fa-indian-rupee-sign"></i> Payments</a></li>
            <li><a href="#"><i class="fa-solid fa-qrcode"></i> Meal Scans</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
            <li><a href="/admin/logout"><i class="fa-solid fa-power-off"></i> Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <button class="menu-toggle" id="menuToggle"><i class="fa-solid fa-bars"></i></button>
                <h1>Dashboard Overview</h1>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Total Students</h3>
                    <div class="value"><?= number_format($total_students) ?></div>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Meals Saved (Skipped)</h3>
                    <div class="value"><?= number_format($total_skipped) ?></div>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-ban"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Scanned Today</h3>
                    <div class="value"><?= number_format($scanned_today) ?></div>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-check-double"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Total Revenue Collected</h3>
                    <div class="value">₹<?= number_format($total_revenue) ?></div>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-wallet"></i></div>
            </div>
        </div>

        <div class="section-title">
            <span><i class="fa-solid fa-leaf" style="color: var(--primary-red); margin-right: 8px;"></i> Kitchen Operations & Waste Tracker</span>
            <span style="font-size: 0.9rem; color: var(--text-muted); font-weight: 500;">Data for: <?= date('M d', strtotime($target_date)) ?> (<?= $meal_type ?>)</span>
        </div>

        <div class="waste-grid">
            <div class="card">
                <div class="metrics-row">
                    <div class="metric-item">
                        <div class="metric-value"><?= $prepared_meals ?></div>
                        <div class="metric-label">Prepared Target</div>
                    </div>
                    <div class="metric-item">
                        <div class="metric-value"><?= $actual_consumed ?></div>
                        <div class="metric-label">Actual Consumed</div>
                    </div>
                    <div class="metric-item">
                        <div class="metric-value metric-loss"><?= $wasted_portions > 0 ? $wasted_portions : 0 ?></div>
                        <div class="metric-label">Portions Wasted</div>
                    </div>
                </div>

                <div class="progress-wrapper">
                    <div class="progress-labels">
                        <span>0%</span>
                        <span><?= $prepared_meals ?> Total Portions</span>
                    </div>
                    <div class="progress-bar">
                        <?php
                        $consumed_width = $prepared_meals > 0 ? ($actual_consumed / $prepared_meals) * 100 : 0;
                        $consumed_width = min($consumed_width, 100);
                        $wasted_width = 100 - $consumed_width;
                        ?>
                        <div class="progress-consumed" style="width: <?= $consumed_width ?>%;" title="Consumed"></div>
                        <?php if ($wasted_portions > 0): ?>
                            <div class="progress-wasted" style="width: <?= $wasted_width ?>%;" title="Wasted"></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="staff-suggestion <?= $suggestion_class ?>">
                    <i class="fa-solid <?= $icon ?>"></i>
                    <div class="suggestion-content">
                        <h4><?= $suggestion_title ?></h4>
                        <p><?= $suggestion_text ?></p>
                    </div>
                </div>
            </div>

            <div class="card" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h3>Financial Impact</h3>
                    <div style="text-align: center; margin-bottom: 20px;">
                        <span style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; font-weight: 600;">Estimated Loss</span>
                        <div style="font-size: 2.2rem; font-weight: 800; color: var(--primary-red);">
                            ₹<?= number_format($financial_loss, 2) ?>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 style="margin-bottom: 10px; padding-bottom: 0; border-bottom: none; font-size: 0.95rem;">Buffer Setting</h3>
                    <?php if ($show_success_msg): ?>
                        <div class="success-toast"><i class="fa-solid fa-circle-check"></i> Settings Saved</div>
                    <?php endif; ?>

                    <form method="POST" style="display: flex; gap: 10px; align-items: flex-end;">
                        <div class="form-group" style="flex: 1; margin-bottom: 0;">
                            <input type="number" name="buffer" class="form-control" value="<?= $buffer_percentage * 100 ?>" min="0" max="30" placeholder="%">
                        </div>
                        <button type="submit" class="btn-submit" style="width: auto; padding: 8px 16px;">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="charts-grid">
            <div class="chart-card">
                <h3>Meal Intentions (Last 7 Days)</h3>
                <div class="canvas-container">
                    <canvas id="mealChart"></canvas>
                </div>
            </div>
            <div class="chart-card">
                <h3>Payment Status</h3>
                <div class="canvas-container">
                    <canvas id="paymentChart"></canvas>
                </div>
            </div>
        </div>

        <div class="table-container">
            <h3>Recently Registered Students</h3>
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Balance Due</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($recent_students)): ?>

                        <?php foreach ($recent_students as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['roll_no'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['full_name'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['email'] ?? '') ?></td>
                                <td>
                                    <?php if (($row['status'] ?? '') == '1'): ?>
                                        <span class="status-badge status-1">Active</span>
                                    <?php else: ?>
                                        <span class="status-badge status-0">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>₹<?= number_format($row['balance'] ?? 0, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: #6b7280;">
                                No students found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        document.getElementById('menuToggle').addEventListener('click', () => sidebar.classList.add('active'));
        document.getElementById('closeSidebar').addEventListener('click', () => sidebar.classList.remove('active'));
        new Chart(document.getElementById('mealChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($days) ?>,
                datasets: [{
                        label: 'Meals Consumed',
                        data: <?= json_encode($consumed_data) ?>,
                        backgroundColor: '#e5e7eb',
                        borderRadius: 4
                    },
                    {
                        label: 'Meals Skipped (Saved)',
                        data: <?= json_encode($skipped_data) ?>,
                        backgroundColor: '#dc2626',
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        new Chart(document.getElementById('paymentChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Paid', 'Pending'],
                datasets: [{
                    data: [<?= $paid_count ?>, <?= $unpaid_count ?>],
                    backgroundColor: ['#10b981', '#dc2626'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>

</html>