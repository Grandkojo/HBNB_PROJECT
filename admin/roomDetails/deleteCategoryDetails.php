<?php
include "../../admin/config.php";


    $id = $_GET['id'];

    if (!empty($id)) {
        $delete_sql = "DELETE FROM room_category WHERE ID = :room_no";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bindParam(':room_no', $id);

        if($delete_stmt->execute()){
            $_SESSION["roomsuccess"] = "Room deleted successfully";
            header("location: ../admin_page.php?page=categories");
            exit;
        }  
        else {
            $_SESSION["roomerror"] = "Record not found or already deleted";
            header("location: ../admin_page.php?page=delete_room");
    } 

}


?>
