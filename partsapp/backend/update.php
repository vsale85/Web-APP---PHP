<?php
require 'session.php';
require "connection.php";

$id = $_GET['id'];
$table_name = $_GET['table_name'];
$values = $_GET;

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM $table_name WHERE id = $id";
    $query = mysqli_query($db, $sql);
    
    header('Location: ../search.view.php');
} elseif (isset($_GET['update'])) {
    unset($values['table_name'], $values['id'], $values['update']);
   
    $output = implode(', ', array_map(
        function ($v, $k) {
            return sprintf("%s='%s'", $k, $v);
        },
        $values,
        array_keys($values)
    ));
    $sql = "UPDATE $table_name SET ".$output." WHERE id = $id";
    $query = mysqli_query($db, $sql);
    $_SESSION['note'] = 'done';   
 
    header('Location: ../search.view.php');
}else {
   echo "<h1>Something went wrong</h1>";
}


?>
