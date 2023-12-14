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
    <h2 style="margin-left:em; font-size: 40px;"><strong>Add Category - Admin Panel</strong></h2>
    <hr style="height:3px; border:0; background-color: blue;">

    <div class="container-lg d-flex justify-content-center align-items-center vh-200 pt-5">
        <div class="tab-content">
            <div class="container tab-pan active">

                <form class="border shadow p-3 mb-3 px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/addCategoryDetails.php" method="post">
                    <div class="align" style="margin-left:30px;">
                        <h3>Add Category</h3>
                    </div>
                    <hr style="height:3px; border:0; background-color: black;">
                    <?php
                    if (isset($_SESSION["categorysuccess"])) { ?>
                        <div id="categorysuccess" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <?php echo $_SESSION['categorysuccess']; ?>
                        </div>
                    <?php
                    }
                    unset($_SESSION["categorysuccess"])

                    ?>


                    <div class="mb-3 mt-4 align">
                        <strong>Room Category:</strong> <br>
                        <input type="radio" id="standard" name="roomtype" value="STANDARD"> Standard Room <br>
                        <input type="radio" id="business" name="roomtype" value="BUSINESS"> Business Room <br>
                        <input type="radio" id="luxury" name="roomtype" value="LUXURY"> Luxury Room
                    </div>
                    <div class="mb-3 mt-3 align">
                        <strong>Status:</strong>
                        <input type="radio" id="available" name="cstatus" value="1"> Available
                        <input type="radio" id="n/a" name="cstatus" value="0"> Not Available
                    </div>
                    <input type="submit" class="btn mt-3" value="Add Record" style="background-color: rgba(0, 145, 255, 0.721); margin-left:130px">
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
            var alert = document.getElementById('categorysuccess');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>
</body>

</html>