<?php
session_start();
require "connection.php";

$date_service_dmy = $_POST['date_service'];
$date_service = date('Y-m-d', strtotime($date_service_dmy));
$model_service = $_POST['model_service'];
$customer_service = $_POST['customer_service'];
$vehicle_service = $_POST['vehicle_service'];
$status_service = $_POST['status_service'];
$price_bruto_service = $_POST['price_bruto_service'];
$price_neto_service = $_POST['price_neto_service'];
$checked_parts_property = $_POST['parts_property'];
$note_service = $_POST['note_service'];
$user_id = $_SESSION['id'];  //dodato

$sql = "INSERT INTO service VALUES (NULL, '$date_service', '$model_service',
 '$customer_service', '$vehicle_service', '$status_service', '$price_bruto_service',
 '$price_neto_service', '$checked_parts_property','$note_service','$user_id')";

if (mysqli_query($db, $sql)) {
    $_SESSION['note'] = 'done';
    header('Location: ../service.view.php');
} else {
    echo "error";
}
