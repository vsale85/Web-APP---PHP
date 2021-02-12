<?php
session_start();
require "connection.php";

$date_buy_dmy = $_POST['date_buy'];
$date_buy = date('Y-m-d', strtotime($date_buy_dmy));
$model_buy = $_POST['model_buy'];
$fuel = $_POST['fuel'];
$product_year = $_POST['product_year'];
$side_wheel = $_POST['side_wheel'];
$seller = $_POST['seller'];
$price_buy = $_POST['price_buy'];
$note_buy = $_POST['note_buy'];
$user_id = $_SESSION['id'];  //dodato

$sql = "INSERT INTO purchase_parts VALUES (NULL, '$date_buy', '$model_buy', '$fuel', '$product_year', '$side_wheel', '$seller','$price_buy','$note_buy','$user_id')";

if (mysqli_query($db, $sql)) {
    $_SESSION['note'] = 'done';   
  header('Location: ../purchase.view.php');
} else {
    echo "error";
}
