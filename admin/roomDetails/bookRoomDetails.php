<?php
    include "../../admin/config.php";
?>
    <?php
        //Retrieve form data
        $occupants_no = $_POST["occupantsnumber"];
        if ($occupants_no < 1 || $occupants_no > 5) {
                $_SESSION["occupantsnumberfail"] = "Invalid number of occupants";
                header("location: ../admin_page.php?page=add_room");
        }
        else{
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['roomtype'])) {
                    $selectedtype = $_POST['roomtype'];
                    if (isset($_POST['roomstatus'])) {
                        $selectedstatus = $_POST['roomstatus'];
                        if (isset($_POST['aircondition'])) {
                            $selectedstate = $_POST['aircondition'];
                            if (isset($_POST['residencename'])) {
                                $residence_name = $_POST['residencename'];
                                $sql = "INSERT INTO room_details (ROOM_CODE, ROOM_TYPE, RESIDENCE_NAME, ROOM_STATUS, AC_AVAILABILITY, OCCUPANTS_NO) VALUES (:room_code, :roomtype, :residence_name, :roomstatus, :aircondition, :occupants_no)";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':roomtype', $selectedtype);
                                $stmt->bindParam(':residence_name', $residence_name);
                                $stmt->bindParam(':roomstatus', $selectedstatus);
                                $stmt->bindParam(':aircondition', $selectedstate);
                                $stmt->bindParam(':occupants_no', $occupants_no);
                                $generatedCode = generateCode($conn);
                                $stmt->bindParam(':room_code', $generatedCode);
                                if($stmt->execute()){
                                    // echo "Room added successfully";
                                    $_SESSION["roomsuccess"] = "Room booked succesfully";
                                    // header("location: ../admin_page.php?page=book_room");
                                }
                            }
                        }
                    } 
                }
            
            }
    
            
        }
        if (isset($_GET['id'])) {
            $roomName = $_GET['id'];
            // var_dump($roomName); exit;
            // $sql = "UPDATE room SET ROOM_STATUS = NULL, ROOM_TYPE = NULL, AC_AVAILABILITY = NULL, OCCUPANTS_NO = NULL  WHERE RESIDENCE_NAME = '$roomName'";
            $sql = "DELETE FROM room WHERE NAME = :roomName";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':roomName', $roomName);
            $stmt->execute();
            header("location: ../admin_page.php?page=book_room");
        }
        function generateCode($conn) {
            $counter = retrieveCounter($conn);
            $formattedCounter = str_pad($counter, 3, '0', STR_PAD_LEFT);
            $generatedCode = 'RM' . $formattedCounter;
            // incrementCounter($conn);
            return $generatedCode;

        }
        function retrieveCounter($conn) {
            $sql = "SELECT ROOM_CODE FROM room_details";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $counter = count($result) + 1;
            return $counter;
        }
    ?>


    