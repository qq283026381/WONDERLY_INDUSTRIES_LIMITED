<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 16:22
 */
$index = isset($_POST['reviseProductIndex']) ? $_POST['reviseProductIndex'] : "";
$menu = isset($_POST['reviseProductMenu']) ? $_POST['reviseProductMenu'] : "";
$category = isset($_POST['reviseProductSubmenu']) ? $_POST['reviseProductSubmenu'] : "";
$description = isset($_POST['reviseProductDescription']) ? $_POST['reviseProductDescription'] : "";
$size = isset($_POST['reviseProductSize']) ? $_POST['reviseProductSize'] : "";
$file = isset($_FILES['reviseProductImg']) ? $_FILES['reviseProductImg'] : "";
$img = $file['name'];
$oldImg = $_POST['oldImg'];
$oldMenu = $_POST['oldMenu'];
$oldSubmenu = $_POST['oldSubmenu'];
if ($index != "" && $category != "" && $description != "" && $size != "") {
    require "../mysql/product.php";
    require "../file/file.php";
    require "../config.php";
    $product = new Product();
    $oldImgUrl = constant("PRODUCT_PATH") . $oldMenu . "/" . $oldSubmenu . "/";
    $imgUrl = constant("PRODUCT_PATH") . $menu . "/" . $category . "/";
    if ($img == "") {
        $img = $oldImg;
        rename($oldImgUrl . $oldImg, $imgUrl . $img);
    } else {
        $upload = new File();
        $upload->deleteJpg($oldImg, $oldImgUrl);
        $upload->uploadJpg($file, $imgUrl);
    }
    $result = $product->reviseProduct($index, $category, $description, $size, $img, $oldImg);
    if ($result) {
        echo "<script>alert('修改成功！');window.location.href=document.referrer+'#productManage-tab';</script>";
    } else {
        echo "<script>alert('修改失败！');history.back();</script>";
    }
} else {
    echo "<script>alert('修改失败！');history.back();</script>";
}