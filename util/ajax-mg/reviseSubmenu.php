<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 12:03
 */
require "../mysql/menu.php";
$index = isset($_POST['reviseSubmenuIndex']) ? $_POST['reviseSubmenuIndex'] : "";
$item = isset($_POST['reviseCategorySubmenu']) ? $_POST['reviseCategorySubmenu'] : "";
$parent = $_POST['reviseCategoryParent'];
$oldItem = $_POST['oldItem'];
$menu = new Menu();
if ($menu->reviseSubmenu($index, $item, $oldItem, $parent)) {
    echo "<script>alert('修改成功！');window.location.href=document.referrer+'#categoryManage-tab';</script>";
} else {
    echo "<script>alert('修改失败！');history.back();</script>";
}