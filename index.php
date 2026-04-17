<?php
header_remove("X-Powered-By");
require __DIR__ . '/app/config.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = array_values(array_filter(explode('/', trim($uri, '/'))));
$auth = isset($_SESSION["userlogin"]) && $_SESSION["userlogin"] == 1;
if ($auth) {
    $page = $route[0] ?? 'dashboard';
} else {
    $page = $route[0] ?? 'login';
}
$publicPages = ['login', 'signup', 'forgot', 'reset','policy','admin'];
if (!$auth && !in_array($page, $publicPages)) {
    $page = 'login';
}
if ($auth && $page === 'login') {
    $page = 'dashboard';
}
if (file_exists(controller($page))) {
    if(route(0) !="admin"){
    require view('header');}
    require controller($page);
    if(route(0) !="admin"){
    require view('footer');}
    exit;
} else {
    require view('404');
    exit;
}