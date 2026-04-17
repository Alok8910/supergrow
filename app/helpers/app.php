<?php
function controller($controllerName)
{
    $controllerName = $controllerName;
    return PATH . '/app/controllers/' . $controllerName . '.php';
}
function view($viewName)
{
    $viewName = $viewName;
    return PATH . '/app/views/' . $viewName . '.php';
}
function route($index)
{
    global $route;
    if (isset($route[$index])) {
        return $route[$index];
    } else {
        return false;
    }
}
function countRow($data)
{
    global $pdo;
    $where = "";
    if ($data["where"]):
        $where = "WHERE ";
        foreach ($data["where"] as $key => $value) {
            $where .= " $key=:$key && ";
            $execute[$key] = $value;
        }
        $where = substr($where, 0, -3);
        $row = $pdo->prepare("SELECT * FROM " . $data['table'] . " $where ");
    else:
        $execute = array();
        $row = $pdo->prepare("SELECT * FROM " . $data['table']);
    endif;

    $row->execute($execute);
    $validate = $row->rowCount();
    return $validate;
}
function logoutUser()
{
    $_SESSION = [];
    session_destroy();
    setcookie("u_id", "", time() - (60 * 60 * 24 * 7), "/");
    setcookie("u_password", "", time() - (60 * 60 * 24 * 7), "/");
    setcookie("u_login", "", time() - (60 * 60 * 24 * 7), "/");
    header("Location: /");
    exit;
}
function loginuser($id, $password)
{
    $_SESSION["userlogin"] = 1;
    $_SESSION["userid"] = $id;
    $_SESSION["userpass"] = $password;
}

function status($start,$end,$now,$skip){
    if($skip) return "Skipped ❌";
    if($now < $start) return "Awaiting ⏳";
    if($now >= $start && $now <= $end) return "Served";
    return "Completed ✅";
}
function ftime($t){
    return date('h:i A', strtotime($t));
}
function isClosed($end,$now){
    return $now > $end;
}