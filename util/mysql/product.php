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
        $result=$conn->query($queryAddProduct);
        $conn->close();
        return $result;
    }
}