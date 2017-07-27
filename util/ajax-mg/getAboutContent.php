<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 19:26
 */
require "../mysql/about.php";
$about=new About();
$result=$about->getAboutContent();
if($result->num_rows>0){
    $row=$result->fetch_array();
    echo $row['content'];
}