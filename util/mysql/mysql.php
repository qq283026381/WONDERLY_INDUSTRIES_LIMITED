<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/21
 * Time: 8:47
 */
class Mysql
{
    public function connect()
    {
        $servername = "59.188.69.138";
        $username = "a0328132211";
        $password = "4b8c8d2b";
        $dbname = "a0328132211";
// 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }
        return $conn;
    }
}