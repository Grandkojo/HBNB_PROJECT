<?php
    $id = $_GET['ids'];
    // var_dump($id); exit;
    $sql = "SELECT * FROM room_details WHERE RESIDENCE_NAME = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($data); exit;z
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Edit Room</title>
    <style>
        body{
            height: 100%;
            background-color:rgba(192, 192, 192, 0.7);
        }
        .btn.mt-3:hover{
            border-color: white;
        }
</style>
    </style>
</head>
<body>
    <h2 style="margin-left:em; font-size: 40px;"><strong>Edit Room - Admin Panel</strong></h2>
    <hr style="height:3px; border:0; background-color: blue;">

    <div class="container-lg d-flex justify-content-center align-items-center vh-200 pt-5">
        <div class="tab-content">
            <div class="container tab-pan active">
                
                <form class="border shadow p-3 mb-3 px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/editRoomDetails.php" method="post">
                    <div class="align" style="margin-left:110px;"><h3>Edit Room</h3></div>
                    <hr style="height:3px; border:0; background-color: black;">
                    <?php
                        if (isset($_SESSION["editsuccess"])){ ?>
                            <div id="roomsuccess" class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                                <?php echo $_SESSION['editsuccess']; ?>
                            </div>
                        <?php
                        }
                        unset($_SESSION["editsuccess"])  
                              
                    ?>
                    
                    <?php
                        if (isset($_SESSION["editfail"])){ ?>
                            <div id="roomsuccess" class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                                <?php echo $_SESSION['editfail']; ?>
                            </div>
                        <?php
                        }
                        unset($_SESSION["editfail"])  
                              
                    ?>

                    <div class="mb-3 mt-3 align">
                        <input type="text" class="form-control" id="residencename" value="<?php echo $data["RESIDENCE_NAME"]; ?>" data-bs-toggle="tooltip" title="Name of residence" name="residencename">
                    </div>
                    <div class="mb-3 mt-3 align">
                        <input type="number" class="form-control" id="roomnumber" value="<?php echo $data["ROOM_NO"]; ?>" name="roomnumber" placeholder="Enter room number" min=1>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="number" class="form-control" id="occupantsnumber" value="<?php echo $data["OCCUPANTS_NO"]; ?>" placeholder="Enter number of occupants" data-bs-toggle="tooltip" title="Number of beds/occupants" name="occupantsnumber" max=5 min=1>
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Room Type:</strong> 
                        <input type="radio" name="roomtype" value="STANDARD" <?php echo strtolower($data['ROOM_TYPE']) == "standard" ? "checked" : ''; ?>> STANDARD
                        <input type="radio" name="roomtype" value="BUSINESS" <?php echo strtolower($data['ROOM_TYPE']) == "business" ? "checked" : ''; ?>> BUSINESS 
                        <input type="radio" name="roomtype" value="LUXURY"  <?php echo strtolower($data['ROOM_TYPE']) == "luxury" ? "checked" : ''; ?>> LUXURY
                    </div>
                    <div class="mb-3 mt-3 align">
                        <strong>Room Status:</strong> 
                        <input type="radio" name="roomstatus" value="DETACHED" <?php echo strtolower($data['ROOM_STATUS']) == "detached" ? "checked" : ''; ?>> DETACHED
                        <input type="radio" name="roomstatus" value="ATTACHED" <?php echo strtolower($data['ROOM_STATUS']) == "attached" ? "checked" : ''; ?>> ATTACHED
                    </div>
                    <div class="mb-3 mt-3 align">
                        <strong>A/C:</strong> 
                        <input type="radio" name="aircondition" value="AVAILABLE" <?php echo strtolower($data['AC_AVAILABILITY']) == "available" ? "checked" : ''; ?>> AVAILABLE
                        <input type="radio" name="aircondition" value="N/A" <?php echo strtolower($data['AC_AVAILABILITY']) == "n/a" ? "checked" : ''; ?>> N/A
                    </div>
                    
                    <input type="submit" class="btn mt-3" value="Update" style="background-color: rgba(0, 145, 255, 0.721); margin-left:130px">
                </form>
            </div>
        </div>
    </div>

    <script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
    <script>
        // Function to hide the alert after 2 seconds
        function hideAlert() {
            var alert = document.getElementById('editsuccess');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        // Show the alert
        setTimeout(hideAlert, 2000); 
    </script>

    <script>
        // Function to hide the alert after 2 seconds
        function hideAlert() {
            var alert = document.getElementById('editfail');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        // Show the alert
        setTimeout(hideAlert, 2000); 
    </script>

    <footer>
    <div class="alert alert-danger">
        <strong>Note:</strong> Only make changes when there's an error.
    </div>
    </footer>
</body>
</html>
