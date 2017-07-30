<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 11:00
 */
require "../mysql/contact.php";
require "../config.php";
$contact = new Contact();
$result = $contact->getImg();
if ($result) {
    $row = $result->fetch_array();
    $content = "<label>原图片：</label>";
    $content .= "<img src='";
    $content.=constant("CONTACT_PATH");
    $content.=$row['img'];
    $content.="' />";
    echo $content;
}