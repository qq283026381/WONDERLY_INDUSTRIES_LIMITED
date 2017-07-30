<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 10:21
 */
require "../mysql/contact.php";
$contact=new Contact();
$result=$contact->getAddress();
if($result){
    $row=$result->fetch_array();
    echo $row['address'];
}