<?php
include "../../admin/config.php";

// Retrieve form data
$room_no = $_POST["roomnumber"];
$occupants_no = $_POST["occupantsnumber"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the record exists before attempting to update it
    $check_sql = "SELECT * FROM room_details WHERE ROOM_NO = :room_no LIMIT 1";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bindParam(':room_no', $room_no);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        if (isset($_POST['roomtype'])) {
            $selectedtype = $_POST['roomtype'];
            if (isset($_POST['roomstatus'])) {
                $selectedstatus = $_POST['roomstatus'];
                if (isset($_POST['aircondition'])) {
                    $selectedstate = $_POST['aircondition'];
                    if (isset($_POST['residencename'])) {
                        $residencename = $_POST['residencename'];
                        
                        $sql = "UPDATE room_details SET ROOM_TYPE = :selectedtype, RESIDENCE_NAME = :residencename, ROOM_STATUS = :selectedstatus, AC_AVAILABILITY = :selectedstate, OCCUPANTS_NO = :occupants_no WHERE ROOM_NO = :room_no";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':selectedtype', $selectedtype);
                        $stmt->bindParam(':residencename', $residencename);
                        $stmt->bindParam(':selectedstatus', $selectedstatus);
                        $stmt->bindParam(':selectedstate', $selectedstate);
                        $stmt->bindParam(':occupants_no', $occupants_no);
                        $stmt->bindParam(':room_no', $room_no);
                        $stmt->execute();
                        
                        if ($stmt->execute()) {
                            // echo $stmt->rowCount() . " records updated successfully";
                            $_SESSION["editsuccess"] = "Changes saved!";
                            header("location: ../admin_page.php?page=room_display");
                        }
                        
                    }

                }
            }
        }
    }
      
    else {
        //  echo "Error updating records";
        $_SESSION["editfail"] = "Changes failed (Room id error)!";
        header("location: ../admin_page.php?page=room_display");   
    }
}
?>
