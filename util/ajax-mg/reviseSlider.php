<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 17:27
 */
require "../mysql/slider.php";
$index = isset($_POST['reviseSliderIndex']) ? $_POST['reviseSliderIndex'] : "";
$file = isset($_FILES['reviseSliderImg']) ? $_FILES['reviseSliderImg'] : "";
$oldImg = $_POST['oldImg'];
$img = $file ? $file['name'] : "";
if ($img != "") {
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
    $upload = new File();
    $upload->deleteJpg($oldImg, constant("SLIDER_PATH"));
    $upload->uploadJpg($file, constant("SLIDER_PATH"));
    if ($slider->updateSlider($oldImg, $img, $index)) {
        echo "<script>alert('修改成功！');window.location.href=document.referrer;</script>";
    } else {
        echo "<script>alert('修改失败！');history.back();</script>";
    }
} else if ($img == "") {
    $slider = new Slider();
    if ($slider->updateSlider($oldImg, $oldImg, $index)) {
        echo "<script>alert('修改成功！');window.location.href=document.referrer;</script>";
    } else {
        echo "<script>alert('修改失败！');history.back();</script>";
    }
}