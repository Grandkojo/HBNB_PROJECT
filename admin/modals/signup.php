<?php
    include "../config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["country"]) && isset($_POST["phone"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["confirmpassword"])) {

            $country = strtoupper($_POST["country"]);
            $phone = $_POST["phone"];
            $firstname = strtoupper($_POST["firstname"]);
            $lastname = strtoupper($_POST["lastname"]);
            $email = $_POST["email"];
            $confirmpassword = $_POST["confirmpassword"];
            $sql = "INSERT INTO user_details (COUNTRY, PHONE, FIRST_NAME, LAST_NAME, EMAIL, PASSWORDS) VALUES (:country, :phone, :firstname, :lastname, :email, :confirmpassword)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":country", $country);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":lastname", $lastname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":confirmpassword", $confirmpassword);
            $stmt->execute();

            if ($stmt->execute() && $_GET["state"] == "yes") {
                $_SESSION["signup"] = true;
                header("Location: ../../index.php?state=loginmodal");
            }
        } else {
            echo "Fill all details";
        }
        
    }else{
        echo "Error";
    }
?>