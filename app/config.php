<?php
define('PATH', realpath('.'));
$config = [
    'db' => [
        'name'    => 'mess_management',
        'host'    => 'localhost',
        'user'    => 'root',
        'pass'    => '',
        'charset' => 'utf8mb4'
    ]
];
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
try {
    $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
    $pdo = new PDO(
        $dsn,
        $config['db']['user'],
        $config['db']['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

foreach ( glob(__DIR__.'/helpers/*.php') as $helper ) {
  require $helper;
}

if (isset($_COOKIE["u_id"], $_COOKIE["u_login"], $_COOKIE["u_password"]) && !isset($_SESSION["userlogin"])){
  $userdata = $pdo->prepare("SELECT * FROM students WHERE id=:id");
  $userdata->execute(array("id"=>$_COOKIE["u_id"] ));
  $userdata = $userdata->fetch(PDO::FETCH_ASSOC);
  $password = $userdata["password"];
  if( @$_COOKIE["u_password"] == $password ){
    loginuser($userdata["id"],$userdata["password"]);
 }else{
    logoutUser();
 }
}
if (isset($_COOKIE["a_id"], $_COOKIE["a_login"], $_COOKIE["a_password"]) && !isset($_SESSION["adminlogin"])){
  $userdata = $pdo->prepare("SELECT * FROM admins WHERE id=:id");
  $userdata->execute(array("id"=>$_COOKIE["a_id"] ));
  $userdata = $userdata->fetch(PDO::FETCH_ASSOC);
  $password = $userdata["password"];
  if( @$_COOKIE["u_password"] == $password ){
    loginuser($userdata["id"],$userdata["password"]);
 }else{
    logoutUser();
 }
}