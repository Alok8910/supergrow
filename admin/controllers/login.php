<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminname = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
        $admin  = $pdo->prepare("SELECT * FROM admins WHERE username=:username");
        $admin->execute(array("username" => $adminname));
        $admin    = $admin->fetch(PDO::FETCH_ASSOC);

        if ($admin && $admin["password"] == $password) {
            loginadmin($admin["id"],$admin["password"]);
            if ($remember) {
                setcookie("u_id", $admin["id"], time() + (60 * 60 * 24 * 7), '/', null, null, true);
                setcookie("u_password", $admin["password"], time() + (60 * 60 * 24 * 7), '/', null, null, true);
                setcookie("u_login", 'ok', time() + (60 * 60 * 24 * 7), '/', null, null, true);
            }
            $success = true;
            $successText = "Login successful. Redirecting to your dashboard...";
            header("refresh:2;url=/admin/");
        } else {
            $error = 1;
            $errorText  = "Account not found or password is incorrect.";
        }
}
require admin_view('login');