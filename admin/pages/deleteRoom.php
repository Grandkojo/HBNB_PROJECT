<!-- Does nothing right now -->
<?php
    exit;
    $id = $_GET['id'];
    // var_dump($id); exit;
    $sql = "SELECT * FROM room_details WHERE ROOM_NO = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Add Room</title>
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
    <h2 style="margin-left:em; font-size: 40px;"><strong>Delete Room Details - Admin Panel</strong></h2>
    <hr style="height:3px; border:0; background-color: blue;">

    <div class="container-lg d-flex justify-content-center align-items-center vh-200 pt-5">
        <div class="tab-content">
            <div class="container tab-pan active">
                
                <!-- <form class="border shadow p-3 mb-3 px-5 mt-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/deleteRoomDetails.php"  method="post"> -->
                    <!-- action="../admin/roomDetails/deleteRoomDetails.php" -->
                    <!-- <div class="align" style="margin-left:50px;"><h3>Delete Room</h3></div> -->
                    <!-- <hr style="height:3px; border:0; background-color: black;"> -->

                    <!-- <div class="mb-3 mt-3 align">
                        <input type="number" class="form-control" id="roomnumber" placeholder="Enter room number" value="--><?php // echo $data["ROOM_NO"]; ?>" <!--name="roomnumber" min=1> 
                    </div> -->
                    <?php
                        if (isset($_SESSION["roomerror"])){ ?>
                            <div id="deleteerror" class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                                <?php echo $_SESSION['roomerror']; ?>
                            </div>
                        <?php
                        }
                        unset($_SESSION["roomerror"])        
                    ?>

                    <?php
                        if (isset($_SESSION["roomsuccess"])){ ?>
                            <div id="deletesuccess" class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                                <?php echo $_SESSION['roomsuccess']; ?>
                            </div>
                        <?php
                        }
                        unset($_SESSION["roomsuccess"])        
                    ?>
                    <!-- <input type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#mymodal" value="Delete Room" style="margin-left:130px;"> -->
                    <div class="modal fade" id="mymodal">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Confirm Deletion</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Are you sure?
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Yes!</button>
                            </div>
                         
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
    // JavaScript to prevent form submission on "Enter" key press
    document.addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        e.preventDefault();
      }
    });
    </script>

    <script>
        // Function to hide the alert after 2 seconds
        function hideAlert() {
            var alert = document.getElementById('deleteerror');
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
            var alert = document.getElementById('deletesuccess');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        // Show the alert
        setTimeout(hideAlert, 2000); 
    </script>

    <footer>
        <div class="alert alert-danger" style="margin-top:10em;">
            <strong>Crucial:</strong> Delete room details after the guest has checked out !
        </div>
    </footer>

</body>

