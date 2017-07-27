<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:09
 */
class About
{

    /**
     * About constructor.
     */
    public function __construct()
    {
        require "mysql.php";
    }

    function getAboutContent()
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAboutContent = "select `content` from about";
        $result = $conn->query($queryAboutContent);
        $conn->close();
        return $result;
    }

    function reviseAbout($content)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryUpdateAbout = "update about set `content` = '" . $content . "'";
        $result=$conn->query($queryUpdateAbout);
        $conn->close();
        return $result;
    }
}