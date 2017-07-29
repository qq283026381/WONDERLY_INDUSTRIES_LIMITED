<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/26
 * Time: 13:38
 */

class Admin
{
    /**
     * Admin constructor.
     */
    public function __construct()
    {
        require_once "mysql.php";
    }

    public function checkAdmin($name, $password)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAdmin = "select `name`,`password` from admin where `name`='" . $name . "' and `password` = '" . $password . "' limit 1";
        $result = $conn->query($queryAdmin);
        if ($result->num_rows > 0) {
            $conn->close();
            return true;
        }else{
            $conn->close();
            return false;
        }
    }

}