<?php
include "../../admin/config.php";
?>
<?php
$counter = 0;
while ($counter != 0) {
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['roomtype'])) {
        $selectedtype = $_POST['roomtype'];
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
            date_default_timezone_set('Africa/Accra');
            $currentDateTime = date('Y-m-d H:i:s');

            //total records
            $query = "SELECT COUNT(*) as totalRecords FROM room_category";
            $statement = $conn->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $totalRecords = $result['totalRecords'];
            //total standard rooms
            $query1 = "SELECT COUNT(*) AS totalRecords1 FROM room_category WHERE CATEGORY_NAME = 'STANDARD'";
            $statement = $conn->prepare($query1);
            $statement->execute();
            $result1 = $statement->fetch(PDO::FETCH_ASSOC);
            $totalRecords1 = $result1['totalRecords1'];
            //total business rooms
            $query2 = "SELECT COUNT(*) AS totalRecords2 FROM room_category WHERE CATEGORY_NAME = 'STANDARD'";
            $statement = $conn->prepare($query2);
            $statement->execute();
            $result2 = $statement->fetch(PDO::FETCH_ASSOC);
            $totalRecords2 = $result2['totalRecords2'];
            //total luxury rooms
            $query3 = "SELECT COUNT(*) AS totalRecords3 FROM room_category WHERE CATEGORY_NAME = 'STANDARD'";
            $statement = $conn->prepare($query3);
            $statement->execute();
            $result3 = $statement->fetch(PDO::FETCH_ASSOC);
            $totalRecords3 = $result3['totalRecords3'];
            if ($totalRecords <= 600) {
                if ($totalRecords1 <= 200) {
                    if ($totalRecords2 <= 200) {
                        if ($totalRecords3 <= 200) {
                            $sql = "INSERT INTO room_category (ID, CATEGORY_NAME, CSTATUS, CDATE, SLUG) VALUES (:id, :roomtype, :cstatus, :cdate, :slug)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':id', $counters);
                            $stmt->bindParam(':roomtype', $selectedtype);
                            $stmt->bindParam(':cstatus', $selectedstatus);
                            $stmt->bindParam(':cdate', $local_time);
                            $slugvalue = generateSlug($selectedtype);
                            $stmt->bindParam(':slug', $slugvalue);
                            if ($stmt->execute()) {
                                // echo "Room added successfully";
                                $_SESSION["categorysuccess"] = "Record added succesfully";
                                header("location: ../admin_page.php?page=add_category");
                            }
                        } else {
                            echo "Maximum number of luxury rooms reached";
                        }
                    } else {
                        echo "Maximum number of business rooms reached";
                    }
                } else {
                    echo "Maximum number of standard rooms reached";
                }
            } else {
                echo "Maximum number of rooms reached";
            }
        }
    }
}

function generateSlug($selectedtype)
{
    $text = strtolower(trim($selectedtype));
    $text = $text . "_room";
    // $text = preg_replace('/\s+/', '_', $text);
    return $text;
}
?>