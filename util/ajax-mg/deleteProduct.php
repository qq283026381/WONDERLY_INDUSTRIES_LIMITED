<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 14:39
 */
$img = isset($_GET['img']) ? $_GET['img'] : "";
if ($img) {
    require "../mysql/product.php";
    $product = new Product();
    $categoryResult = $product->getCategoryByImg($img);
    if ($categoryResult) {
        $category = $categoryResult->fetch_array()['category'];
        require "../mysql/menu.php";
        $menu = new Menu();
        $menuResult = $menu->getSubmenuByItem($category);
        if ($menuResult) {
            $menuItem = $menuResult->fetch_array()['parent'];
            $result = $product->deleteProduct($img);
            if ($result) {
                require "../file/file.php";
                require "../config.php";
                $productUrl = constant("PRODUCT_PATH");
                $file = new File();
                $file->deleteJpg($img, $productUrl . $menuItem . "/" . $category . "/");
                echo "<script>alert('删除成功！');window.location.href=document.referrer+'#productManage-tab';</script>";
            } else {
                echo "<script>alert('图片未找到，删除失败！');history.back();</script>";
            }
        } else {
            echo "<script>alert('未找到分类，删除失败！');history.back();</script>";
        }

    } else {
        echo "<script>alert('未找到子类，删除失败！');history.back();</script>";
    }
} else {
    echo "<script>alert('图片不正确，删除失败！');history.back();</script>";
}