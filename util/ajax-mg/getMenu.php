<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 20:51
 */
require "../mysql/menu.php";
$menu = new Menu();
$menuResult = $menu->getMenu();
$i = 0;
$content = "";
if ($menuResult) {
    while ($menuItem = $menuResult->fetch_array()) {
        $index = $menuItem['index'];
        $item = $menuItem['item'];
        if ($i % 2 == 0) {
            $content .= "<tr class='even'>";
        } else {
            $content .= "<tr class='odd'>";
        }
        $content .= "<td>" . $index . "</td>";
        $content .= "<td>" . $item . "</td>";
        $content .= "<td>无</td>";
        $content .= "<td><a><img src=\"../../assets-mg/img/edit.png\" border=\"0\"> </a></td>";
        $content .= "<td><a><img src=\"../../assets-mg/img/trash.gif\" border=\"0\"> </a></td>";
        $content .= "</tr>";
        $i++;
    }
    $menuResult = $menu->getMenu();
    while ($menuItem = $menuResult->fetch_array()) {
        $parent = $menuItem['item'];
        $submenuResult = $menu->getSubmenuByParent($parent);
        if ($submenuResult) {
            while ($submenuItem = $submenuResult->fetch_array()) {
                $index = $submenuItem['index'];
                $item = $submenuItem['item'];
                if ($i % 2 == 0) {
                    $content .= "<tr class='even'>";
                } else {
                    $content .= "<tr class='odd'>";
                }
                $content .= "<td>" . $index . "</td>";
                $content .= "<td>" . $item . "</td>";
                $content .= "<td>" . $parent . "</td>";
                $content .= "<td><a><img src=\"../../assets-mg/img/edit.png\" border=\"0\"> </a></td>";
                $content .= "<td><a><img src=\"../../assets-mg/img/trash.gif\" border=\"0\"> </a></td>";
                $content .= "</tr>";
                $i++;
            }
        }
    }
}
echo $content;