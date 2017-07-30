<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 12:42
 */
$parent = $_GET['parent'];
require "../mysql/menu.php";
$menu = new Menu();
$result = $menu->getSubmenuByParent($parent);
$content = "";
if ($result) {
    while ($row = $result->fetch_array()) {
        $item = $row['item'];
        $content .= "<option value='" . $item . "'>" . $item . "</option>";
    }
    echo $content;
}