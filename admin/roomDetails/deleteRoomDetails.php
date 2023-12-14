<?php
include "../../admin/config.php";


    $id = $_GET['id'];

    if (!empty($id)) {
        $delete_sql = "DELETE FROM room_details WHERE ROOM_NO = :room_no";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bindParam(':room_no', $id);
        if ($delete_stmt){
        ?>
        <script>
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
        $_SESSION["roomsuccess"] = "Room deleted successfully";
        header("location: ../admin_page.php?page=room_display");
        exit;
    </script>
    <?php
        }
        // Working on the swal for this before deleting
        if($delete_stmt->execute()){
            
            $_SESSION["roomsuccess"] = "Room deleted successfully";
            header("location: ../admin_page.php?page=room_display");
            exit;
        }  
        else {
            $_SESSION["roomerror"] = "Record not found or already deleted";
            header("location: ../admin_page.php?page=delete_room");
            // echo "Record not found or already deleted";
    } 

} 


?>
