<?php
function admin_controller($controllerName){
  $controllerName = $controllerName;
  return PATH.'/admin/controllers/'.$controllerName.'.php';
}

function admin_view($viewName){
  $viewName = $viewName;
  return PATH.'/admin/views/'.$viewName.'.php';
}
function logoutadmin()
{
    $_SESSION = [];
    session_destroy();
    setcookie("a_id", "", time() - (60 * 60 * 24 * 7), "/");
    setcookie("a_password", "", time() - (60 * 60 * 24 * 7), "/");
    setcookie("a_login", "", time() - (60 * 60 * 24 * 7), "/");
    header("Location: /");
    exit;
}
function loginadmin($id, $password)
{
    $_SESSION["adminlogin"] = 1;
    $_SESSION["adminid"] = $id;
    $_SESSION["adminpass"] = $password;
}