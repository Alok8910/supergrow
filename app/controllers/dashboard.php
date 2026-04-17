<?php
if($auth == 0){
  logoutUser();
}
$user_id = $_SESSION['userid'] ?? 1;
$today_date = date('Y-m-d');
$today_day  = date('l');
$current_time = date('H:i:s');

$stmt = $pdo->prepare("SELECT * FROM mess_menu WHERE day=?");
$stmt->execute([$today_day]);
$menu = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['save']) && isset($_POST['meal'])){
    foreach($_POST['meal'] as $type=>$choice){

        $end_time = null;
        if($type == 'Breakfast') $end_time = $menu['breakfast_end_time'];
        if($type == 'Lunch')     $end_time = $menu['lunch_end_time'];
        if($type == 'Dinner')    $end_time = $menu['dinner_end_time'];

        if($current_time > $end_time){
            continue;
        }

        $stmt = $pdo->prepare("
            INSERT INTO meal_intents (user_id, meal_date, meal_type, choice)
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE choice=VALUES(choice)
        ");

        $stmt->execute([$user_id,$today_date,$type,$choice]);
    }
    header("Location: /");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$meals = [];
if($menu){
    $meals = [
        'Breakfast' => [$menu['breakfast'], $menu['breakfast_start_time'], $menu['breakfast_end_time']],
        'Lunch'     => [$menu['lunch'], $menu['lunch_start_time'], $menu['lunch_end_time']],
        'Dinner'    => [$menu['dinner'], $menu['dinner_start_time'], $menu['dinner_end_time']]
    ];
}

$stmt = $pdo->prepare("SELECT meal_type, choice FROM meal_intents WHERE user_id=? AND meal_date=?");
$stmt->execute([$user_id,$today_date]);
$user_intents = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

$stmt = $pdo->prepare("SELECT SUM(total_fee) FROM payments WHERE user_id=? AND is_paid=1");
$stmt->execute([$user_id]);
$total_paid = $stmt->fetchColumn() ?? 0;

$stmt = $pdo->prepare("SELECT COUNT(*) FROM meal_intents WHERE user_id=? AND choice='skip'");
$stmt->execute([$user_id]);
$skipped = $stmt->fetchColumn();

$food_saved = $skipped;
$balance = $user['balance'] ?? 0;


require view('dashboard');