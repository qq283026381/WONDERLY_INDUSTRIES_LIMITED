<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/28
 * Time: 9:26
 */
require "../mysql/guest.php";
$guest = new Guest();
$result = $guest->getGuestInfo();
$content = "";
if ($result) {
    $index = 0;
    while ($row = $result->fetch_array()) {
        $name = $row['name'];
        $company = $row['company'] ? $row['company'] : "空";
        $region = $row['region'] ? $row['region'] : "空";
        $phone = $row['phone'];
        $fax = $row['fax'] ? $row['fax'] : "空";
        $email = $row['email'];
        $message = $row['message'] ? $row['message'] : "空";
        $id = $row['id'];
        if ($index % 2 === 0) {
            $content .= "<tr class='even'>";
        } else {
            $content .= "<tr class='odd'>";
        }
        $content .= "<td>" . $name . "</td>";
        $content .= "<td>" . $company . "</td>";
        $content .= "<td>" . $region . "</td>";
        $content .= "<td>" . $phone . "</td>";
        $content .= "<td>" . $fax . "</td>";
        $content .= "<td><a href='mailto:" . $email . "'> " . $email . "</a></td>";
        $content .= "<td>" . $message . "</td>";
        $content .= "<td><a href='../../util/ajax-mg/deleteGuest.php?id=" . $id . "'><img src='../../assets-mg/img/trash.gif' border='0' /></a></td>";
        $content .= "</tr>";
        $index++;
    }
    echo $content;
} else {
    echo "没有记录";
}