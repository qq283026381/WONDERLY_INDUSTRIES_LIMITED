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
    $result = $slider->getSliderInfo();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            if ($img === $row['img']) {
                echo "<script>alert('图片已经存在，请重命名或换一张图。');history.back();</script>";
                exit();
            }
        }
    }
    require "../file/file.php";
    require "../config.php";
    $upload=new File();
    $upload->uploadJpg($file,constant("SLIDER_PATH"));
    if ($slider->addSlider($index, $img)) {
        echo "<script>alert('添加成功！');window.location.href=document.referrer;</script>";
    } else {
        echo "<script>alert('添加失败！');history.back();</script>";
    }
} else {
    echo "<script>alert('添加失败！');history.back();</script>";
}