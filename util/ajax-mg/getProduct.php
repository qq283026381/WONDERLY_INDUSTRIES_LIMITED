<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 13:08
 */
require "../mysql/product.php";
require "../mysql/menu.php";
require "../config.php";
$product = new Product();
$menu = new Menu();
$menuResult = $menu->getMenu();
$content = "";
$i = 0;
if ($menuResult) {
    while ($menuItem = $menuResult->fetch_array()) {
        $submenuResult = $menu->getSubmenuByParent($menuItem['item']);
        if ($submenuResult) {
            while ($submenuItem = $submenuResult->fetch_array()) {
                $productResult = $product->getProductByCategory($submenuItem['item']);
                if ($productResult) {
                    while ($productItem = $productResult->fetch_array()) {
                        $index = $productItem['index'];
                        $img = $productItem['img'];
                        if ($i % 2 == 0) {
                            $content .= "<tr class='even'>";
                        } else {
                            $content .= "<tr class='odd'>";
                        }
                        $content .= "<td>" . $index . "</td>";
                        $content .= "<td>" . $submenuItem['item'] . "</td>";
                        $content .= "<td>" . $img . "</td>";
                        $content .= "<td><img src='" . constant("PRODUCT_PATH") . $menuItem['item'] . "/" . $submenuItem['item'] . "/" . $img . "' /></td>";
                        $content .= "<td><a><img onclick='showBox();showProductDetail(\"" . $img . "\");' src=\"../../assets-mg/img/edit.png\" border=\"0\"> </a></td>";
                        $content .= "<td><a href='../../util/ajax-mg/deleteProduct.php?img=" . $img . "' ><img src=\"../../assets-mg/img/trash.gif\" border=\"0\"> </a></td>";
                        $content .= "</tr>";
                        $i++;
                    }
                }
            }
        }
    }
    echo $content;
}