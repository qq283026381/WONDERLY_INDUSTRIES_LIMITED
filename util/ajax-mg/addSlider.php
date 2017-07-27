<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:35
 */
require "../mysql/slider.php";
$index = isset($_POST['sliderIndex']) ? $_POST['sliderIndex'] : "";
$file = isset($_FILES['newSliderImg']) ? $_FILES['newSliderImg'] : "";
$img = $file['name'];
if ($index != "" && $img != "") {
    $slider = new Slider();
    if ($slider->addSlider($index, $img)) {
        echo "<script>alert('添加成功！');window.location.href=document.referrer;</script>";
    } else {
        echo "<script>alert('添加失败！');history.back();</script>";
    }
}