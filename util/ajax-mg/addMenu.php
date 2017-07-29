<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 9:18
 */
$index = isset($_POST['menuIndex']) ? $_POST['menuIndex'] : "";
$item = isset($_POST['categoryMenu']) ? $_POST['categoryMenu'] : "";
if ($index != "" && $item != "") {
    require "../mysql/menu.php";
    $menu = new Menu();
    if ($menu->addMenu($index, $item)) {
        echo "<script>alert('添加成功！');window.location.href=document.referrer+'#categoryManage-tab';</script>";
    } else {
        echo "<script>alert('添加失败！');history.back();</script>";
    }
} else {
    echo "<script>alert('添加失败！');history.back();</script>";
}