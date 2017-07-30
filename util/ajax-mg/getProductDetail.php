<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 15:22
 */
require "../mysql/product.php";
require "../mysql/menu.php";
$product = new Product();
$menu = new Menu();
$img = isset($_GET['img']) ? $_GET['img'] : "";
$content = "";
$result = $product->getCategoryByImg($img);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $category=$row['category'];
    $parent = $menu->getSubmenuByItem($category);
    $parent=$parent->fetch_array();
    $parent=$parent['parent'];
    $content .= "<form class=\"form\" action=\"../../util/ajax-mg/reviseProduct.php\" enctype=\"multipart/form-data\" method=\"post\" onsubmit=\"return checkReviseProductImg();\">";
    $content .= "<div class=\"form_row\">";
    $content .= "<label for=\"reviseProductIndex\">优先级:</label>";
    $content .= "<input type=\"number\" min=\"1\" autocomplete=\"off\" value='" . $row['index'] . "' required=\"\" placeholder=\"输入 1 以上的整数\" class=\"form_input\" name=\"reviseProductIndex\" id=\"reviseProductIndex\">";
    $content .= "</div><div class=\"form_row\">";
    $content .= "<label for=\"reviseProductMenu\">分类：</label>";
    $content .= "<select onchange=\"getReviseSubmenuByParent();\" required=\"\" class=\"form_input\" name=\"reviseProductMenu\" id=\"reviseProductMenu\">";
    $menuResult = $menu->getMenu();
    if ($menuResult->num_rows > 0) {
        while ($menuItems = $menuResult->fetch_array()) {
            $menuItem = $menuItems['item'];
            if ($menuItem === $parent) {
                $content .= "<option selected value='" . $menuItem . "'>" . $menuItem . "</option>";
            } else {
                $content .= "<option value='" . $menuItem . "'>" . $menuItem . "</option>";
            }
        }
    }
    $content .= "</select></div><div class=\"form_row\">";
    $content .= "<label for=\"reviseProductSubmenu\">子类：</label>";
    $content .= "<select class=\"form_input\" name=\"reviseProductSubmenu\" id=\"reviseProductSubmenu\">";
    $submenuResult = $menu->getSubmenuByParent($parent);
    if ($submenuResult->num_rows > 0) {
        while ($submenuItems = $submenuResult->fetch_array()) {
            $submenuItem = $submenuItems['item'];
            if ($submenuItem === $category) {
                $content .= "<option selected value='" . $submenuItem . "'>" . $submenuItem . "</option>";
            } else {
                $content .= "<option value='" . $submenuItem . "'>" . $submenuItem . "</option>";
            }
        }
    }
    $content .= "</select></div ><div class=\"form_row\">";
    $content .= "<label for=\"reviseProductDescription\">描述：</label>";
    $content .= "<textarea class=\"form_input product-textarea\" name=\"reviseProductDescription\" id=\"reviseProductDescription\">" . $row['description'] . "</textarea>";
    $content .= "</div><div class=\"form_row\">";
    $content .= "<label for=\"reviseProductSize\">规格：</label>";
    $content .= "<textarea class=\"form_input product-textarea\" name=\"reviseProductSize\" id=\"reviseProductSize\">" . $row['size'] . "</textarea>";
    $content .= "</div><div class=\"form_row\">";
    $content .= "<label for=\"reviseProductImg\">图片:</label>";
    $content .= "<input type=\"file\" name=\"reviseProductImg\" id=\"reviseProductImg\">";
    $content .= "<input type='hidden' name='oldImg' value='" . $img . "'>";
    $content .= "<input type='hidden' name='oldMenu' value='" . $parent . "'>";
    $content .= "<input type='hidden' name='oldSubmenu' value='" . $category . "'>";
    $content .= "</div><div class=\"form_row\">";
    $content .= "<input type=\"submit\" class=\"form_submit\" value=\"修改\">";
    $content .= "</div><div class=\"clear\"></div>";
    $content .= "</form>";
}
echo $content;