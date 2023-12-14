<?php
include "../../admin/config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['roomtype'])) {
        $selectedtype = $_POST['roomtype'];
        if (isset($_POST['roomid'])) {
            $id = $_POST['roomid'];
            if (isset($_POST['cstatus'])) {
                $selectedstatus = $_POST['cstatus'];
                // Set the default timezone
                date_default_timezone_set('Europe/Berlin');

                // Get the current time
                $currentDateTime = new DateTime();

                // Subtract 1 hour because default timezone is Europe/Berlin
                $currentDateTime->sub(new DateInterval('PT1H'));

                // Format and display the result
                $local_time = $currentDateTime->format('Y-m-d H:i:s');


                // date_default_timezone_set('Africa/Ghana');
                // $currentDateTime = date('Y-m-d H:i:s');
                $sql = "UPDATE room_category SET CATEGORY_NAME = :roomtype, CSTATUS = :cstatus, CDATE = :cdate, SLUG = :slug WHERE ID = :roomid";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':roomtype', $selectedtype);
                $stmt->bindParam(':cstatus', $selectedstatus);
                $stmt->bindParam(':cdate', $local_time);
                $stmt->bindParam(':slug', generateSlug($selectedtype));
                $stmt->bindParam(':roomid', $id);
                $stmt->execute();

                if ($stmt->execute()) {
                    // echo $stmt->rowCount() . " records updated successfully";
                    // $_SESSION["editsuccess"] = "Changes saved!";
                    // echo "Added Successfully";
                    header("location: ../admin_page.php?page=categories");
                }
            }
        }
    }
} else {

    header("location: ../admin_page.php?page=categories");
}


function generateSlug($selectedtype)
{
    $text = strtolower(trim($selectedtype));
    $text = $text . "_room";
    // $text = preg_replace('/\s+/', '_', $text);
    return $text;
}
