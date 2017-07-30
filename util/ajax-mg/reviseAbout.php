<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 19:56
 */
require "../mysql/about.php";
$about=new About();
$content=isset($_POST['about-content'])?$_POST['about-content']:"";
$result=$about->reviseAbout($content);
if($result){
    echo "<script>alert('修改成功！');window.location.href=document.referrer+'#aboutManage-tab';</script>";
}else{
    echo "<script>alert('修改失败！');history.back();</script>";
}