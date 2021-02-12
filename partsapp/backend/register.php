<?php
session_start();
require "connection.php";
$admin_user = md5($_POST['admin_user']);
$admin_password = md5($_POST['admin_password']);
$error = "*Only admin have permissions for registering";
$error_user = "*Username or Password already exists,choose another";


$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$user = md5($_POST['user']);
$password = md5($_POST['password']);
$role = $_POST['role'];
$location = "Location: ../register.view.php";

$sql = "SELECT username, password, role FROM users WHERE username = '$admin_user' AND password = '$admin_password'";
$sql_check_user = "SELECT username, password FROM users WHERE username = '$user' AND password = '$password'";
$query_check_user = mysqli_query($db, $sql_check_user);

$query = mysqli_query($db, $sql);
$result = mysqli_fetch_array($query);

if ($result) {
    if ($result['role'] == 'admin') {

        
        if (mysqli_num_rows($query_check_user) == 0) {
            $sql = "INSERT INTO users VALUES (NULL, '$name','$last_name', '$email', '$phone', '$user', '$password', '$role')";
            $query = mysqli_query($db, $sql);
            header('Location: ../login.view.php');
           
        } else {
            $_SESSION['error'] = $error_user;
            header($location);
           
        }
    } else {
        $_SESSION['error'] = $error;
        header($location);
    }
} else {
    $_SESSION['error'] = $error;
    header($location);
}
   
