
<div class="payments-grid">
<?php foreach ($display_months as $month_data):
    $billing_id = $month_data['billing_month'];
    $is_paid = isset($db_payments[$billing_id]) && $db_payments[$billing_id] == 1;
    if ($is_paid) {
        $status = 'paid';
    } elseif ($month_data['is_current']) {
        $status = 'due';
    } else {
        $status = 'upcoming';
    }
?>
    <div class="premium-card <?= ($status == 'due') ? 'is-due' : '' ?>">
        <div class="card-top">
            <div class="date-group">
                <h3 class="month-text"><?= htmlspecialchars($month_data['month_only']) ?></h3>
                <p class="year-text"><?= $month_data['year_only'] ?></p>
            </div>
            <?php if ($status == 'paid'): ?>
                <div class="status-pill pill-paid">
                    <i class="fa-solid fa-check"></i> Paid
                </div>
            <?php elseif ($status == 'due'): ?>
                <div class="status-pill pill-due">
                    <i class="fa-solid fa-triangle-exclamation"></i> Due Now
                </div>
            <?php else: ?>
                <div class="status-pill pill-upcoming">
                    <i class="fa-solid fa-calendar"></i> Upcoming
                </div>
            <?php endif; ?>
        </div>
        <div class="price-tag">
            <span>₹</span><?= number_format($month_data['fee'], 0) ?>
        </div>
        <div class="card-bottom">
            <?php if ($status == 'paid'): ?>
                <button class="action-btn btn-disabled" disabled>
                    <i class="fa-solid fa-check"></i>Adready Paid
                </button>
            <?php elseif ($status == 'due'): ?>
                <a href="/payments?month=<?= urlencode($billing_id) ?>" class="action-btn btn-pay">
                    Pay Now₹<?= number_format($month_data['fee'], 0) ?>
                </a>
            <?php else: ?>
                <a href="/payments?month=<?= urlencode($billing_id) ?>" class="action-btn btn-advance">
                    Pay in Advance
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

</div>