<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 10:43
 */
require "../mysql/contact.php";
$address=isset($_POST['revise-address'])?$_POST['revise-address']:"";
$contact=new Contact();
if($contact->reviseAddress($address)){
    echo "<script>alert('修改成功！');window.location.href=document.referrer+'#contactManage-tab';</script>";
}else{
    echo "<script>alert('修改失败！');history.back();</script>";
}