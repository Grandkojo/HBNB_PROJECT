<?php
    include "roomDetails/dashboard_badges.php";
?>
<div class="tab-content">
    <div class="container tab-pan active">
        <h2 style="margin-left:2em; font-size: 40px;"><strong>HBNB Online Management System - Admin Panel</strong></h2>
        <hr style="height:3px; border:0; background-color: blue;">

        <span class="hover-effect-1">
            <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                <span class="border rounded-2 text-dark" style="display: inline-block; width:90px; height:80px; background-color: orange; margin-top: 9px; margin-left: 5px">
                    <i class="fa fa-bed" aria-hidden="true"></i>
                </span>
                <a href="admin_page.php?page=available_rooms">
                    <span style="display: inline-flex; font-size:1em; color: darkgoldenrod;">Active Rooms</span>
                </a>
                    <span class="badge text-bg-warning"><?php echo $count;?></span>
            </span>
        </span>
        <span class="hover-effect-2">
            <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                <span class="border rounded-2 text-white" style="display: inline-block; width:90px; height:80px; background-color: palevioletred; margin-top: 9px; margin-left: 5px">
                    <i class="fa fa-bed" aria-hidden="true"></i>
                </span>
                <a href="admin_page.php?page=room_display">
                    <span style="display: inline-flex; font-size:1em; color: palevioletred;">Inactive Rooms</span>
                </a>
                <span class="badge text-bg-danger"><?php echo $count1;?></span>
            </span>
        </span>
        <span class="hover-effect-3">
            <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                <span class="border rounded-2 text-white" style="display: inline-block; width:90px; height:80px; background-color: gray; margin-top: 9px; margin-left: 5px">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <a href="admin_page.php?page=pending">
                    <span style="display: inline-flex; font-size:1em; color: gray;">Pending Reservations</span>
                </a>
                <span class="badge text-bg-secondary">12</span>
            </span>
        </span>
        <span class="hover-effect-4">
            <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                <span class="border rounded-2 bg-primary text-white" style="display: inline-block; width:90px; height:80px; margin-top: 9px; margin-left: 5px">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <a href="admin_page.php?page=confirmed">
                    <span style="display: inline-flex; font-size:1em; color: rgba(0, 0, 255, 0.88);"><small>Confirmed Reservations</small></span>
                </a>
                <span class="badge text-bg-primary">12</span>
            </span>
        </span>
        <span class="hover-effect-5">
            <span class="border shadow p-1 mb-1" style="display: inline-block; width: 300px; height: 100px; margin: 5px; background-color:white">
                <span class="border rounded-2 bg-danger text-white" style="display: inline-block; width:90px; height:80px; margin-top: 9px; margin-left: 5px">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <a href="admin_page.php?page=cancelled">
                    <span style="display: inline-flex; font-size:1em; color: red;"><small>Cancelled Reservations</small></span>
                </a>
                <span class="badge bg-danger">12</span>
            </span>
        </span>
    </div>
</div>