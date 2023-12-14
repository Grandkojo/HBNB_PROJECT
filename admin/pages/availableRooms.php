<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<style>
    .sticky-button {
        /* position: fixed;
            bottom: 460px; 
            right: 20px; 
            z-index: 200; */
        float: right;
    }
</style>

<body>
    <div class="container mt-3">
        <h2 class="text-center">AVAILABLE ROOMS</h2>
    </div>
    <hr style="height:3px; border:0; background-color: blue;">
    <div class="d-flex justify-content-end me-3 mb-3">
        <a class="btn btn-lg btn-primary sticky-button  <?php echo $page == "add_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=add_room&id=">Add Room</a>
    </div>
    <?php
    $sql = "SELECT * FROM room";
    $display_query = $conn->prepare($sql);
    $display_query->execute();
    $result = $display_query->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <table class="table table-borderless table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>LOCATION</th>
                    <th>PRICE</th>
                    <!-- <th>CATEGORY</th> -->
                    <th>DESCRIPTION</th>
                    <th colspan="3" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($result as $row) { ?>
                    <tr class="table-secondary">
                        <td class="text-start"><?php echo $count++; ?></td>
                        <td class="text-start"><?php echo $row["NAME"]; ?></td>
                        <td class="text-start"><?php echo $row["LOCATION"]; ?></td>
                        <td class="text-start"><?php echo $row["PRICE"]; ?></td>
                        <td class="text-start"><?php echo $row["CATEGORY"]; ?></td>
                        <!-- <td class="text-start"><?php echo $row["DESCRIPTION"]; ?></td> -->
                        <td class="text-start"><button class="btn btn-sm btn-primary"><a class="nav-link <?php echo $page == "book_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=book_room&id=<?php echo urlencode($row["NAME"]); ?>">Book</button></td>
                        <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link <?php echo $page == "edit_room" ? "active text-primary" : "" ?>" href="admin_page.php?page=edit_residence&id=<?php echo $row["ID"]; ?>">Edit</button></td>
                        <td class="text-start"><button class="btn btn-sm btn-danger"><a class="nav-link" href="roomDetails\deleteResidenceDetails.php?id=<?php echo $row["ID"]; ?>">Delete</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>