<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:10
 */
class Product
{

    /**
     * Product constructor.
     */
    public function __construct()
    {
        require_once "mysql.php";
    }

    function getProduct()
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryProduct = "select * from product order by `index`";
        $result = $conn->query($queryProduct);
        $conn->close();
        return $result;
    }

    function getProductByCategory($category)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryProduct = "select * from product where `category`='" . $category . "' order by `index`";
        $result = $conn->query($queryProduct);
        $conn->close();
        return $result;
    }

    function addProduct($index, $category, $description, $size, $img)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAddProduct = "insert into product (`index`,`img`,`category`,`description`,`size`) values('" . $index . "','" . $img . "','" . $category . "','" . $description . "','" . $size . "')";
        $result = $conn->query($queryAddProduct);
        $conn->close();
        return $result;
    }

    function deleteProduct($img)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryDeleteProduct = "delete from product where `img` = '" . $img . "'";
        $result = $conn->query($queryDeleteProduct);
        $conn->close();
        return $result;
    }

    function getCategoryByImg($img)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryCategory = "select * from product where `img` = '" . $img . "'";
        $result = $conn->query($queryCategory);
        $conn->close();
        return $result;
    }

    function reviseProduct($index, $submenu, $description, $size, $img, $oldImg)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryReviseProduct = "update product set `index`='" . $index . "',`category`='" . $submenu . "',`description`='" . $description . "',`size`='" . $size . "',`img`='" . $img . "' where `img`='" . $oldImg . "'";
        $result=$conn->query($queryReviseProduct);
        $conn->close();
        return $result;
    }
}