<?php
include "config.php";
// check if user is loged in
if (!isset($_SESSION['lastname'])) {
    header("location: ../index.php");
    exit;
}
// end check
$page = isset($_GET['page']) ? trim(strtolower($_GET['page'])) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="../images/admin.png">
    <title id="pageTitle">Admin Page</title>
    <style>
        body {
            height: 100vh;
            background-color: rgba(192, 192, 192, 0.7);
        }

        .fa.fa-bed {
            display: flex;
            font-size: 3em;
            margin-left: 17px;
            margin-top: 17px;
        }

        .fa.fa-calendar {
            display: flex;
            font-size: 3em;
            margin-left: 20px;
            margin-top: 17px;
        }

        .fa.fa-home {
            color: black;
        }

        .fa.fa-cog {
            color: black;
        }

        .fa.fa-home:hover {
            color: white;
        }

        .fa.fa-cog:hover {
            color: white;
        }

        .hover-effect-1:hover {
            color: darkgoldenrod;
        }

        .hover-effect-2:hover {
            color: palevioletred;
        }

        .hover-effect-3:hover {
            color: gray;
        }

        .hover-effect-4:hover {
            color: rgba(0, 0, 255, 0.88);
        }

        .hover-effect-5:hover {
            color: red;
        }

        .custom-navbar {
            height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>

<body style="width: auto;">

    <div class="sticky-top">
        <div class="row row-sm d-flex align-items-center bg-primary sticky-top fixed-top" style="height: 90px;">
            <div class="col-1 col-md-1 d-flex justify-content-center">
                <img src="<?php echo $_SESSION["image"]?>" height="50px" width="50px" class="rounded-circle">
            </div>
            <div class="col-md">
                <span class="ps-3" style="font-size: 40px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, serif"><strong> Welcome, </strong></span>
                <?php
                echo '<span style="font-size: 35px;">' . $_SESSION["lastname"] . " " .  $_SESSION["firstname"] . '</span>';
                ?>
            </div>
            <div class="col-md d-flex justify-content-end">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index_for_admin.php" aria-current="page"><i class="fa fa-home fa-2x me-2" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-cog fa-2x me-2" aria-hidden="true"></i> </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <!-- Side bar -->
        <div class="col-2 col-md-2" style="height: 100%">
        <!-- 100vh -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark postion-fixed custom-navbar" style="height: 100%;">
                <!-- <h5>Sample Heading</h5> -->
                <div class="container-fluid" style="display: flex; justify-content: flex-start; align-items: flex-start; height:100vh;">
                    <!-- Hamburger Menu Button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </button>


                    <!-- Navbar Links -->
                    <div class="container-fluid collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "" ? "active text-primary" : "" ?>" href="admin_page.php?page="><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                            </li>
                            <hr class="text-bg-dark">
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "room_display" ? "active text-primary" : "" ?>" href="admin_page.php?page=room_display"><i class="fa fa-list-ol" aria-hidden="true"></i> Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "available_rooms" ? "active text-primary" : "" ?>" href="admin_page.php?page=available_rooms"><i class="fa fa-search-plus" aria-hidden="true"></i> Available</a>
                            </li>
                            <hr class="text-bg-dark">
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "categories" ? "active text-primary" : "" ?>" href="admin_page.php?page=categories"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Categories</a>
                            </li>
                            <hr class="text-bg-dark">
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "utilities" ? "active text-primary" : "" ?>" href="admin_page.php?page=utilities"><i class="fa fa-asterisk" aria-hidden="true"></i> Utilities</a>
                            </li>
                            <hr class="text-bg-dark">
                            <li class="nav-item">
                                <a class="nav-link disabled <?php echo $page == "book_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=book_room"><i class="fa fa-plus-circle" aria-hidden="true"></i> Book room</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled <?php echo $page == "edit_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_room"><i class="fa fa-pencil" aria-hidden="true"></i> Edit room</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled <?php echo $page == "add_category" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_category"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled <?php echo $page == "edit_category" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_category"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled <?php echo $page == "add_utility" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_utility"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Utility</a>
                            </li>
                            <hr class="text-bg-dark">
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "logout" ? "active text-primary" : "" ?>" href="admin_page.php?page=logout"><i class="fa fa-sign-in" aria-hidden="true"></i> Log Out</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == "contact" ? "active text-primary" : "" ?>" href="admin_page.php?page=contact"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end side bar -->

        <div class="col-10 col-10-md pe-0">
            <!-- content here -->

            <?php


            switch (strtolower($page)) {
                case 'room_display':
                    include "pages/roomDisplay.php";
                    break;

                case 'categories':
                    include "pages/categories.php";
                    break;

                case 'utilities':
                    include "pages/utilities.php";
                    break;

                case 'add_category';
                    include "pages/addCategory.php";
                    break;

                case 'edit_category':
                    include "pages/editCategory.php";
                    break;

                case 'book_room':
                    include "pages/bookRoom.php";
                    break;

                case 'add_room':
                    include "pages/addRoom.php";
                    break;

                case 'edit_room':
                    include "pages/editRoom.php";
                    break;

                case 'edit_residence':
                    include "pages/editResidence.php";
                    break;

                case 'add_utility':
                    include "pages/addUtility.php";
                    break;

                case 'available_rooms':
                    include "pages/availableRooms.php";
                    break;
                    
                case 'logout':
                    session_unset();
                    session_destroy(); ?>

                    <script>
                        location.reload();
                    </script>
            <?php break;

                case 'contact':
                    include "pages/contact.php";
                    break;

                default:
                    include "pages/dashboard.php";
                    break;
            }
            ?>

            <!-- end content here -->
        </div>












































































































































        <!-- <div class="col-10">
            <h2 style="margin-left:2em; font-size: 40px;"><strong>HBNB Online Management System - Admin Panel</strong></h2>
            <hr style="height:3px; border:0; background-color: blue;">

            <span class="hover-effect-1">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 text-dark" style="display: inline-block; width:90px; height:80px; background-color: orange; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Inactive Rooms</span>
                </span>
            </span>
            <span class="hover-effect-2">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 text-white" style="display: inline-block; width:90px; height:80px; background-color: palevioletred; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Inactive Rooms</span>
                </span>
            </span>
            <span class="hover-effect-3">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 text-white" style="display: inline-block; width:90px; height:80px; background-color: gray; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Pending Reservations</span>
                </span>
            </span>
            <span class="hover-effect-4">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 bg-primary text-white" style="display: inline-block; width:90px; height:80px; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Confirmed Reservations</span>
                </span>
            </span>
            <span class="hover-effect-5">
                <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                    <span class="border rounded-2 bg-danger text-white" style="display: inline-block; width:90px; height:80px; margin-top: 9px; margin-left: 5px">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    <span style="display: inline-flex; font-size:1em;">Cancelled Reservations</span>
                </span>
            </span>
        </div> -->
        </row>












</body>

</html>