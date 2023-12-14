<?php
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state = $_GET['state'];
    if ($state) {
        header("Location: ../user/activities.php");
    } else {

        $email_login = $_POST['email_login'];
        $password_login = $_POST['password_login'];

        $sql = "SELECT * FROM user_details WHERE EMAIL = :email_login AND PASSWORDS = :password_login LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email_login', $email_login);
        $stmt->bindParam(':password_login', $password_login);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['email'] = $row['EMAIL'];
            $_SESSION['firstname'] = $row['FIRST_NAME'];
            $_SESSION['lastname'] = $row['LAST_NAME'];

            header("Location: ../../index.php");
        }
    }
}
