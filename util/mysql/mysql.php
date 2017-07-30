<?php
require "../config.php";
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
        $servername = constant("SERVERNAME");
        $username = constant("USERNAME");
        $password = constant("PASSWORD");
        $dbname = constant("DBNAME");
// 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }
        return $conn;
    }
}