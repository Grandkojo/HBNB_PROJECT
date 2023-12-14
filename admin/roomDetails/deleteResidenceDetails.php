<?php
include "../../admin/config.php";


    $id = $_GET['id'];

    if (!empty($id)) {
        $delete_sql = "DELETE FROM room WHERE ID = :room_no";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bindParam(':room_no', $id);

        if($delete_stmt->execute()){
            $_SESSION["roomsuccess"] = "Residence deleted successfully";
            header("location: ../admin_page.php?page=available_rooms");
            exit;
        }  
        else {
            $_SESSION["roomerror"] = "Residence not found or already deleted";
            header("location: ../admin_page.php?page=available_rooms");
    } 

}


?>
