<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $occupants = $_POST['occupants'];
        $check_in_date = $_POST['check_in_date'];
        $check_out_date = $_POST['check_out_date'];
        $email = $_POST['email'];
        
    }

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'essienernest.kojoowusu@gmail.com';
        $mail->Password = 'zgra iyns forz abkp';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->setFrom('essienernest.kojoowusu@gmail.com', "HBNB HOTEL");
        $mail->addAddress($email);
        $mail->addBCC('owusukojow21@gmail.com', "HBNB HOTEL ADMIN");

        $mail->isHTML(true);
        $subject = "HBNB Hotel Booking";
        $body = "Dear $firstname $lastname,<br>Thank you for booking at HBNB hotel.<br>You can proceed to check in at the specified time
        <br><br> BOOKING DETAILS
        <br>Check-in date: $check_in_date<br>Check-out date: $check_out_date<br>Number of occupants: $occupants<br>
        For enquiries, please email us at: owusukojow21@gmail.com <br>
        We can't wait to welcome you.<br>
        Best regards,<br>HBNB Hotel.";

        $non_html = "Dear $firstname $lastname,<br><br>Thank you for booking at HBNB hotel.<br>You can proceed to check in at the specified time
        <br><br> BOOKING DETAILS
        <br>Check-in date: $check_in_date<br>Check-out date: $check_out_date<br>Number of occupants: $occupants<br><br>
        For enquiries, please email us at: owusukojow21@gmail.com <br>
        We can't wait to welcome you.<br>
        Best regards,<br><br>HBNB Hotel.";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $non_html;

        $mail->send();
        header("Location: index.php");

    }catch(Exception $e){
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    
?> 