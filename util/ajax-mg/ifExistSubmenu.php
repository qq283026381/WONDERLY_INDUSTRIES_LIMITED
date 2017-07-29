<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 10:47
 */
require "../mysql/menu.php";
$item = isset($_GET['item']) ? $_GET['item'] : "";
$content = "";
if ($item) {
    $menu = new Menu();
    $row = $menu->getSubmenuByItem($item)->fetch_array();
    if ($item === $row['item']) {
        $content .= "true";
    } else {
        $content .= "false";
    }
    echo $content;
}