<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/26
 * Time: 13:52
 */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require "verify.php";
}
require "../mysql/admin.php";
$admin=new Admin();
$name = isset($_POST['username']) ? MD5($_POST['username']) : "";
$password = isset($_POST['password']) ? MD5($_POST['password']) : "";
if ($admin->checkAdmin($name, $password)) {
    session_start();
    $_SESSION['authority'] = md5("AdmIn");
    header("Location:../../views/backend/manage.php");
} else {
    echo "<script>alert('Unauthorized access!');history.back();</script>";
    exit();
}