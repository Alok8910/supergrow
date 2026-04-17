<?php
if($auth){
    header("Location: /");
    exit;
}
if (!route(1)) {
  $route[1] = "signup";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name      = trim($_POST['name']);
    $email     = trim($_POST['email']);
    $roll_no   = trim($_POST['roll_no']);
    $reg_no    = trim($_POST['reg_no']);
    $phone     = trim($_POST['phone']);
    $address   = trim($_POST['address']);
    $password  = $_POST['password'];
    $confirm   = $_POST['password_confirm'];
    $terms     = isset($_POST['check']) && $_POST['check'] === '1';
    if (!$name || !$email || !$roll_no || !$reg_no || !$phone || !$address) {
        $error = true;
        $errorText = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $errorText = "Invalid email address.";
    } elseif ($password !== $confirm) {
        $error = true;
        $errorText = "Passwords do not match.";
    } elseif (strlen($password) < 8) {
        $error = true;
        $errorText = "Password must be at least 8 characters.";
    } elseif (!$terms) {
        $error = true;
        $errorText = "Please agree to the Terms and Conditions to continue.";
    } else {
        $check = $pdo->prepare("SELECT id FROM students WHERE email = :email OR roll_no = :roll_no OR reg_no = :reg_no");
        $check->execute(["email"   => $email, "roll_no" => $roll_no, "reg_no"  => $reg_no]);
        if ($check->rowCount()) {
            $error = true;
            $errorText = "Account already exists. continue to login.";
        } else {
            $hash = md5(sha1(md5($password)));
            $insert = $pdo->prepare("INSERT INTO students SET full_name = :name, email = :email, roll_no = :roll_no, reg_no = :reg_no, phone = :phone, address = :address, password = :password");
            $insert->execute(["name" => $name, "email" => $email, "roll_no" => $roll_no, "reg_no" => $reg_no, "phone" => $phone, "address" => $address, "password" => $hash]);
            if($insert){
            $user  = $pdo->prepare("SELECT * FROM students WHERE roll_no=:roll_no OR reg_no=:reg_no");
            $user->execute(array("roll_no" => $roll_no, "reg_no" => $reg_no));
            $user    = $user->fetch(PDO::FETCH_ASSOC);
            loginuser($user["id"],$user["password"]);
            }
            $success = true;
            $successText = "Account created successfully.";
            header("refresh:2;url=/");
        }
    }
}
require view('signup');
