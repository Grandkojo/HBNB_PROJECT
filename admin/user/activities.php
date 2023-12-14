<!DOCTYPE html>
<html lang="en">
<?php
include '../../admin/config.php';
$state = isset($_GET['state']) ? $_GET['state'] : '';
if (!isset($_SESSION["email"])) { ?>
    <?php header("location: index.php?locate_signup=modalId&state=" . $state);
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/index.css">
    <link rel="icon" href="../../images/activities.png">
    <title>Your Activities</title>
</head>

<body class="bg-light" style="background-size: cover; background-repeat: no-repeat; backdrop-filter: blur(5px);" class="vh-100">
    <header>
        <div class="row">
            <div class="col-md mt-3">
                <img src="../../images/hbnb_logo.png" width="85" height="35" alt="logo">
            </div>
            <div class="col-md mt-3">
                <p class="d-flex justify-content-center text-danger" style="font-size: 40px; font-weight: bold; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">HBNB HOTEL</p>
            </div>
                <div class="col-md d-flex justify-content-end me-4 mt-2" width="85" height="35" style="font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: bold; font-style: italic;">Life at it's ease...</div>
            </div>
        </div>
        <hr>
    </header>
    <div class="d-flex justify-content-center" style="font-size: xx-large; font-weight: bold; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
        <p>YOUR ACTIVITIES</p>
    </div>
</body>