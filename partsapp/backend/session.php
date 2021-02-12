<?php
if (!isset($_SESSION)) {  ///test nove sesije
    session_start();
}

if (!isset($_SESSION['id']) && $_SESSION['id'] == true) {
    echo "Please Login again";
    header('Location: login.view.php', true, 301);
    exit;
} else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_unset();
        session_destroy();
        header('Location: login.view.php', true, 301);
        // echo "Your session has expired!";
    }
} //  else { //Starting this else one [else1]
?>
