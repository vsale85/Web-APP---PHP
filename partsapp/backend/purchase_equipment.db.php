<?php
session_start();
require "connection.php";

$date_purchase_equipment_dmy = $_POST['date_purchase_equipment'];
$date_purchase_equipment = date('Y-m-d', strtotime($date_purchase_equipment_dmy));
$equipment_type = $_POST['equipment_type'];
$title_purchase_equipment = $_POST['title_purchase_equipment'];
$quantity_purchase_equipment = $_POST['quantity_purchase_equipment'];
$supplier_purchase_equipment = $_POST['supplier_purchase_equipment'];
$price_purchase_equipment = $_POST['price_purchase_equipment'];
$note_purchase_equipment = $_POST['note_purchase_equipment'];
$user_id = $_SESSION['id'];  

$sql = "INSERT INTO purchase_equipment VALUES (NULL, '$date_purchase_equipment', '$equipment_type', '$title_purchase_equipment',
 '$quantity_purchase_equipment', '$supplier_purchase_equipment', '$price_purchase_equipment', '$note_purchase_equipment','$user_id')";

if (mysqli_query($db, $sql)) {
    $_SESSION['note'] = 'done';
    header('Location: ../purchase_equipment.view.php');
} else {
    echo "error";
}
