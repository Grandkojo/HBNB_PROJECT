<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM room WHERE ID = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($data); exit;
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
                
                <form class="border shadow p-3 mb-3 px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="../admin/roomDetails/editResidenceDetails.php?id=<?php echo $data["ID"]; ?>" method="post">
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
                        <input type="text" class="form-control" id="residencename" value="<?php echo $data["NAME"]; ?>" data-bs-toggle="tooltip" title="Name of residence" name="residencename">
                    </div>
                    <div class="mb-3 mt-3 align">
                    <input type="text" class="form-control" id="location" value="<?php echo $data["LOCATION"]; ?>" name="location" placeholder="Enter location" min=1>
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>AC Availability:</strong> 
                        <input type="radio" name="ac_availability" value="AVAILABLE" <?php echo strtolower($data['AC_AVAILABILITY']) == "available" ? "checked" : ''; ?>> AVAILABLE
                        <input type="radio" name="ac_availability" value="N/A" <?php echo strtolower($data['AC_AVAILABILITY']) == "n/a" ? "checked" : ''; ?>> N/A
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="number" class="form-control" id="price" value="<?php echo $data["PRICE"]; ?>" placeholder="Enter price of residence" data-bs-toggle="tooltip" title="Price of residence" name="price"  min=1>
                    </div>
                    <div class="mb-3 mt-4 align">
                        <strong>Category:</strong> 
                        <input type="radio" name="category" value="STANDARD" <?php echo strtolower($data['CATEGORY']) == "standard" ? "checked" : ''; ?>> STANDARD
                        <input type="radio" name="category" value="BUSINESS" <?php echo strtolower($data['CATEGORY']) == "business" ? "checked" : ''; ?>> BUSINESS 
                        <input type="radio" name="category" value="LUXURY"  <?php echo strtolower($data['CATEGORY']) == "luxury" ? "checked" : ''; ?>> LUXURY
                    </div>
                        <!-- I have to learn Javascript for this -->
                    <!-- <div class="mb-3 mt-3 align">
                        <strong>Image:</strong> 
                        <input type="file" name="imageFile" id="imageFile" value="<?php echo basename($data['PICTURE']); ?>"><span id="currentImageName"><?php echo basename($data['PICTURE']); ?></span>
                        <button type="button" onclick="clearFileInput()">Clear File</button>
                        <input type="file" name="imageFile" id="imageFile" value="<?php $data['PICTURE']; ?>"> 
                    </div> -->
                    <div class="mb-3 mt-3 align">
                        <strong>Description:</strong> 
                        <textarea id="description" name="description" class="form-control" cols="20" rows="5" placeholder="Enter description" min=1><?php echo$data["DESCRIPTION"]; ?></textarea>
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
