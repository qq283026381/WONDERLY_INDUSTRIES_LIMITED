<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/21
 * Time: 8:50
 */
require "../mysql/mysql.php";
$mysql = new Mysql();
$conn = $mysql->connect();
$querySliderImg = "select `img` from slider";
$result = $conn->query($querySliderImg);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $content="<li><img src='assets/imgs/slider/" . $row['img'] . "' /></li>";
        echo $content;
    }
    mysqli_data_seek($result,0);
    $row=$result->fetch_array();
    $content="<li><img src='assets/imgs/slider/" . $row['img'] . "' /></li>";
    echo $content;
}
$conn->close();