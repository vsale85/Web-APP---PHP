<?php
session_start();
require "connection.php";

$date_sell_dmy = $_POST['date_sell'];
$date_sell = date('Y-m-d', strtotime($date_sell_dmy));
$part_sell = $_POST['part_sell'];
$price_sell = $_POST['price_sell'];
$model_sell = $_POST['model_sell'];
$status_sell = $_POST['status_sell'];
$note_sell = $_POST['note_sell'];
$user_id = $_SESSION['id'];  //dodato

$sql = "INSERT INTO parts VALUES (NULL,'$date_sell', '$part_sell', '$price_sell', '$model_sell', '$status_sell', '$note_sell','$user_id')";

if (mysqli_query($db, $sql)) {
    $_SESSION['note'] = 'done';   
  header('Location: ../index.php');

} else {
  
    echo "error";
}
?>