<?php
session_start();
require "connection.php";

$username = md5($_POST['username']);
$password = md5($_POST['password']);
$error = "*Sorry, wrong password or username!";
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($db,$sql);
$result = mysqli_fetch_array($query);
if (is_array($result)) {
    $_SESSION['id'] = $result['id'];
    $_SESSION['username'] = $result['name'];
    /**** sesija ogranicena */
    $_SESSION['start'] = time(); // Taking now logged in time.
    // Ending a session in 30 minutes from the starting time.
    $_SESSION['expire'] = $_SESSION['start'] + (12 * 60 * 60);
    /**** end sesija ogranicena */
    header('Location: ../index.php');
} else {
    $_SESSION['error'] = $error;
    header('Location: ../login.view.php');
}

?>