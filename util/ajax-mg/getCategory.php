<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 8:15
 */
require "../mysql/menu.php";
$menu = new Menu();
$result = $menu->getMenu();
$content="";
if ($result) {
    while ($row = $result->fetch_array()) {
        $item = $row['item'];
        $content .= "<option class='" . $item . "'>" . $item . "</option>";
    }
    echo $content;
}