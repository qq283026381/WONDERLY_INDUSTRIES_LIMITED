<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 9:49
 */
require "../mysql/slider.php";
require "../file/file.php";
require "../config.php";
$img=isset($_GET['img'])?$_GET['img']:"";
if($img){
    $slider=new Slider();
    $file=new File();
    $file->deleteJpg($img,constant("SLIDER_PATH"));
    if($slider->deleteSlider($img)){
        echo "<script>alert('删除成功！');window.location.href=document.referrer;</script>";
    }else{
        echo "<script>alert('删除失败！');history.back();</script>";
    }
}