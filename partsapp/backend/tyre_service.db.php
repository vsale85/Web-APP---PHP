<?php
session_start();
require "connection.php";

$date_tyre_service_dmy = $_POST['date_tyre_service'];
$date_tyre_service = date('Y-m-d', strtotime($date_tyre_service_dmy));
$size_R = $_POST['size_R'];
$quantity = $_POST['quantity'];
$type_of_service = $_POST['type_of_service'];
$customer_tyre_service = $_POST['customer_tyre_service'];
$vehicle_tyre_service = $_POST['vehicle_tyre_service'];
$status_tyre_service = $_POST['status_tyre_service'];
$price_tyre_service = $_POST['price_tyre_service'];
$note_tyre_service = $_POST['note_tyre_service'];
$user_id = $_SESSION['id'];  //dodato

$sql = "INSERT INTO tyre_service VALUES (NULL, '$date_tyre_service', '$size_R', '$quantity',
 '$type_of_service', '$customer_tyre_service', '$vehicle_tyre_service', '$status_tyre_service',
  '$price_tyre_service', '$note_tyre_service','$user_id')";

if (mysqli_query($db, $sql)) {
    $_SESSION['note'] = 'done';   
  header('Location: ../tyre_service.view.php');
} else {
    echo "error";
}
