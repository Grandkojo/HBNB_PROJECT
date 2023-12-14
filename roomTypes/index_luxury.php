<!-- LUXURY -->
<?php
    $sql = "SELECT * FROM room WHERE CATEGORY = 'LUXURY'";
    $display_query = $conn->prepare($sql);
    $display_query->execute();
    $result = $display_query->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php
    $sql1 = "SELECT ICON, NAME FROM hbnb_utilities WHERE CATEGORY IN ('STANDARD/BUSINESS/LUXURY', 'BUSINESS/LUXURY', 'LUXURY')";
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