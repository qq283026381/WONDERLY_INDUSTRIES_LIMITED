<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/23
 * Time: 10:00
 */
require "../mysql/mysql.php";
$mysql = new Mysql();
$conn = $mysql->connect();
$queryAboutContent = "select `content` from about";
$result=$conn->query($queryAboutContent);
if ($result->num_rows > 0) {
    $row=$result->fetch_array();
    echo $row['content'];
}
$conn->close();