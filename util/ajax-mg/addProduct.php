<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 13:48
 */

$index = isset($_POST['productIndex']) ? $_POST['productIndex'] : "";
$menu = isset($_POST['productMenu']) ? $_POST['productMenu'] : "";
$category = isset($_POST['productSubmenu']) ? $_POST['productSubmenu'] : "";
$description = isset($_POST['productDescription']) ? $_POST['productDescription'] : "";
$size = isset($_POST['productSize']) ? $_POST['productSize'] : "";
$file = isset($_FILES['productImg']) ? $_FILES['productImg'] : "";
$img = $file['name'];
if ($index != "" && $category != "" && $description != "" && $size != "" && $img != "") {
    require "../mysql/product.php";
    $product = new Product();
    $result = $product->addProduct($index, $category, $description, $size, $img);
    if ($result) {
        require "../file/file.php";
        require "../config.php";
        $upload = new File();
        $upload->checkUrl(constant("PRODUCT_PATH") . $menu);
        $upload->checkUrl(constant("PRODUCT_PATH") . $menu . "/" . $category . "/");
        $upload->uploadJpg($file,constant("PRODUCT_PATH") . $menu . "/" . $category . "/");
        echo "<script>alert('添加成功！');window.location.href=document.referrer+'#productManage-tab';</script>";
    } else {
        echo "<script>alert('添加失败！');history.back();</script>";
    }
} else {
    echo "<script>alert('添加失败！');history.back();</script>";
}