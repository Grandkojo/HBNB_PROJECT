<?php
    include "admin/config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $sql = "SELECT NAME, LOCATION FROM room WHERE NAME LIKE :search OR LOCATION LIKE :search";
        $stmt = $conn->prepare($sql);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':search', $searchParam);
        $stmt->execute();
        $residence = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($residence as $value) {
            echo $value['NAME'];?> <br> <?php
            echo $value['LOCATION'];?> <br> <?php
        }
    }
?>