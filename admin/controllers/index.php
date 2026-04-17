<?php

$res = $pdo->query("SELECT COUNT(id) as total FROM students");
$total_students = $res->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$res = $pdo->query("SELECT COUNT(id) as skipped FROM meal_intents WHERE choice = 'skip'");
$total_skipped = $res->fetch(PDO::FETCH_ASSOC)['skipped'] ?? 0;

$res = $pdo->query("SELECT COUNT(id) as scanned FROM meal_scans WHERE meal_date = CURDATE()");
$scanned_today = $res->fetch(PDO::FETCH_ASSOC)['scanned'] ?? 0;

$res = $pdo->query("SELECT SUM(total_fee) as revenue FROM payments WHERE is_paid = '1'");
$total_revenue = $res->fetch(PDO::FETCH_ASSOC)['revenue'] ?? 0;

$target_date = '2026-04-17';
$meal_type = 'Lunch';
$cost_per_meal = 45.00;

$buffer_percentage = 0.05;
$show_success_msg = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buffer'])) {
    $buffer_percentage = floatval($_POST['buffer']) / 100;
    $show_success_msg = true;
}

$res = $pdo->query("SELECT COUNT(id) as total FROM students WHERE status = '1'");
$active_students = $res->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;


$stmt = $pdo->prepare("SELECT COUNT(id) as skips FROM meal_intents WHERE meal_date = ? AND meal_type = ? AND choice = 'skip'");
$stmt->execute([$target_date, $meal_type]);
$skips = $stmt->fetch(PDO::FETCH_ASSOC)['skips'] ?? 0;

$intended_eaters = $active_students - $skips;
$prepared_meals = ceil($intended_eaters * (1 + $buffer_percentage));


$stmt = $pdo->prepare("SELECT COUNT(id) as actuals FROM meal_scans WHERE meal_date = ? AND meal_type = ?");
$stmt->execute([$target_date, $meal_type]);
$actual_consumed = $stmt->fetch(PDO::FETCH_ASSOC)['actuals'] ?? 0;


$wasted_portions = $prepared_meals - $actual_consumed;
$financial_loss = $wasted_portions > 0 ? ($wasted_portions * $cost_per_meal) : 0;


$suggestion_title = "";
$suggestion_text = "";
$suggestion_class = "";
$icon = "";

if ($wasted_portions < 0) {
    $suggestion_title = "Critical Alert: Food Shortage";
    $suggestion_text = "Urgent: Walk-ins exceeded safety buffer by " . abs($wasted_portions) . " portions. Increase buffer to 10% for next meal.";
    $suggestion_class = "alert-critical";
    $icon = "fa-triangle-exclamation";
} elseif ($wasted_portions > ($prepared_meals * 0.10)) {
    $suggestion_title = "Action Required: Overproduction";
    $suggestion_text = "Wasted $wasted_portions portions (Loss: ₹" . number_format($financial_loss, 2) . "). Reduce buffer to 2% tomorrow and review menu popularity.";
    $suggestion_class = "alert-warning";
    $icon = "fa-trash-can";
} else {
    $suggestion_title = "Optimal Operation";
    $suggestion_text = "Great job! Food production matched consumption well. Keep safety buffer at " . ($buffer_percentage * 100) . "%.";
    $suggestion_class = "alert-success";
    $icon = "fa-check-circle";
}

$days = [];
$consumed_data = [];
$skipped_data = [];

for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $days[] = date('D', strtotime($date));

    $stmt = $pdo->prepare("SELECT COUNT(*) as c FROM meal_intents WHERE meal_date = ? AND choice = 'default'");
    $stmt->execute([$date]);
    $consumed_data[] = $stmt->fetch(PDO::FETCH_ASSOC)['c'] ?? 0;

    $stmt = $pdo->prepare("SELECT COUNT(*) as s FROM meal_intents WHERE meal_date = ? AND choice = 'skip'");
    $stmt->execute([$date]);
    $skipped_data[] = $stmt->fetch(PDO::FETCH_ASSOC)['s'] ?? 0;
}

$resPaid = $pdo->query("SELECT COUNT(*) as c FROM payments WHERE is_paid = '1'");
$paid_count = $resPaid->fetch(PDO::FETCH_ASSOC)['c'] ?? 0;

$resUnpaid = $pdo->query("SELECT COUNT(*) as c FROM payments WHERE is_paid = '0'");
$unpaid_count = $resUnpaid->fetch(PDO::FETCH_ASSOC)['c'] ?? 0;

$stmt = $pdo->prepare("
    SELECT roll_no, full_name, email, status, balance 
    FROM students 
    ORDER BY created_at DESC 
    LIMIT 5
");
$stmt->execute();

$recent_students = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];

require admin_view('index');