<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:10
 */
class Contact
{

    /**
     * Contact constructor.
     */
    public function __construct()
    {
        require "mysql.php";
    }

    function getAddress()
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAddress = "select `address` from contact ";
        $result = $conn->query($queryAddress);
        $conn->close();
        return $result;
    }

    function reviseAddress($address)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryReviseAddress = "update contact set `address` = '" . $address . "'";
        $result=$conn->query($queryReviseAddress);
        $conn->close();
        return $result;
    }
}