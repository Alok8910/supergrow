<?php
if ($auth == 0) {
    logoutUser();
}

$user_id = $_SESSION['userid'];
$monthly_fee = 2500;

if (isset($_GET['month']) && !empty($_GET['month'])) {
    $billing_month = $_GET['month'];
    $checkUser = $pdo->prepare("SELECT id FROM students WHERE id = :id");
    $checkUser->execute(["id" => $user_id]);
    if ($checkUser->rowCount() > 0) {
        $insert = $pdo->prepare("INSERT INTO payments SET user_id = :id, billing_month = :month, total_fee = :fee, is_paid = :paid ");
        $insert->execute(["id" => $user_id, "month" => $billing_month, "fee" => $monthly_fee, "paid" => 1]);
        header("Location: /payments");
        exit;
    }
}
$display_months = [];
for ($i = 0; $i < 6; $i++) {
    $timestamp = strtotime("+$i months");
    $display_months[] = [
        'billing_month' => date('F Y', $timestamp),
        'month_only' => date('F', $timestamp),
        'year_only' => date('Y', $timestamp),
        'fee' => $monthly_fee,
        'is_current' => ($i === 0)
    ];
}
$stmt = $pdo->prepare("SELECT billing_month, is_paid FROM payments WHERE user_id = :id");
$stmt->execute(["id" => $user_id]);
$db_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db_payments = [];
foreach ($db_rows as $row) {
    $db_payments[$row['billing_month']] = (int)$row['is_paid'];
}
require view('payments');
