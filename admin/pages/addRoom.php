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
    <h2 style="margin-left:em; font-size: 40px;"><strong>Add Room - Admin Panel</strong></h2>
    <hr style="height:3px; border:0; background-color: blue;">

    <div class="container-lg d-flex justify-content-center align-items-center vh-200 pt-5">
        <div class="tab-content">
            <div class="container tab-pan active">

                <form class="border shadow p-3 mb-3 px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/addRoomDetails.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="align" style="margin-left:110px;">
                        <h3>Add Room</h3>
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
                    if (isset($_SESSION["roomerror"])) { ?>
                        <div id="roomerror" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <?php echo $_SESSION['roomerror']; ?>
                        </div>
                    <?php
                    }
                    unset($_SESSION["roomerror"])

                    ?>

                    <!-- Test -->
                    <div class="mb-3 mt-4 align">
                        <strong>Residence Name:</strong>
                        <input type="text" class="form-control" id="residencename" placeholder="Enter residence name" name="residencename">
                    </div>

                    <div class="mb-3 mt-4 align">
                        <strong>Location:</strong>
                        <input type="text" class="form-control" id="location" placeholder="Enter location" name="location">
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Price:</strong>
                        <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" min="0">
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Image:</strong><input type="file" id="imageFile" name="imageFile" accept="image/*" required>
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Description:</strong>
                        <textarea id="description" name="description" class="form-control" cols="20" rows="5" placeholder="Enter description"></textarea>
                    </div>


                    <div class="mb-3 mt-4 align">
                        <strong>Room Category:</strong>
                        <input type="radio" id="standard" name="category" value="STANDARD"> Standard
                        <input type="radio" id="business" name="category" value="BUSINESS"> Business
                        <input type="radio" id="luxury" name="category" value="LUXURY"> Luxury
                    </div>
                    <div class="mb-3 mt-3 align">
                        <strong>A/C:</strong>
                        <input type="radio" id="available" name="aircondition" value="AVAILABLE"> AVAILABLE
                        <input type="radio" id="n/a" name="aircondition" value="N/A"> N/A
                    </div>
                    <input type="submit" class="btn mt-3" value="Add Room" style="background-color: rgba(0, 145, 255, 0.721); margin-left:130px">
                </form>
            </div>
        </div>
    </div>

    <?php
        include "../scripts/addRoom_js.php";
    ?>
</body>

</html>