<?php
include "../../admin/config.php";
?>
    <?php
    //Retrieve form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['utilityid'])) {
            $utility_id = $_POST['utilityid'];
            if (isset($_POST['utilityname'])) {
                $utility_name = $_POST['utilityname'];
                if (isset($_POST['category'])) {
                    $category = $_POST['category'];
                    if (isset($_FILES["imageFile"]) && $_FILES["imageFile"]["error"] === UPLOAD_ERR_OK) {
                        // Define the upload directory and move the uploaded file
                        $baseUrl = "http://192.168.15.134:90/HBNB/";
                        $uploadDirectory = "C:/xampp/htdocs/HBNB/hbnb_all_icons/";
                        // $uploadDirectory = "../uploads/";
                        $uploadedFilePath = $uploadDirectory . basename($_FILES["imageFile"]["name"]);
                        // Move the uploaded file to the desired location
                        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $uploadedFilePath)) {
                            // File uploaded successfully

                            $sql = "INSERT INTO hbnb_utilities (CATEGORY, UTILITY_CODE, NAME, ICON) VALUES (:category, :utilityid, :utilityname, :imagePath)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':category', $category);
                            $stmt->bindParam(':utilityid', $utility_id);
                            $stmt->bindParam(':utilityname', $utility_name);
                            $stmt->bindParam(':imagePath', $uploadedFilePath);
                            $uploadedFilePath = $baseUrl . str_replace("C:/xampp/htdocs/HBNB/", "", $uploadDirectory . basename($_FILES["imageFile"]["name"]));
                            $stmt->bindParam(':imagePath', $uploadedFilePath);
                            if ($stmt->execute()) {
                                // echo "Room added successfully";
                                $_SESSION["utilitysuccess"] = "Utility added succesfully";
                                header("location: ../admin_page.php?page=add_utility");
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


    