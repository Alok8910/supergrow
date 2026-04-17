<?php

if ($auth == 0) {
    logoutUser();
}

$menudata = $pdo->prepare("SELECT * FROM mess_menu");
$menudata->execute();
$menudata = $menudata->fetchAll(PDO::FETCH_ASSOC);
$menus = array_column($menudata, null, 'day');
$daysOrder = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

require view('menu');
