<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) && $_POST['remember'] === '1';

    $check = $pdo->prepare("SELECT id FROM students WHERE (roll_no = :username OR reg_no = :username) AND status = 0");
    $check->execute(["username" => $username]);
    if ($check->rowCount()) {
        $error = 1;
        $errorText = "Your account has been suspended. Please contact the mess administrator.";
    } else {
        $user  = $pdo->prepare("SELECT * FROM students WHERE roll_no=:username OR reg_no=:username");
        $user->execute(array("username" => $username));
        $user    = $user->fetch(PDO::FETCH_ASSOC);
        $hash = md5(sha1(md5($password)));
        if ($user && $user["password"] == $hash) {
            loginuser($user["id"],$user["password"]);
            if ($remember) {
                setcookie("u_id", $user["id"], time() + (60 * 60 * 24 * 7), '/', null, null, true);
                setcookie("u_password", $user["password"], time() + (60 * 60 * 24 * 7), '/', null, null, true);
                setcookie("u_login", 'ok', time() + (60 * 60 * 24 * 7), '/', null, null, true);
            }
            $success = true;
            $successText = "Login successful. Redirecting to your dashboard...";
            header("refresh:2;url=/");
        } else {
            $error = 1;
            $errorText  = "Account not found or password is incorrect.";
        }
    }
}

require view('login');
