<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/26
 * Time: 9:34
 */
require "../mysql/mysql.php";
$mysql = new Mysql();
$conn = $mysql->connect();
$menu = "";
$submenu = "";
$product = "";
$content = "";
$queryMenu = "select `item` from menu order by `index`";
$menuResult = $conn->query($queryMenu);
if ($menuResult->num_rows > 0) {
    while ($menuItems = $menuResult->fetch_array()) {
        $menu = $menuItems['item'];
        $content .= "<section class='product' id='" . strtolower($menu) . "'><h2 class='category-title'>" . $menu . "</h2>";
        $querySubmenu = "select `item` from submenu where `parent`='" . $menu . "' order by `index`";
        $submenuResult = $conn->query($querySubmenu);
        if ($submenuResult->num_rows > 0) {
            while ($submenuItems = $submenuResult->fetch_array()) {
                $submenu = $submenuItems['item'];
                $content .= "<section class='detail' id='" . strtolower(eraseBlank($submenu)) . "'><h4 class='product-title'>" . $submenu . "</h4>";
                $queryProduct = "select `img` from product where `category`='" . $submenu . "' order by `index`";
                $productResult = $conn->query($queryProduct);
                if ($productResult->num_rows > 0) {
                    while ($productItems = $productResult->fetch_array()) {
                        $product = $productItems['img'];
                        $content .= "<img src='../../assets/imgs/" . $submenu . "/" . $product . "' alt='" . eraseSuffix($product) . "' onclick='showBox();showProductDetail(\"" . $product . "\")' />";
                    }
                }
                $content .= "</section>";
            }
        }
        $content .= "</section>";
    }
}

echo $content;
$conn->close();

function eraseSuffix($sourse)
{
    return substr($sourse, 0, strrpos($sourse, "."));
}

function eraseBlank($sourse)
{
    return str_replace(" ", "", $sourse);
}