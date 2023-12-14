<?php
include "admin/config.php";
$title='Admin Login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title><?php echo $title ?></title>
 
</head>
<body style="background:url(images/skyline.jpg); background-size:cover; background-repeat:no-repeat">
    <div class="container-lg d-flex justify-content-center align-items-center vh-100">
        
        <form class="border shadow p-4  px-5 pt-3 pb-4 border-4 border-info bg-info rounded-4" action="admin/admin_logins.php" method="post">


            <div class="align" style="margin-left: 10px;"><h3>ADMIN LOGIN</h3></div>
            
            <div class="mb-3 mt-3">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
               
                <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd">
            </div>
            <?php 
            if (isset($_SESSION['error'])) { ?>
                <div id="errorAlert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
                </div>
                
            <?php
            unset($_SESSION['error']);
        }
            ?>
            
            <input type="submit" class="btn mt-3" value="Login" style="background-color: rgba(0, 145, 255, 0.721); margin-left:100px">
        </form>

    </div>

    <script>
        // Function to hide the alert after 2 seconds
        function hideAlert() {
            var alert = document.getElementById('errorAlert');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        // Show the alert
        setTimeout(hideAlert, 2000); 
    </script>
</body>
</html>