<?php
include "../../admin/config.php";
$id = $_GET['id'];
// Retrieve form data
$name = $_POST["residencename"];
$location = $_POST["location"];
$price = $_POST["price"];
$description = $_POST["description"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['category'])) {
        $category = $_POST['category'];
        if (isset($_POST['ac_availability'])) {
            $ac_availability = $_POST['ac_availability'];
            $sql = "UPDATE room SET NAME = :name, LOCATION = :location, AC_AVAILABILITY = :ac_availability, PRICE = :price, CATEGORY = :category, DESCRIPTION = :description WHERE ID = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':ac_availability', $ac_availability);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->execute()) {
                $_SESSION["editsuccess"] = "Changes saved!";
                header("location: ../admin_page.php?page=available_rooms");
            }
        }
    } else {
        $_SESSION["editfail"] = "Changes failed (Room id error)!";
        header("location: ../admin_page.php?page=available_rooms");
    }
}
