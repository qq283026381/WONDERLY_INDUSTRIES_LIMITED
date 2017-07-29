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
        require_once "mysql.php";
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

    function getMenuByItem($item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryMenuByItem = "select `item`,`index` from menu where `item` = '" . $item . "'";
        $result = $conn->query($queryMenuByItem);
        $conn->close();
        return $result;
    }

    function getSubmenuByItem($item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySubmenuByItem = "select `item`,`index`,`parent` from submenu where `item` = '" . $item . "'";
        $result = $conn->query($querySubmenuByItem);
        $conn->close();
        return $result;
    }

    function getMenuExceptItem($item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryMenuByItem = "select `item` from menu where `item` not like '" . $item . "'";
        $result = $conn->query($queryMenuByItem);
        $conn->close();
        return $result;
    }

    function getSubmenuExceptItem($item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySubmenuByItem = "select `item` from submenu where `item` not like '" . $item . "'";
        $result = $conn->query($querySubmenuByItem);
        $conn->close();
        return $result;
    }

    function getSubmenuByParent($parent)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySubmenuByParent = "select `index`,`item` from submenu where `parent` = '" . $parent . "' order by `index`";
        $result = $conn->query($querySubmenuByParent);
        $conn->close();
        return $result;
    }

    function addMenu($index, $item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAddMenu = "insert into menu (`index`,`item`) values ('" . $index . "','" . $item . "')";
        $result = $conn->query($queryAddMenu);
        $conn->close();
        return $result;
    }

    function deleteMenu($item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryDeleteMenu = "delete from menu where `item` = '" . $item . "'";
        $result = $conn->query($queryDeleteMenu);
        $conn->close();
        return $result;
    }

    function deleteSubmenu($item)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryDeleteSubmenu = "delete from submenu where `item` = '" . $item . "'";
        $result = $conn->query($queryDeleteSubmenu);
        $conn->close();
        return $result;
    }

    function reviseMenu($index, $item, $oldItem)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryReviseMenu = "update menu set `index`='" . $index . "',`item`='" . $item . "' where `item`='" . $oldItem . "' ";
        $result = $conn->query($queryReviseMenu);
        $conn->close();
        return $result;
    }

    function reviseSubmenu($index, $item, $oldItem, $parent)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryReviseSubmenu = "update submenu set `index`='" . $index . "',`item`='" . $item . "',`parent`='" . $parent . "' where `item`='" . $oldItem . "' ";
        $result = $conn->query($queryReviseSubmenu);
        $conn->close();
        return $result;
    }

    function addSubmenu($index, $item, $parent)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAddSubmenu = "insert into submenu (`index`,`item`,`parent`) VALUES ('" . $index . "','" . $item . "','" . $parent . "')";
        $result = $conn->query($queryAddSubmenu);
        $conn->close();
        return $result;
    }
}