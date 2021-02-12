<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/search.css">
    <script src="https://kit.fontawesome.com/eff89722d4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title><?php echo $page; ?></title>
    <link rel="shortcut icon" href="Images/jmsFavicon.jpeg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <script src="https://www.w3counter.com/tracker.js?id=135820"></script>
</head>

<body>
    <?php date_default_timezone_set('Europe/Belgrade'); ?>
    <div class="container">
        <!-- adding navigation -->
        <?php require 'partials/navigation.php' ?>
        <div class="content">
            <div class="backImg <?php echo $img_class; ?>" <?php echo $back_image; ?>></div>