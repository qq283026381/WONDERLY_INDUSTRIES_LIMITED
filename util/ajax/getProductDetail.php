<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/26
 * Time: 10:55
 */
require "../mysql/mysql.php";
$img = isset($_GET['img']) ? $_GET['img'] : "";
if ($img) {
    $mysql = new Mysql();
    $conn = $mysql->connect();
    $queryProduct = "select `description`,`size`,`category` from product where `img`='" . $img . "'";
    $result = $conn->query($queryProduct);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $description = $row['0'];
        $size = $row['1'];
        $category = $row['2'];
        $content = "<img class='pic' src='../../assets/imgs/" . $category . "/" . $img . "' alt='" . $img . "' />";
        $content .= "<p class='pre-line product-description'>" . $description . "</p>";
        $content .= "<p class='pre-line product-size'>" . $size . "</p>";
    }
    echo $content;
    $conn->close();
}