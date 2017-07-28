<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:10
 */
class Guest
{

    /**
     * Guest constructor.
     */
    public function __construct()
    {
        require "mysql.php";
    }

    function getGuestInfo()
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryGuest = "select * from guest order by `id` ";
        $result = $conn->query($queryGuest);
        $conn->close();
        return $result;
    }

    function deleteGuest($id)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryDeleteGuest = "delete from guest where `id` = '" . $id . "'";
        $result=$conn->query($queryDeleteGuest);
        $conn->close();
        return $result;
    }
}