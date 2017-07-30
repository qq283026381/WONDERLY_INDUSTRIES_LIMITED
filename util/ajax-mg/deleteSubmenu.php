<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 11:37
 */
require "../mysql/menu.php";
$item = isset($_GET['item']) ? $_GET['item'] : "";
$menu = new Menu();
if ($menu->deleteSubmenu($item)) {
    echo "<script>alert('删除成功！');window.location.href=document.referrer+'#categoryManage-tab';</script>";
} else {
    echo "<script>alert('删除失败！');history.back();</script>";
}