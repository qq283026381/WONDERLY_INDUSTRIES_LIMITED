<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 11:59
 */
require "../mysql/menu.php";
$item = isset($_GET['item']) ? $_GET['item'] : "";
$content = "";
if ($item) {
    $menu = new Menu();
    $row = $menu->getSubmenuExceptItem($item)->fetch_array();
    if ($item === $row['item']) {
        $content .= "true";
    } else {
        $content .= "false";
    }
    echo $content;
}