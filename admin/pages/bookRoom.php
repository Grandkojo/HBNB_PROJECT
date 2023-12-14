<?php
if (isset($_GET['id'])) {
    $roomName = $_GET['id'];
} else {
    $roomName = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Add Room</title>
    <style>
        body {
            height: 100vh;
            background-color: rgba(192, 192, 192, 0.7);
        }

        .btn.mt-3:hover {
            border-color: white;
        }
    </style>
    </style>
</head>

<body>
    <h2 style="margin-left:em; font-size: 40px;"><strong>Book Room - Admin Panel</strong></h2>
    <hr style="height:3px; border:0; background-color: blue;">

    <div class="container-lg d-flex justify-content-center align-items-center vh-200 pt-5">
        <div class="tab-content">
            <div class="container tab-pan active">

                <form class="border shadow p-3 mb-3 px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/bookRoomDetails.php?id=<?php echo $roomName; ?>" method="post">
                    <div class="align" style="margin-left:110px;">
                        <h3>Book Room</h3>
                    </div>
                    <hr style="height:3px; border:0; background-color: black;">
                    <?php
                    if (isset($_SESSION["roomsuccess"])) { ?>
                        <div id="roomsuccess" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <?php echo $_SESSION['roomsuccess']; ?>
                        </div>
                    <?php
                    }
                    unset($_SESSION["roomsuccess"])

                    ?>

                    <?php
                    if (isset($_SESSION["occupantsnumberfail"])) { ?>
                        <div id="occupantsnumberfail" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <?php echo $_SESSION["occupantsnumberfail"]; ?>
                        </div>
                    <?php
                    }
                    unset($_SESSION["occupantsnumberfail"])

                    ?>
                    <div class="mb-3 mt-3 align">
                        <input type="text" class="form-control" id="residencename" value="<?php echo $roomName; ?>" data-bs-toggle="tooltip" title="Name of residence" name="residencename" readonly>
                    </div>

                    <div class="mb-3 mt-4 align">
                        <!-- Original -->
                        <strong>Room Type:</strong>
                        <input type="radio" id="standard" name="roomtype" value="STANDARD"> Standard
                        <input type="radio" id="business" name="roomtype" value="BUSINESS"> Business
                        <input type="radio" id="luxury" name="roomtype" value="LUXURY"> Luxury
                    </div>
                    <div class="mb-3 mt-3 align">
                        <strong>Room Status:</strong>
                        <input type="radio" id="detached" name="roomstatus" value="DETACHED"> Detached
                        <input type="radio" id="attched" name="roomstatus" value="ATTACHED"> Attached
                    </div>
                    <div class="mb-3 mt-3 align">
                        <strong>A/C:</strong>
                        <input type="radio" id="available" name="aircondition" value="AVAILABLE"> AVAILABLE
                        <input type="radio" id="n/a" name="aircondition" value="N/A"> N/A
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="number" class="form-control" id="occupantsnumber" placeholder="Enter number of occupants" data-bs-toggle="tooltip" title="Number of beds/occupants" name="occupantsnumber" max=5 min=1>
                    </div>
                    <input type="submit" class="btn mt-3" value="Book Room" style="background-color: rgba(0, 145, 255, 0.721); margin-left:130px">
                </form>
            </div>
        </div>
    </div>

    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        function hideAlert() {
            var alert = document.getElementById('roomsuccess');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>
    <script>
        function hideAlert() {
            var alert = document.getElementById('occupantsnumberfail');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>
</body>

</html>