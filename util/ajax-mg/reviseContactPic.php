<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 11:13
 */
require '../config.php';
require '../mysql/contact.php';
$file = isset($_FILES['revise-contact-pic']) ? $_FILES['revise-contact-pic'] : "";
$img = $file['name'];
if ($img != "") {
    $contact = new Contact();
    $oldImg = $contact->getImg()->fetch_array()['img'];
    require "../file/file.php";
    $upload = new File();
    $upload->deleteJpg($oldImg, constant("CONTACT_PATH"));
    $upload->uploadJpg($file, constant("CONTACT_PATH"));
    if ($contact->reviseImg($img)) {
        echo "<script>alert('修改成功！');window.location.href=document.referrer+'#contactManage-tab';</script>";
    } else {
        echo "<script>alert('修改失败！');history.back();</script>";
    }
}