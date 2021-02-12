<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Images/jmsFavicon.jpeg" type="image/x-icon">
    <title>Registration</title>
</head>

<body>
    <div class="registration">
        <div class="login_form">
            <h1 id="register_h1">new user...</h1>
            <form action="backend/register.php" method="post" id="register_form">
                <input type="text" name="name" placeholder=" name..." required>
                <input type="text" name="last_name" placeholder=" last name..." required>
                <input type="email" name="email" placeholder=" email..." required>
                <input type="number" name="phone" placeholder=" phone number..." required>
                <input type="text" name="user" placeholder=" username..." required>
                <input type="password" name="password" placeholder=" password..." required>
                <input type="text" name="role" placeholder=" role of new user..." required>
                <hr>
                <h3 id="confirm">Confirm admin details!</h3>
                <input type="text" name="admin_user" placeholder=" admin username..." id="admin-user" required>
                <input type="password" name="admin_password" placeholder="admin password..." id="admin-password" required>
                <button type="submit">Register</button>
                <?php if (isset($_SESSION['error'])) : ?>
                    <p><?php echo $_SESSION['error'] ?></p>
                    <?php session_destroy(); ?>
                <?php endif ?>
                <br><br>
                <h6><a href="login.view.php">or login</a></h6>
            </form>
        </div>
    </div>
</body>

</html>