<!-- SEARCH -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        // var_dump($search); exit;
        $sql = "SELECT* FROM room WHERE NAME LIKE :search OR LOCATION LIKE :search";
        $stmt = $conn->prepare($sql);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':search', $searchParam);
        $stmt->execute();
        $residence = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    }
?>
<!-- STANDARD -->
<?php
    $sql = "SELECT * FROM room WHERE CATEGORY = 'STANDARD'";
    $display_query = $conn->prepare($sql);
    $display_query->execute();
    $result = $display_query->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php
    $sql1 = "SELECT ICON, NAME FROM hbnb_utilities WHERE CATEGORY = 'STANDARD/BUSINESS/LUXURY'";
    $display_query = $conn->prepare($sql1);
    $display_query->execute();
    $utility = $display_query->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php
    $sql1 = "SELECT AC_AVAILABILITY FROM room_details LIMIT 1";
    $display_query1 = $conn->prepare($sql1);
    $display_query1->execute();
    $result1 = $display_query1->fetchAll(PDO::FETCH_ASSOC);
?>
