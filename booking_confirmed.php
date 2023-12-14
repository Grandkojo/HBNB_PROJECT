<!DOCTYPE html>
<html lang="en">
<?php
include 'admin/config.php';
$state = isset($_GET['state']) ? $_GET['state'] : '';
if (!isset($_SESSION["email"])) {
    $_SESSION["notloggedin"] = true;
    header("location: index.php?locate_signup=modalId&state=" . $state);
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
    <title>Book Room</title>
</head>

<body style="background-image: url(uploads/luxury/100.jpg); background-size: cover; background-repeat: no-repeat; backdrop-filter: blur(1.5px);" class="vh-100">
    <header>
        <div class="row">
            <div class="col-md mt-3">
                <img src="images/hbnb_logo.png" width="85" height="35" alt="logo">

                <div class="float-end me-4 mt-2" width="85" height="35" style="font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: bold; font-style: italic;">Life at it's ease...</div>
            </div>
        </div>
        <hr>
        <p class="d-flex justify-content-center text-danger" style="font-size: 60px; font-weight: bold; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">HBNB BOOKING PORTAL</p>
    </header>
    <div class="container d-flex align-items-center justify-content-center mt-5">
        <form id="bookingForm" class="d-flex flex-column justify-content-center border border-danger shadow p-5 mb-5 px-5 pt-3 pb-4 border-3 bg-light rounded-3 w-40" action="phpEmail.php" method="post">
            First Name: <input type="text" class="form-control" name="firstname" id="firstname" placeholder="John" required>
            Last Name: <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Doe" required>
            Number of occupants: <input type="number" class="form-control" name="occupants" id="occupants" placeholder="occupant number" min="1" max="5" required>
            Check-in Date: <input type="date" class="form-control" name="check_in_date" id="check_in_date" required>
            Check-out Date: <input type="date" class="form-control" name="check_out_date" id="check_out_date" required>
            Email: <input type="email" class="form-control" name="email" id="email" placeholder="abc@mail.com" required>
            <input id="emailsubmission" type="button" value="Book Now" class="mt-3 btn btn-outline-danger rounded-3">
        </form>
    </div>
    <?php
    include "scripts/booking_confirmed_js.php";
    ?>

</body>

</html>