<?php
$db = mysqli_connect('localhost', 'root', '', 'goranoparts') or die("Connection error");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>