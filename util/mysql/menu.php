<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:10
 */
class Menu
{

    /**
     * Menu constructor.
     */
    public function __construct()
    {
        require "mysql.php";
    }

    function getMenu()
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryMenu = "select `index`,`item` from menu order by `index`";
        $result = $conn->query($queryMenu);
        $conn->close();
        return $result;
    }

    function getSubmenuByParent($parent)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySubmenuByParent = "select `index`,`item` from submenu where `parent` = '" . $parent . "' order by `index`";
        $result=$conn->query($querySubmenuByParent);
        $conn->close();
        return $result;
    }
}