<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/24
 * Time: 8:56
 */
require "../mysql/mysql.php";

$name = isset($_POST['name']) ? $_POST['name'] : "";
$company = isset($_POST['company']) ? $_POST['company'] : "";
$region = isset($_POST['region']) ? $_POST['region'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$fax = isset($_POST['fax']) ? $_POST['fax'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$message = isset($_POST['message']) ? $_POST['message'] : "";

$mysql = new Mysql();
$conn = $mysql->connect();
$queryAddGuest = "insert into guest (name,company,region,phone,fax,email,message) values(?,?,?,?,?,?,?)";
$stmt = $conn->prepare($queryAddGuest);
$stmt->bind_param("sssssss", $name, $company, $region, $phone, $fax, $email, $message);
$stmt->execute();
echo "<script>alert(\"Thanks for your operation !We'll contact you later .\");history.back();</script>";
$stmt->close();
$conn->close();