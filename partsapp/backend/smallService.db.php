<?php
session_start();
require "connection.php";

$date_small_service_dmy = $_POST['date_small_service'];
$date_small_service = date('Y-m-d', strtotime($date_small_service_dmy));
$model_small_service = $_POST['model_small_service'];
$customer_small_service = $_POST['customer_small_service'];
$car_small_service = $_POST['car_small_service'];
$status_small_service = $_POST['status_small_service'];
$price_brt_small_service = $_POST['price_brt_small_service'];
$price_net_small_service = $_POST['price_net_small_service'];

$changed_filters = $_POST['changed_filters'];
$checked_filters = '';
foreach ($changed_filters as $checked) {
    $checked_filters .= $checked.', ';
}

$small_service_oil_type = $_POST['small_service_oil_type'];
$small_service_oil_liter = $_POST['small_service_oil_liter'];
$small_service_km_on = $_POST['small_service_km_on'];
$small_service_km_to = $_POST['small_service_km_to'];
$note_small_service = $_POST['note_small_service'];
$user_id = $_SESSION['id'];  //dodato

$sql = "INSERT INTO small_service VALUES (NULL, '$date_small_service', '$model_small_service',
 '$customer_small_service', '$car_small_service', '$status_small_service', '$price_brt_small_service',
 '$price_net_small_service', '$checked_filters','$small_service_oil_type', '$small_service_oil_liter',
 '$small_service_km_on', '$small_service_km_to', '$note_small_service','$user_id')";

if (mysqli_query($db, $sql)) {
    $_SESSION['note'] = 'done';   
  header('Location: ../small_service.view.php');
} else {
    echo "error";
}
