<?php
include '../config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["profile_first_name"]) && (!empty($_POST["profile_first_name"]))) {
        $profile_first_name = $_POST["profile_first_name"];

        $_SESSION["profile_first_name"] = $profile_first_name;

        if (isset($_POST["profile_last_name"]) && (!empty($_POST["profile_last_name"]))) {
            $profile_last_name = $_POST["profile_last_name"];
            $_SESSION["profile_last_name"] = $profile_last_name;

            if (isset($_POST["profile_email"]) && (!empty($_POST["profile_email"]))) {
                $profile_email = $_POST["profile_email"];
                $_SESSION["profile_email"] = $profile_email;

                if (isset($_POST["password_login"]) && (!empty($_POST["password_login"]))) {
                    $password_login = $_POST["password_login"];



                    $retrievesql = "SELECT * FROM user_details WHERE PASSWORDS = :password_login LIMIT 1";
                    $retrievestmt = $conn->prepare($retrievesql);
                    $retrievestmt->bindParam(':password_login', $password_login);
                    $retrievestmt->execute();
                    $result = $retrievestmt->fetchAll();

                    $check_first_name = $result[0]["FIRST_NAME"];
                    $check_last_name = $result[0]["LAST_NAME"];
                    $check_email = $result[0]["EMAIL"];




                    if ($check_first_name == $profile_first_name) {
                        $_SESSION["profile_first_name_error"] = "First name already exists";
                        header("Location: ../../index.php?locate=modal_profile");
                        // echo "First name already exists";
                        exit;
                    }


                    if ($check_last_name == $profile_last_name) {
                        $_SESSION["profile_last_name_error"] = "Last name already exists";
                        header("Location: ../../index.php?locate=modal_profile");
                        // echo "Last name already exists";
                        exit;
                    }

                    if ($check_email == $profile_email) {
                        $_SESSION["profile_email_error"] = "Email already exists";
                        header("Location: ../../index.php?locate=modal_profile");
                        // echo "Email already exists";
                        exit;
                    } else {

                        $sql = "UPDATE user_details SET FIRST_NAME = :first_name, LAST_NAME = :last_name, EMAIL = :email WHERE PASSWORDS = :password_login";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':first_name', $profile_first_name);
                        $stmt->bindParam(':last_name', $profile_last_name);
                        $stmt->bindParam(':email', $profile_email);
                        $stmt->bindParam(':password_login', $password_login);
                        $stmt->execute();
                        if ($stmt->execute()) {

                            echo "success";
                        }
                        // var_dump($stmt->execute()); exit;
                    }
                }
            }
        }
    }
}
?>
