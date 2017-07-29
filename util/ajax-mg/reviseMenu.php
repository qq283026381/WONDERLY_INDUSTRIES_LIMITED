<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 10:18
 */
require "../mysql/menu.php";
$index = isset($_POST['reviseMenuIndex']) ? $_POST['reviseMenuIndex'] : "";
$item = isset($_POST['reviseCategoryMenu']) ? $_POST['reviseCategoryMenu'] : "";
$oldItem=$_POST['oldItem'];
$menu = new Menu();
if ($menu->reviseMenu($index, $item,$oldItem)) {
    echo "<script>alert('修改成功！');window.location.href=document.referrer+'#categoryManage-tab';</script>";
} else {
    echo "<script>alert('修改失败！');history.back();</script>";
}