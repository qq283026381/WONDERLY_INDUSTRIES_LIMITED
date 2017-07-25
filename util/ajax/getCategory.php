<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/25
 * Time: 13:57
 */
require "../mysql/mysql.php";
$mysql = new Mysql();
$conn = $mysql->connect();
$queryMenu = "select `item`,`index` from menu order by `index`";
$menuResult = $conn->query($queryMenu);
$menu = "";
$submenu = "";
$content = "";
if ($menuResult->num_rows > 0) {
    while ($menuItems = $menuResult->fetch_array()) {
        $menu = $menuItems['item'];//获取主菜单
        $content .= "<a href='#" . strtolower($menu) . "'>" . $menu . "</a>";
        $querySubmenu = "select `item`,`index` from submenu where `parent`='" . $menuItems['item'] . "' order by `index`";
        $submenuResult = $conn->query($querySubmenu);//根据主菜单的每一项去查子菜单
        if ($submenuResult->num_rows > 0) {//若有子菜单
            $content .= "<ul class='sub-menu'>";
            while ($submenuItems = $submenuResult->fetch_array()) {
                $submenu = $submenuItems['item'];//获取子菜单
                $submenuId = eraseBlank($submenuItems['item']);//子菜单ID（子菜单名字去空格）
                $content .= "<li><a href='#" . strtolower($submenuId) . "'>" . $submenu . "</a></li>";
            }
            $content.="</ul>";
        }
    }
}

echo $content;
$conn->close();

function eraseBlank($sourse)
{
    return str_replace(" ", "", $sourse);
}