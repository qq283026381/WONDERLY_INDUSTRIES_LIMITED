<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 10:58
 */
$index = isset($_POST['submenuIndex']) ? $_POST['submenuIndex'] : "";
$item = isset($_POST['categorySubmenu']) ? $_POST['categorySubmenu'] : "";
$parent = $_POST['categoryParent'];
if ($index != "" && $item != "") {
    require "../mysql/menu.php";
    $menu = new Menu();
    if ($menu->addSubmenu($index, $item, $parent)) {
        echo "<script>alert('添加成功！');window.location.href=document.referrer+'#categoryManage-tab';</script>";
    } else {
        echo "<script>alert('添加失败！');history.back();</script>";
    }
} else {
    echo "<script>alert('添加失败！');history.back();</script>";
}