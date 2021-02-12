<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="Images/jmsFavicon.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Sign in</title>
</head>

<body>
    <div class="login_form">
        <h1>Sign in...</h1>
        <form action="backend/login.php" method="post">
            <input type="text" name="username" placeholder=" username..." required>
            <input type="password" name="password" placeholder=" password..." required>
            <button type="submit">Login</button>
            <?php if (isset($_SESSION['error'])) : ?>
                <p><?php echo $_SESSION['error'] ?></p>
                <?php session_destroy(); ?>
            <?php endif ?>
            <br><br><br>
            <h6><a href="register.view.php">or register new user</a></h6>
        </form>
    </div>
</body>

</html>