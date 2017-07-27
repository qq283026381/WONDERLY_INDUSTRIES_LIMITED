<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/26
 * Time: 13:52
 */
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION["authority"]!=md5("AdmIn")) {
    echo "<script>alert('Unauthorized access!');history.back();</script>";
    exit();
}