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
        <h2 class="text-center">HBNB UTILITIES</h2>
    </div>
    <hr style="height:3px; border:0; background-color: blue;">
    <div class="d-flex justify-content-end me-3 mb-3">
    <a class="btn btn-lg btn-primary sticky-button <?php echo $page == "add_utility" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_utility&id=">New Utility</a>
    </div>
    <?php
            $sql = "SELECT * FROM hbnb_utilities";
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
                    <th>Utility Code</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($result as $row) { ?>
                    <tr class="table-secondary">
                        <td class="text-start"><?php echo $count++; ?></td>
                        <td class="text-start"><?php echo $row["UTILITY_CODE"]; ?></td>
                        <td class="text-start"><?php echo $row["NAME"]; ?></td>
                        <td class="text-start"><img src="<?php echo $row["ICON"]; ?>" alt="utility icon" height="20" width="20"></td>
                        <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteRoomDetails.php?id=<?php echo $row["UTILITY_CODE"]; ?>">Delete</button></td>
                         <!-- <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link <?php echo $page == "edit_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_room&id=<?php echo $row["ROOM_NO"]; ?>">Edit</button></td> -->
                        <!--<td class="text-start"><button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?php echo $row['ROOM_NO']; ?>')">Delete</button></td>-->
                    </tr>   
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>