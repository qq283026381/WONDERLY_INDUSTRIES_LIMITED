<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 9:54
 */
require "../mysql/guest.php";
$guest = new Guest();
$id = isset($_GET['id']) ? $_GET['id'] : "";
$result = $guest->deleteGuest($id);
if ($result) {
    echo "<script>alert('删除成功！');window.location.href=document.referrer+'#contactManage-tab';</script>";
} else {
    echo "<script>alert('删除失败！');history.back();</script>";
}