<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<style>
        .sticky-button {
        position: fixed;
        bottom: 460px; 
        right: 20px; 
        z-index: 100;
        }
    </style>
<body>
    <div class="container mt-3">
        <h2 class="text-center">ROOMS</h2>
    </div>
    <hr style="height:3px; border:0; background-color: blue;">
    <div class="d-flex justify-content-end me-3 mb-3">
    <!-- <a class="btn btn-lg btn-primary sticky-button <?php echo $page == "add_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_room&id=">Add Room</a> -->
    </div>
    <?php
            $sql = "SELECT * FROM room_details";
            $display_query = $conn->prepare($sql);
            $display_query->execute();
            $result = $display_query->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- <div class="table-responsive"> -->
    <div class="container">
        <table class="table table-borderless table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Room Type</th>
                    <th>Residence Name</th>
                    <th>Room Status</th>
                    <th>A/C Availability</th>
                    <th>Occupants No</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($result as $row) { 
                    ?>
                    <tr class="table-secondary">
                        <td class="text-start"><?php echo $count++; ?></td>
                        <td class="text-start"><?php echo $row["ROOM_TYPE"]; ?></td>
                        <td class="text-start"><?php echo $row["RESIDENCE_NAME"]; ?></td>
                        <td class="text-start"><?php echo $row["ROOM_STATUS"]; ?></td>
                        <td class="text-start"><?php echo $row["AC_AVAILABILITY"]; ?></td>
                        <td class="text-start"><?php echo $row["OCCUPANTS_NO"]; ?></td>
                        <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link <?php echo $page == "edit_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_room&ids=<?php echo $row["RESIDENCE_NAME"]; ?>">Edit</button></td>
                        <!--<td class="text-start"><button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?php echo $row['ROOM_NO']; ?>')">Delete</button></td>-->
                        <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteRoomDetails.php?id=<?php echo $row["ROOM_NO"]; ?>">Delete</button></td>
                    </tr>   
                <?php } 
                ?>
            </tbody>
        </table>
    </div>
    <!-- </div> -->
    <!--<td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteRoomDetails.php?id=</?php //echo $row["ROOM_NO"]; ?/>">Delete</button></td>
 -->

</body>
 <!-- <script>
    function confirmDelete(roomId) {
        
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: {
                catch {
                    text: "Yes, delete it!",
                    result: "catch",
                },
                cancel: "Cancel",
            }
            // ["Yes, delete it!", "Cancel"],
            // showCancelButton: true,
            // confirmButtonColor: "#3085d6",
            // cancelButtonColor: "#d33",
            // confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            switch (result) {
                case ""
            }
            if (result.isConfirmed) {
                swal({
                    title: "Deleted!",
                    text: "Room deleted",
                    icon: "success",
                });
                
                // If the user confirms, redirect to the delete page with the room ID
                window.location.href = 'roomDetails/deleteRoomDetails.php?id=' + roomId;
            }
        });
    }
</script> -->
</html>