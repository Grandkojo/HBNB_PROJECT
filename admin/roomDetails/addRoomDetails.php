<?php
include "../../admin/config.php";
?>
    <?php
    //Retrieve form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['residencename'])) {
            $residence_name = $_POST['residencename'];
            if (isset($_POST['location'])) {
                $location = $_POST['location'];
                if (isset($_POST['price'])) {
                    $sprice = $_POST['price'];
                    if (isset($_POST['category'])) {
                        $category = $_POST['category'];
                        if (isset($_POST['description'])) {
                            $description = $_POST['description'];
                            if (isset($_POST['aircondition'])) {
                                $selectedstate = $_POST['aircondition'];

                                if (isset($_FILES["imageFile"]) && $_FILES["imageFile"]["error"] === UPLOAD_ERR_OK) {
                                    // Define the upload directory and move the uploaded file
                                    $baseUrl = "http://192.168.15.134:90/HBNB/";
                                    if ($category == "STANDARD") {
                                        $uploadDirectory = "C:/xampp/htdocs/HBNB/uploads/standard/";
                                    } elseif ($category == "BUSINESS") {
                                        $uploadDirectory = "C:/xampp/htdocs/HBNB/uploads/business/";
                                    } elseif ($category == "LUXURY") {
                                        $uploadDirectory = "C:/xampp/htdocs/HBNB/uploads/luxury/";
                                    }
                                    // $uploadDirectory = "../uploads/";
                                    $uploadedFilePath = $uploadDirectory . basename($_FILES["imageFile"]["name"]);

                                    // Move the uploaded file to the desired location
                                    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $uploadedFilePath)) {
                                        // File uploaded successfully
                                        // SQL query to count the number of records
                                        $query = "SELECT COUNT(*) as totalRecords FROM room";
                                        $statement = $conn->prepare($query);
                                        $statement->execute();
                                        $result = $statement->fetch(PDO::FETCH_ASSOC);
                                        $totalRecords = $result['totalRecords'];
                                        if ($totalRecords <= 600) {
                                            $sql = "INSERT INTO room (NAME, LOCATION, AC_AVAILABILITY, PRICE, CATEGORY, PICTURE, DESCRIPTION) VALUES (:residencename, :location, :acavailability, :price, :category, :imagePath, :description)";
                                            var_dump($sql);
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bindParam(':residencename', $residence_name);
                                            $stmt->bindParam(':location', $location);
                                            $stmt->bindParam(':acavailability', $selectedstate);
                                            $stmt->bindParam(':category', $category);
                                            $stmt->bindParam(':price', $sprice);
                                            $stmt->bindParam(':description', $description);
                                            $uploadedFilePath = $baseUrl . str_replace("C:/xampp/htdocs/HBNB/", "", $uploadDirectory . basename($_FILES["imageFile"]["name"]));
                                            $stmt->bindParam(':imagePath', $uploadedFilePath);
                                            if ($stmt->execute()) {
                                                // echo "Room added successfully";
                                                $_SESSION["roomsuccess"] = "Room added succesfully";
                                                header("location: ../admin_page.php?page=add_room");
                                            }
                                        } else {
                                            $_SESSION["roomerror"] = "Room limit reached";
                                            sleep(2);
                                            header("location: ../admin_page.php?page=available_rooms");
                                        }
                                    } else {
                                        echo "Error moving the file.";
                                    }
                                } else {
                                    echo "Error uploading the file.";
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function generateCode($conn)
    {
        $counter = retrieveCounter($conn);
        $formattedCounter = str_pad($counter, 3, '0', STR_PAD_LEFT);
        $generatedCode = 'RM' . $formattedCounter;
        // incrementCounter($conn);
        return $generatedCode;
    }
    function retrieveCounter($conn)
    {
        $sql = "SELECT ROOM_CODE FROM room_details";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $counter = count($result) + 1;
        return $counter;
    }
    ?>


    