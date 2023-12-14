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
    <h2 style="margin-left:em; font-size: 40px;"><strong>New Utility - Admin Panel</strong></h2>
    <hr style="height:3px; border:0; background-color: blue;">

    <div class="container-lg d-flex justify-content-center align-items-center vh-200 pt-5">
        <div class="tab-content">
            <div class="container tab-pan active">

                <form class="border shadow p-3 mb-3 px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/addUtilityDetails.php" method="post" enctype="multipart/form-data">
                    <div class="align" style="margin-left:110px;">
                        <h3>New Utility</h3>
                    </div>
                    <hr style="height:3px; border:0; background-color: black;">
                    <?php
                    if (isset($_SESSION["utilitysuccess"])) { ?>
                        <div id="utility_success" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <?php echo $_SESSION['utilitysuccess']; ?>
                        </div>
                    <?php
                    }
                    unset($_SESSION["utilitysuccess"])

                    ?>

                    <!-- Test -->
                    <div class="mb-3 mt-4 align">
                        <strong>Utility ID:</strong>
                        <input type="text" class="form-control" id="utilityid" placeholder="ID" name="utilityid">
                    </div>

                    <div class="mb-3 mt-4 align">
                        <strong>Utility Name:</strong>
                        <input type="text" class="form-control" id="utilityname" placeholder="Name" name="utilityname">
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Icon:</strong>
                        <input type="file" id="imageFile" name="imageFile" accept="hbnb_all_icons/*" required>
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Category:</strong>
                        <input type="radio" id="standard" name="category" value="STANDARD/BUSINESS/LUXURY"> S/B/L
                        <input type="radio" id="business" name="category" value="BUSINESS/LUXURY"> B/L
                        <input type="radio" id="luxury" name="category" value="LUXURY"> L
                    </div>

                    <input type="submit" class="btn mt-3" value="Add Utility" style="background-color: rgba(0, 145, 255, 0.721); margin-left:130px">
                </form>
            </div>
        </div>
    </div>
    <script>
        function hideAlert() {
            var alert = document.getElementById('utilitysuccess');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>
</body>

</html>