<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 9:29
 */
require "../mysql/menu.php";
$item = isset($_GET['item']) ? $_GET['item'] : "";
$menu = new Menu();
if ($menu->deleteMenu($item)) {
    echo "<script>alert('删除成功！');window.location.href=document.referrer+'#categoryManage-tab';</script>";
} else {
    echo "<script>alert('删除失败！');history.back();</script>";
}