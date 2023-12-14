<?php
    session_start();
    $servername = "localhost:3306";
    $database = "hote";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // echo "Connected Successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
